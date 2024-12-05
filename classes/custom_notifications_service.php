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
use stdClass;

defined('MOODLE_INTERNAL') || die;

class custom_notifications_service
{
    public static $LIBRARY_PAGE_TYPE = "LIBRARY";
    public static $CATALOG_PAGE_TYPE = "CATALOG";

    public static $EMAIL_LIBRARY_NEW_COURSES = "EMAIL_LIBRARY_NEW_COURSES";
    public static $EMAIL_CATALOG_NEW_SESSIONS = "EMAIL_CATALOG_NEW_SESSIONS";
    public static $EMAIL_LIBRARY_UPDATED_COURSES = "EMAIL_LIBRARY_UPDATED_COURSES";
    public static $PERIOD_NEW_SESSIONS = 7;
    protected $MAX_RESULT_SUBSCRIPTIONS = 1000;

    public static $ADMIN = "admindedie";
    public static $RFC = "respformation";
    public static $LIBRARYVISITOR = "visiteurbiblio";
    
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
     * Send new published courses email notifications
     * @return void
     */
    public function send_published_new_courses_notifications_for_library(){
        global $CFG;
        $supportuser = \core_user::get_support_user();
        $error_sending_emails = false;
        $dbi = database_interface::get_instance();

        //Get eligible users to be notified and trainings recently published 
        $subscribersRecord = $dbi->get_subscribers_of_new_library_courses();

        foreach ($subscribersRecord as $record) {

            $object =  get_string('email_library_publish_new_course_object', 'local_mentor_specialization');
            
            $args = new \stdClass();
            $args->link = "{$CFG->wwwroot}/local/library/pages/training.php?trainingid={$record->trainingid}";
            $args->course_category_name = $record->course_category_name;
            $args->course_full_name = $record->coursefullname;
            $content = get_string('email_library_publish_new_course_content', 'local_mentor_specialization', $args);
            $contenthtml = text_to_html($content, true, true);
            $user = \core_user::get_user($record->userid);
            $error_sending_emails = !email_to_user( $user, $supportuser, $object, $content, $contenthtml);
        }
        $error_sending_emails ? mtrace(get_string('customnotificationerroremail', 'local_mentor_specialization', self::$EMAIL_LIBRARY_NEW_COURSES)) :
        mtrace(get_string('customnotificationsuccessemail', 'local_mentor_specialization', self::$EMAIL_LIBRARY_NEW_COURSES));    
    }

    /**
     * Send updated Library courses email notifications
     * @return void
     */
    public function send_updated_courses_notifications_for_library(): void{
        global $CFG;
        $error_sending_emails = false;
        $dbi = database_interface::get_instance();
        $supportuser = \core_user::get_support_user();
        $subscribers = $dbi->get_subscribers_of_updated_library_courses();
        $object = get_string('email_library_updates_updated_course_object', 'local_mentor_specialization');
        foreach ($subscribers as $subscriber) {
            $args = new stdClass();
            $args->course_name = $subscriber->course_name;
            $args->trainingid = $subscriber->trainingid;
            $args->course_category_name = $subscriber->course_category_name;
            $args->wwwroot = $CFG->wwwroot;
            $content = get_string('email_library_updates_updated_course_content', 'local_mentor_specialization', $args);
            $contenthtml = text_to_html($content, true, true);
            $error_sending_emails = !email_to_user($subscriber, $supportuser, $object, $content, $contenthtml);
            $error_sending_emails ? mtrace(get_string('customnotificationerroremail', 'local_mentor_specialization', self::$EMAIL_LIBRARY_UPDATED_COURSES)) :
                mtrace(get_string('customnotificationsuccessemail', 'local_mentor_specialization', self::$EMAIL_LIBRARY_UPDATED_COURSES));
        }     
    }

    /**
     * Send new Catalog sessions email notifications
     * @return void
     */
    public function send_new_sessions_notifications_for_catalog(){
        global $CFG;
        $supportuser = \core_user::get_support_user();
        $error_sending_emails = false;
        $subscribers = $this->get_subscribers_of_catalog_by_training();
        foreach ($subscribers as $subscriber) {
            $emailobjectkey = 'email_catalog_updates_new_session_object';
            $nbtrainings  = count($subscriber->trainings);
            if($nbtrainings < 1){
                continue;
            }
            if($nbtrainings > 1){
                $emailobjectkey = 'email_catalog_updates_new_sessions_object';
            }

            $object =  get_string($emailobjectkey, 'local_mentor_specialization');
            
            $args = new \stdClass();
            $args->courseslist = $this->get_courses_list($subscriber->trainings);
            
            $content = get_string('email_catalog_updates_new_session_content', 'local_mentor_specialization', $args);
            $contenthtml = text_to_html($content, true, true);
            
            $error_sending_emails = !email_to_user($subscriber, $supportuser, $object, $content, $contenthtml);
        }
        $error_sending_emails ? mtrace(get_string('customnotificationerroremail', 'local_mentor_specialization', self::$EMAIL_CATALOG_NEW_SESSIONS)) :
        mtrace(get_string('customnotificationsuccessemail', 'local_mentor_specialization', self::$EMAIL_CATALOG_NEW_SESSIONS));    
    }

    /**
     * Paging : Get training data for each user (subscriber) limited to MAX_RESULT_SUBSCRIPTIONS by result
     *
     * @return array
     * @throws coding_exception
     * @throws moodle_exception
     */
    function get_subscribers_of_catalog_by_training() {
        $dbi = database_interface::get_instance();
        $subscribers = [];
        $offset = 0;
        $hasMoreResults = true;

        while ($hasMoreResults) {
            $results = $dbi->get_subscribers_of_new_catalog_sessions($this->MAX_RESULT_SUBSCRIPTIONS, $offset);
            if (empty($results)) {
                $hasMoreResults = false;
                break;
            }

            foreach ($results as $result) {

                $user = $subscribers[$result->userid] ?? $result;

                if(!isset($user->trainings)){
                    $user->trainings = [];
                }
                
                if (!isset($user->trainings[$result->trainingid])) {
                    $training = new \stdClass();
                    $training->trainingid = $result->trainingid;
                    $training->coursefullname = $result->coursefullname;
                    $user->trainings[$result->trainingid] = $training;
                }
                
                unset($user->trainingid);
                unset($user->coursefullname);
                
                $subscribers[$result->userid] = $user;
            }
            $offset += $this->MAX_RESULT_SUBSCRIPTIONS;
        }
        return $subscribers;
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

    /**
     * Get all Mentor collections 
     *
     * @return array
     * @throws coding_exception
     * @throws moodle_exception
     */
    public function get_mentor_collections(){
        $dbi = database_interface::get_instance();

        return $dbi->get_mentor_collections();
    }

    /**
     * Get collection for a certain use
     *
     * @return array
     * @throws coding_exception
     * @throws moodle_exception
     */
    public function get_user_collection_notifications($type){
        $dbi = database_interface::get_instance();
        return $dbi->get_user_collection_notifications($type);
    }
    
    /**
     * Build string courses list content
     *
     * @return string
     */
    function get_courses_list($courses){
        global $CFG;
        $courseslist = "";
        foreach($courses as $course){
            $link = "{$CFG->wwwroot}/local/catalog/pages/training.php?trainingid={$course->trainingid}";
            $courseslist .= "{$course->coursefullname}: <a href=\"$link\">$link</a>\n\n";
        }
        return $courseslist;
    }
}