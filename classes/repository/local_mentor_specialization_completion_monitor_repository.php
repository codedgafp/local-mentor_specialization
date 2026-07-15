<?php

namespace local_mentor_specialization\repository;

use moodle_database;

/**
 * Activities Completion Course Monitor repository - Specific for Mentor
 * 
 * @package     local_mentor_specialization
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_mentor_specialization_completion_monitor_repository
{
    public function __construct(
        private ?moodle_database $db = null
    ) {
        global $DB;

        $this->db = $DB;
    }

    /**
     * Get courses that include course modules with an active completion
     * and no 'completion_monitor' block instance.
     */
    public function get_course_list(): iterable
    {
        $sql = "
            SELECT c.*
            FROM {course} c
            JOIN {context} ctx ON ctx.instanceid = c.id AND ctx.contextlevel = :courselevel
            WHERE c.id <> :siteid
            AND NOT EXISTS (
                    SELECT 1
                    FROM {block_instances} bi
                    WHERE bi.parentcontextid = ctx.id
                    AND bi.blockname = :blockname
            )
            AND EXISTS (
                SELECT 1
                FROM {course_modules} cm
                WHERE cm.course = c.id
                AND cm.deletioninprogress = 0
                AND cm.completion <> 0
            );";

        $rs = $this->db->get_recordset_sql($sql, [
            'courselevel' => CONTEXT_COURSE,
            'blockname'   => 'completion_monitor',
            'siteid'      => SITEID,
        ]);

        foreach ($rs as $record) {
            yield $record;
        }

        $rs->close();
    }

    /**
     * Is 'completion_monitor' block instance exist in a course.
     * 
     * @param int $contextId
     * @return bool
     */
    public function block_instance_exists(int $contextId): bool
    {
        return $this->db->record_exists('block_instances', [
            'blockname' => 'completion_monitor',
            'parentcontextid' => $contextId
        ]);
    }

    /**
     * Do activity have active completion
     * 
     * @param int $courseId
     * @return bool
     */
    public function activity_has_completion(int $courseId): bool
    {
        $select = "course = :course AND completion <> :none AND deletioninprogress = 0";
        $params = [
            'course' => $courseId,
            'none' => COMPLETION_TRACKING_NONE
        ];

        return $this->db->record_exists_select('course_modules', $select, $params);
    }
}
