<?php
/**
 * Summary of namespace local_mentor_specialization\task
 * Delete archived sessions that are old than 3 years
 * Warning users about this delete 2 months before
 * See archived_sessions.php
 * * @package    local_mentor_specialization
 */
namespace local_mentor_specialization\task;

use local_mentor_specialization\database_interface;

class delete_archived_sessions extends \core\task\scheduled_task {


    /** Time interval in secondes within archived sessions are fetched = 3 years */
    public $TIME_INTERVAL_DELETE_SESSIONS =  '3 years';
    public $LIMIT_SQL_REQUEST = 1000;
    
    public function get_name() {
        return get_string('task_deletion_archived_sessions', 'local_mentor_specialization');
    }

    /**
     * Warn about deleting archived sessions and delete archived sessions
     * from 3 years
     * @return void
     */
    public function execute() {
       // Send warning emails to participants
       $dbi = database_interface::get_instance();
    
       // Purge archived sessions
       $dbi->delete_archived_sessions($this->TIME_INTERVAL_DELETE_SESSIONS);
    }

   
}
