<?php

use local_mentor_specialization\repository\local_mentor_specialization_completion_monitor_repository;
use local_mentor_specialization\services\local_mentor_specialization_completion_monitor_service;

defined('MOODLE_INTERNAL');

class local_mentor_specialization_completion_monitor_testcase extends advanced_testcase
{
    /**
     * Course object
     * @var stdClass
     */
    private \stdClass $course;

    /**
     * Activities Completion Course Monitor repository
     * @var local_mentor_specialization_completion_monitor_repository
     */
    private local_mentor_specialization_completion_monitor_repository $mentorspecompletionmonitorrepo;

    /**
     * Completion Course Monitor service
     * @var local_mentor_specialization_completion_monitor_service
     */
    private local_mentor_specialization_completion_monitor_service $mentorspecompletionmonitorservice;

    protected function setUp(): void
    {
        parent::setUp();

        self::resetAfterTest();
        set_config('enablecompletion', 1);

        $generator = $this->getDataGenerator();
        $this->course = $generator->create_course([
            'enablecompletion' => 1,
        ]);

        $this->mentorspecompletionmonitorrepo = new local_mentor_specialization_completion_monitor_repository();
        $this->mentorspecompletionmonitorservice = new local_mentor_specialization_completion_monitor_service($this->course);
    }
    public function test_block_instance_exists()
    {
        global $DB;
        self::setAdminUser();

        // Create course.
        $courserecord = new stdClass();
        $courserecord->enablecompletion = 1;
        $course = $this->getDataGenerator()->create_course($courserecord);

        $context = \context_course::instance($course->id);

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertFalse($exists);

        $record = new \stdClass();
        $record->blockname          = 'completion_monitor';
        $record->parentcontextid    = $context->id;
        $record->showinsubcontexts  = 0;
        $record->pagetypepattern    = 'course-view-*';
        $record->subpagepattern     = null;
        $record->defaultregion      = 'top-block';
        $record->defaultweight      = 1;
        $record->timecreated        = time();
        $record->timemodified       = time();

        $DB->insert_record('block_instances', $record);

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertTrue($exists);
    }

    public function test_add_block_to_course()
    {
        $this->setAdminUser();

        $context = \context_course::instance($this->course->id);

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertFalse($exists);

        $this->mentorspecompletionmonitorservice->add_block_to_course();

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertTrue($exists);
    }

    public function test_remove_block_from_course()
    {
        $this->setAdminUser();

        $context = \context_course::instance($this->course->id);

        $this->mentorspecompletionmonitorservice->add_block_to_course();

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertTrue($exists);

        $this->mentorspecompletionmonitorservice->remove_block_from_course();

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertFalse($exists);
    }

    public function test_add_block_to_course_check_position()
    {
        global $DB, $CFG;

        $context = \context_course::instance($this->course->id);

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertFalse($exists);

        $this->mentorspecompletionmonitorservice->add_block_to_course();

        $exists = $this->mentorspecompletionmonitorrepo->block_instance_exists($context->id);
        self::assertTrue($exists);

        $position = $CFG->blocktopregion ?? BLOCK_POS_LEFT;
        self::assertEquals($position, $DB->get_field('block_instances', 'defaultregion', ['parentcontextid' => $context->id]));
    }

    public function test_activity_has_completion()
    {
        self::setAdminUser();

        // Create course.
        $courserecord = new stdClass();
        $courserecord->enablecompletion = 1;
        $course = $this->getDataGenerator()->create_course($courserecord);
        $hasCompletion = $this->mentorspecompletionmonitorrepo->activity_has_completion($course->id);

        self::assertFalse($hasCompletion);
        $record = new stdClass();
        $record->course = $course;
        $record->completion = 1;
        $this->getDataGenerator()->create_module('url', $record);

        $hasCompletion = $this->mentorspecompletionmonitorrepo->activity_has_completion($course->id);
        self::assertTrue($hasCompletion);
    }
}
