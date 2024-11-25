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
 * Nettoie les comptes du LDAP non présents dans la base Moodle
 */

require_once('../../../config.php');

require_login();

if (!is_siteadmin()) {
    throw new \moodle_exception('Vous devez vous connecter en tant qu\'administrateur pour lancer ce script');
}

$pluginlib = $CFG->dirroot . '/auth/ldap_syncplus/auth.php';
require_once($pluginlib);
$config = get_config('auth_ldap_syncplus', 'contexts');

// Check if the ldap_syncplus plugin exists.
if (!is_file($pluginlib)) {
    echo 'Le plugin LDAP syncplus n\'est pas installé';
    return;
}

// Check if the ldap_syncplus plugin has been configured.
if (empty($config)) {
    echo 'Le plugin LDAP syncplus n\'est pas configuré';
    return;
}

$url = new moodle_url('/local/mentor_specialization/pages/clear_ldap.php');
$trigger = optional_param('trigger', 0, PARAM_BOOL);
$clearldapmessage = get_string('clear_ldap_message', 'local_mentor_specialization');

$PAGE->set_context(context_system::instance());

if ($trigger) {
    // Create and launch ad hoc task
    $task = new \local_mentor_specialization\task\clear_ldap_task();
    try {
        $task->execute();
    } catch (\Exception $e) {
        echo $OUTPUT->notification($e -> getMessage(), 'notifyproblem');
        error_log($e->getMessage());
    }
}


$PAGE->set_title('Nettoyage du LDAP');
$PAGE->set_url($url);
echo $OUTPUT->header();
echo $OUTPUT->heading('Nettoyage du LDAP');
echo '<div>' . $clearldapmessage . '</div>';
echo '<div><a href="' . $url . '?trigger=1">Nettoyer les utilisateurs</a></div>';

echo $OUTPUT->footer();
