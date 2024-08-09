<?php

/**
 * Send email to notify about the courses updates in the library
 *
 * @package    local_mentor_specialization
 * @copyright  2024 CGI (contact@cgi.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mentor_specialization\task;

use dml_exception;

class email_library_updates extends \core\task\scheduled_task
{

    const ADMINIDE_SHORTNAME = 'admindedie';
    const RFC_SHORTNAME = 'respformation';

    public function get_name()
    {
        // Shown in admin screens.
        return get_string('email_library_updates_new_course', 'local_mentor_specialization');
    }

    public function execute()
    {
        global $CFG;
        $supportuser = \core_user::get_support_user();

        $object = get_string('email_library_updates_new_course_object', 'local_mentor_specialization');

        $courses = $this->get_trainings_added_to_library_last24h();
        if(count($courses) < 1){
            return;
        }
        $users = $this->get_all_admins_and_rfcs();
        foreach ($courses as $course) {
            foreach ($users as $user){
                $args = $course;
                $args->wwwroot = $CFG->wwwroot;
                $content = get_string('email_library_updates_new_course_content', 'local_mentor_specialization', $args);
                $contenthtml = text_to_html($content, true, true);
                email_to_user($user, $supportuser, $object, $content, $contenthtml);
                mtrace('email_library_updates_new_course: ' . "email sent");
            }
        }
    }

    function get_all_admins_and_rfcs()
    {
        global $DB;
        try {
            $sql = "SELECT DISTINCT  u.id, u.*
            FROM {role_assignments} ra
                JOIN {user} u ON ra.userid = u.id
                JOIN {role} r ON r.id = ra.roleid
                JOIN {context} ctx ON ctx.id = ra.contextid
            WHERE ctx.contextlevel = " . CONTEXT_COURSECAT . " AND r.shortname IN ('".self::ADMINIDE_SHORTNAME."', '".self::RFC_SHORTNAME."');";
            $users = $DB->get_records_sql($sql, []);
        }catch (dml_exception $e){
            mtrace('email_library_update error sql getting users: ' . $e->getMessage());
        }
        return $users;
    }

    function get_trainings_added_to_library_last24h()
    {
        $trainings = [];
        try {
            global $DB;
            $sql = "SELECT cc2.name as course_category_name, c.shortname course_name, l.trainingid as trainingid  FROM {library} l
                        JOIN {training} t ON t.id = l.originaltrainingid
                        JOIN {course} c ON c.shortname = t.courseshortname
                        JOIN {course_categories} cc ON cc.id = c.category
                        LEFT JOIN {course_categories} cc2 ON cc.parent = cc2.id
                    WHERE to_timestamp(l.timecreated) > (CURRENT_TIMESTAMP - INTERVAL  '1 day')";

            $trainings = $DB->get_records_sql($sql, []);
        }catch (dml_exception $e){
            mtrace('email_library_update error sql getting trainings: ' . $e->getMessage());
        }
        return $trainings;
    }


}