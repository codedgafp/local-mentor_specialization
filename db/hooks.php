<?php

/**
 * Hook callbacks for local_mentor_specialization
 * 
 * @package local_mentor_specialization
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


use block_completion_monitor\hook\installed;
use local_mentor_specialization\hook_callbacks;

$callbacks = [
    [
        'hook' => installed::class,
        'callback' => [hook_callbacks::class, 'react_to_completion_monitor_installed'],
        'priority' => 100,
    ],
];
