<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Clean ldap when users are no longer in moodle db
 *
 * @package    local_mentor_specialization
 * @copyright  2021 Edunao SAS (contact@edunao.com)
 * @author     adrien <adrien@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mentor_specialization\task;
use auth_plugin_ldap_syncplus;


class clear_ldap_task extends \core\task\adhoc_task {

    public function get_name() {
        return get_string('task_clear_ldap', 'local_mentor_specialization');
    }

    public function execute() {
        global $DB, $CFG;
        $pluginlib = $CFG->dirroot . '/auth/ldap_syncplus/auth.php';
        require_once($pluginlib);
        $config = get_config('auth_ldap_syncplus', 'contexts');
        $errormoodleusers = get_string('errormoodleusers', 'local_mentor_specialization');
        $errorconnectldap = get_string('errorconnectldap', 'local_mentor_specialization');
        $errorsearchldap = get_string('errorsearchldap', 'local_mentor_specialization');
        $errorldapentries = get_string('errorldapentries', 'local_mentor_specialization');
        $errormailreport = get_string('errormailreport', 'local_mentor_specialization');
        $errormailreportnodelete = get_string('errormailreportnodelete', 'local_mentor_specialization');

        // Get moodle db users sync with ldap
        $moodleusers = $DB->get_records_select('user', 'auth = ?', ['ldap_syncplus'], '', 'id, username, email');
        if(!$moodleusers){
            throw new \moodle_exception($errormoodleusers);
        }
        $moodleusers_by_username = [];
        foreach ($moodleusers as $user) {
            $moodleusers_by_username[$user->username] = $user;
        }


        // Open an ldap connection.
        $auth = new auth_plugin_ldap_syncplus();
        $con = $auth->ldap_connect();
        if (!$con) {
            throw new \moodle_exception($errorconnectldap);
        }

        // Search ldap parameters
        $basedn = $config;
        $filter = "(&(objectClass=person)(cn=*))";
        $attributes = ['cn', 'moodleId'];

        // Get ldap results
        $result = ldap_search($con, $basedn, $filter, $attributes);
        if ($result === false) {
            throw new \moodle_exception($errorsearchldap);
        }


        // Get entries
        $entries = ldap_get_entries($con, $result);
        if ($entries === false) {
            throw new \moodle_exception($errorldapentries);
        }
        $countentries = $entries['count'];
        error_log('*******LDAP CONTIENT******* : ' . $countentries . ' utilisateurs');

        $notexisting = [];

        for ($i = 0; $i < $countentries; $i++) {
            $cn = $entries[$i]['cn'][0];
            $dn = $entries[$i]['dn'];
            $ldap_moodleid = isset($entries[$i]['moodleid'][0]) ? $entries[$i]['moodleid'][0] : null;

            if(!isset($moodleusers_by_username[$cn])) {
                if(!ldap_delete($con, $dn)) {
                    throw new \moodle_exception($errorldapdelete);
                }
                $notexisting[] = [
                    'id' => $ldap_moodleid ? $ldap_moodleid : 'ND',
                    'email' => str_replace('_', '.', $cn)
                ];
            }
        }

        error_log('*******NOMBRE D\'UTILISATEURS SUPPRIMES******* : ' . count($notexisting));
        $date = date('d/m/Y');

        if (!empty($notexisting)) {
            try {
                $this->send_report_email($date, $notexisting, $countentries, $errormailreport);
            } catch (\Exception $e) {
                error_log($errormailreport . $e->getMessage());
                throw new \moodle_exception($e->getMessage());
            }
        } else {
            try {
                $this->send_no_user_deleted_email($date, $errormailreportnodelete);
            } catch (\Exception $e) {
                error_log($errormailreportnodelete . $e->getMessage());
                throw new \moodle_exception($e->getMessage());
            }
        }


        //Close the ldap connection.
        $auth->ldap_close();

    }


    private function send_no_user_deleted_email($date, $errormailreportnodelete) {
        global $USER;

        $subject = "Rapport de nettoyage du LDAP";
        $messagetext = "Bonjour,\n\nSuite à votre nettoyage du LDAP effectué le $date, aucun utilisateur n'a été supprimé car tous les utilisateurs identifiés dans le LDAP existent toujours dans Moodle.\n\nL'équipe Mentor";
        $messagehtml = "
            <p>Bonjour,</p>
            <p>Suite à votre nettoyage du LDAP effectué le $date, aucun utilisateur n'a été supprimé car tous les utilisateurs identifiés dans le LDAP existent toujours dans Moodle.</p>
            <p>L'équipe Mentor</p>
            <p><img src='https://mentor.gouv.fr/theme/mentor/pix/logo.png' alt='Logo de Mentor' style='width:200px; height:56px;'></p>";

        $supportuser = \core_user::get_support_user();
        $email_sent = email_to_user($USER, $supportuser, $subject, $messagetext, $messagehtml);
        if (!$email_sent) {
            throw new \moodle_exception($errormailreportnodelete);
        }
    }


    private function send_report_email($date, $notexisting, $countentries, $errormailreport) {
        global $USER;

        $count = count($notexisting);
        $syntaxe = $count > 1 ? 'utilisateurs ont été supprimés' : 'utilisateur a été supprimé';
        $subject = "Rapport de nettoyage du LDAP";
        $messagetext = "Bonjour,\n\nSuite à votre nettoyage du LDAP effectué le $date, $countentries utilsateurs ont été identifiés dans le LDAP et et $count $syntaxe :\n\n";
        $messagehtml = "
            <p>Bonjour,</p>
            <p>Suite à votre nettoyage du LDAP effectué le $date, $countentries utilsateurs ont été identifiés dans le LDAP et $count $syntaxe :</p>
            <table border='1' cellpadding='5' cellspacing='0'>
                <tr>
                    <th>ID Moodle</th>
                    <th>ADRESSE MEL</th>
                </tr>";

        foreach ($notexisting as $user) {
            $messagetext .= "ID: {$user['id']}, Email: {$user['email']}\n";
            $messagehtml .= "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['email']}</td>
                </tr>";
        }

        $messagehtml .= "
            </table>
            <p>L'équipe Mentor</p>
            <p><img src='https://mentor.gouv.fr/theme/mentor/pix/logo.png' alt='Logo de Mentor' style='width:200px; height:56px;'></p>";

        $messagetext .= "\nL'équipe Mentor\n";

        $supportuser = \core_user::get_support_user();
        $email_sent = email_to_user($USER, $supportuser, $subject, $messagetext, $messagehtml);
        if(!$email_sent){
            throw new \moodle_exception($errormailreport);
        }
    }


}