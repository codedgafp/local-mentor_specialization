<?php

namespace local_mentor_specialization\services;

use context_course;
use moodle_database;
use block_completion_monitor\model\block_instance_record;
use local_mentor_specialization\repository\local_mentor_specialization_completion_monitor_repository;

/**
 * Activities Completion Course Monitor service - Specific for Mentor
 * 
 * @package     local_mentor_specialization
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_mentor_specialization_completion_monitor_service
{
    public function __construct(
        private ?\stdClass $course = null,
        private ?local_mentor_specialization_completion_monitor_repository $mentorspecompletionmonitorrepo = null,
        private ?moodle_database $db = null,
        private ?context_course $contextcourse = null,
    ) {
        global $DB;

        $this->db = $DB;
        $this->mentorspecompletionmonitorrepo = new local_mentor_specialization_completion_monitor_repository();

        if ($this->course !== null) {
            $this->contextcourse = context_course::instance($this->course->id);
        }
    }

    /**
     * If a course have active module completion, add the instance of completion_monitor block in it
     * 
     * @return void
     */
    public function sync_block(): void
    {
        global $DB, $CFG;

        $batchsize = isset($CFG->batch_size) ? $CFG->batch_size : 1000;
        $batchcount = 0;
        $total = 0;

        $transaction = $DB->start_delegated_transaction();

        foreach ($this->mentorspecompletionmonitorrepo->get_course_list() as $course) {
            if ($this->add_block_to_course($course)) {
                $batchcount++;
                $total++;
            }

            if ($batchcount >= $batchsize) {
                $transaction->allow_commit();

                mtrace("Batch processed : {$batchcount} (total: {$total})");
                $transaction = $DB->start_delegated_transaction();
                $batchcount = 0;
            }
        }

        $transaction->allow_commit();

        mtrace("Processing complete : {$total} courses.");
    }

    /**
     * If the 'completion_monitor' block instance doesn't exist, add it to the specified course.
     * 
     * @param \stdClass|null $course
     * @return bool
     */
    public function add_block_to_course(?\stdClass $course = null): bool
    {
        $contextcourse = $course === null ? $this->contextcourse : context_course::instance($course->id);

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($contextcourse->id);

        if ($exists) {
            return false;
        }

        $blockRecord = new block_instance_record(
            blockname: 'completion_monitor',
            parentcontextid: $contextcourse->id,
            pagetypepattern: 'course-view-*'
        );

        $this->db->insert_record('block_instances', $blockRecord->buildrecord());

        return true;
    }

    /**
     * Delete the 'completion_monitor' block instance.
     * 
     * @return void
     */
    public function remove_block_from_course(): void
    {
        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($this->contextcourse->id);

        if ($exists) {
            $this->db->delete_records('block_instances', [
                'blockname' => 'completion_monitor',
                'parentcontextid' => $this->contextcourse->id
            ]);
        }
    }

    /**
     * Do activity have active completion
     * 
     * @return bool
     */
    public function activities_has_completion(): bool
    {
        return $this->mentorspecompletionmonitorrepo->activity_has_completion($this->course->id);
    }
}
