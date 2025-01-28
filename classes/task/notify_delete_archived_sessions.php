<?php
/**
 * Summary of namespace local_mentor_specialization\task
 * Delete archived sessions that are old than 3 years
 * Warning users about  deleting archived sessions that are old than 3 years, 2 months before
 * See archived_sessions.php
 * * @package    local_mentor_specialization
 */
namespace local_mentor_specialization\task;

use local_mentor_specialization\database_interface;

class notify_delete_archived_sessions extends \core\task\scheduled_task {

    
   
    /** Time interval in secondes within archived sessions are fetched = 2 years and 10 months*/
    public $TIME_INTERVAL_PARTICIPANTS_SESSIONS =  '2 year 10 month'  ;
    

    public $LIMIT_SQL_REQUEST = 1000;
    
    public function get_name() {
        return get_string('task_notify_deletion_archived_sessions', 'local_mentor_specialization');
    }

    /**
     * Warn about deleting archived sessions and delete archived sessions
     * from 3 years
     * @return void
     */
    public function execute() {   
       // Send warning emails to participants
       $warningsessions = $this->get_sessions_archived_paginated($this->TIME_INTERVAL_PARTICIPANTS_SESSIONS);
        foreach ($warningsessions as $warningsession) {
            $session = new \local_mentor_core\session($warningsession->id);
            $participants = $session->get_participants();
            $this->send_warning_emails($participants, $warningsession);
        }       
     
    }

    /**
     * Send warning emails about session deletion
     * @param array $participants List of participants
     */
    private function send_warning_emails($participants, $session) {
        global $CFG;
        foreach ($participants as $user) {
            $subject = get_string('email_prevention_delete_archived_session_object', 'local_mentor_specialization', ["session_name" => $session->name]);
            $message = get_string('email_prevention_delete_archived_session_content', 'local_mentor_specialization', [
                'session_name' => $session->name,
                'course_url' => $CFG->wwwroot . '/course/view.php?id=' . $session->courseid,
                'wwwroot' => $CFG->wwwroot
            ]);
            $error_sending_email = !email_to_user($user, \core_user::get_support_user(), $subject, $message);
            $error_sending_email ? mtrace("Error trying to send email about archived sessions deletion") : null;
        }
    }

    /**
     *  Get archived sessions paginated
     *
     * @return array
     * @throws coding_exception
     * @throws moodle_exception
     */
    function get_sessions_archived_paginated($interval) {
        $dbi = database_interface::get_instance();
        $sessions = [];
        $offset = 0;
        $hasMoreResults = true;

        while ($hasMoreResults) {
            $results = $dbi->get_archived_sessions($interval, $this->LIMIT_SQL_REQUEST,$offset);
            if (empty($results)) {
                $hasMoreResults = false;
                break;
            }
            $sessions += $results;
            $offset += $this->LIMIT_SQL_REQUEST;
        }
        return $sessions;
    }
}
