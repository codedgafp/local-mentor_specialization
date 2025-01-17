<?php
defined('MOODLE_INTERNAL') || die();

global $DB;

   // Disable the scheduled tasks for the plugin
   $tasknameNotify = '\local_mentor_specialization\task\notify_delete_archived_sessions'; // Replace with the task's class name
   $DB->set_field('task_scheduled', 'disabled', 1, array('classname' => $tasknameNotify));
   
   $tasknameDelete = '\local_mentor_specialization\task\delete_archived_sessions'; // Replace with the task's class name
   $DB->set_field('task_scheduled', 'disabled', 1, array('classname' => $tasknameDelete));
