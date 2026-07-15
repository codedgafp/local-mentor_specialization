<?php

namespace local_mentor_specialization;

use block_completion_monitor\hook\installed;
use local_mentor_specialization\services\local_mentor_specialization_completion_monitor_service;

/**
 * Initializes the 'completion_monitor' block in all courses when the 'block_completion_monitor' plugin is installed
 * 
 * @package local_mentor_specialization
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks
{
    /**
     * Callback when 'block_completion_monitor' plugin is installed.
     * 
     * @param installed $hook
     * @return void
     */
    public static function react_to_completion_monitor_installed(installed $hook): void
    {
        mtrace('block_completion_monitor: installation started');

        $mentorspecompletionmonitorservice = new local_mentor_specialization_completion_monitor_service();
        $mentorspecompletionmonitorservice->sync_block();

        mtrace('block_completion_monitor: installation completed');
    }
}
