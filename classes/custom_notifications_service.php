<?php
/**
 * Send email to disabled account trying to login
 *
 * @package    local_mentor_specialization
 * @copyright  2022 Edunao SAS (contact@edunao.com)
 * @author     adrien <adrien@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mentor_specialization;

use dml_exception;
use local_mentor_specialization\database_interface;

defined('MOODLE_INTERNAL') || die;

class custom_notifications_service
{
    public $EMAIL_LIBRARY_NEW_COURSES = "EMAIL_LIBRARY_NEW_COURSES";
    public $EMAIL_LIBRARY_UPDATE_COURSES = "EMAIL_LIBRARY_UPDATE_COURSES";

    public static $LIBRARY_PAGE_TYPE = "LIBRARY";
    public static $CATALOG_PAGE_TYPE = "CATALOG";

    private static $instance;

    /**
     * @return custom_notifications_service
     */
    public static function get_instance(): custom_notifications_service {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * fetch concerned users from database to be notified about custom notifications
     * @param string $sql
     * @return array
     */
    public function get_users_to_be_notified(string $sql): array
    {
        global $DB;
        $users = [];
        try {
            $users = $DB->get_records_sql($sql, []);
        } catch (dml_exception $e) {
            mtrace('Custom notification: error sql getting users to be notified: ' . $e->getMessage());
        }
        return $users;
    }

    /**
     * fetch data from database to be notified about (courses, categories, ...)
     * @return array
     */
    public function get_data_to_be_notified_about(string $sql): array
    {
        $data = [];
        try {
            global $DB;
            $data = $DB->get_records_sql($sql, []);
        } catch (dml_exception $e) {
            mtrace('email_library_update error sql getting trainings: ' . $e->getMessage());
        }
        return $data;
    }

    /**
     * Send notification email to the users depending on notification type
     * @return array
     */
    public function send_custom_notification(string $notification_type, array $users, object $data): void
    {
        global $CFG;
        $supportuser = \core_user::get_support_user();
        $error_sending_emails = false;
        switch ($notification_type) {
            case self::EMAIL_LIBRARY_NEW_COURSES:
                $object = get_string('email_library_updates_new_course_object', 'local_mentor_specialization');
                foreach ($users as $user) {
                    $data->wwwroot = $CFG->wwwroot;
                    $content = get_string('email_library_updates_new_course_content', 'local_mentor_specialization', $data);
                    $contenthtml = text_to_html($content, true, true);
                    $error_sending_emails = !email_to_user($user, $supportuser, $object, $content, $contenthtml);
                }
        }
        $error_sending_emails ? mtrace('Error sending email Custom Notifications Type:' . self::EMAIL_LIBRARY_NEW_COURSES . '.') :
            mtrace('Success emails Custom Notifications Type:' . self::EMAIL_LIBRARY_NEW_COURSES . ' sent.');
    }

    /**
     * Set user collection notifications 
     *
     * @return string
     * @throws coding_exception
     * @throws moodle_exception
     */
    public function set_user_notifications($notifications, $type):string {
        global $USER, $DB;
        $dbi = database_interface::get_instance();
        
        foreach ($notifications as $notification) {
            if (isset($notification['id'], $notification['notify'])) {
                $usernotification = $dbi->get_user_notification($notification['id'], $USER->id, $type);
                
                if ($usernotification && !$notification['notify']) {
                    $dbi->delete_user_notification($usernotification->id);
                }

                if(!$usernotification && $notification['notify']) {
                    $dataobject = new \stdClass();
                    $dataobject->user_id = $USER->id;
                    $dataobject->collection_id = intval($notification['id']);
                    $dataobject->type = $type;
                    $dbi->insert_user_notification($dataobject);
                }
            }
        }
        return get_string('usercollectionnotif:sucess', 'local_catalog');
    }

    public function get_mentor_collections(){
        $dbi = database_interface::get_instance();

        return $dbi->get_mentor_collections();
    }

    public function get_user_collection_notifications($type){
        $dbi = database_interface::get_instance();
        return $dbi->get_user_collection_notifications($type);
    }

}