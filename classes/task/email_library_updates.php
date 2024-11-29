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
    public $custom_notification_service;

    public function __construct()
    {
        $this->custom_notification_service = custom_notifications_service::get_instance();
    }

    public function get_name()
    {
        return get_string('email_library_updated_course', 'local_mentor_specialization');
    }

    public function execute()
    {
        $this->custom_notification_service->send_updated_courses_notifications_for_library();
    }

}