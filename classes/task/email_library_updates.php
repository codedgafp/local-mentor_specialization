<?php

/**
 * Send emails to notify about the courses updates in the library
 *
 * @package    local_mentor_specialization
 * @copyright  2024 CGI (contact@cgi.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mentor_specialization\task;

use dml_exception;
use local_mentor_specialization\custom_notifications_service;

class email_library_updates extends \core\task\scheduled_task
{

    const ADMINIDE_SHORTNAME = 'admindedie';
    const RFC_SHORTNAME = 'respformation';

    public $custom_notification_service;

    public function __construct()
    {
        $this->custom_notification_service = custom_notifications_service::get_instance();
    }

    public function get_name()
    {
        return get_string('email_library_updates_new_course', 'local_mentor_specialization');
    }

    public function execute()
    {
        $this->send_library_updates_notifications();

    }

    function send_library_updates_notifications()
    {
        $newcourses = $this->get_trainings_added_to_library_last24h();
        if (count($newcourses) < 1) {
            return;
        }
        $users = $this->get_all_admins_and_rfcs();
        foreach ($newcourses as $course) {
            $this->custom_notification_service->send_custom_notification(custom_notifications_service::EMAIL_LIBRARY_NEW_COURSES, $users, $newcourses);
        }
    }

    function get_all_admins_and_rfcs()
    {
        $sql = "SELECT DISTINCT  u.id, u.*
            FROM {role_assignments} ra
                JOIN {user} u ON ra.userid = u.id
                JOIN {role} r ON r.id = ra.roleid
                JOIN {context} ctx ON ctx.id = ra.contextid
            WHERE ctx.contextlevel = " . CONTEXT_COURSECAT . " AND r.shortname IN ('" . self::ADMINIDE_SHORTNAME . "', '" . self::RFC_SHORTNAME . "');";

        return $this->custom_notification_service->get_users_to_be_notified($sql);
    }

    function get_trainings_added_to_library_last24h()
    {
        global $DB;
        $sql = "SELECT cc2.name as course_category_name, c.fullname as course_name, l.trainingid as trainingid  FROM {library} l
                    JOIN {training} t ON t.id = l.originaltrainingid
                    JOIN {course} c ON c.shortname = t.courseshortname
                    JOIN {course_categories} cc ON cc.id = c.category
                    LEFT JOIN {course_categories} cc2 ON cc.parent = cc2.id
                WHERE to_timestamp(l.timecreated) > (CURRENT_TIMESTAMP - INTERVAL  '1 day')";
        return $this->custom_notification_service->get_data_to_be_notified_about($sql);
    }

}