<?php

use core\task\scheduled_task;

defined('MOODLE_INTERNAL') || die();

/**
 * Get the interval between 2 task in sting "x month x day x hour x minute"
 * 
 * @param \core\task\scheduled_task $task
 * @return string
 */
function make_task_time_interval_string(scheduled_task $task): string
{
    // Preparing each time after formatting the task period
    $periodArray = [
        "minute" => 0,
        "hour" => 0,
        "day" => 0,
        "month" => 0,
    ];

    $taskperiod = [
        "minute" => $task->get_minute(),
        "hour" => $task->get_hour(),
        "day" => $task->get_day(),
        "month" => $task->get_month(),
    ];

    foreach ($taskperiod as $type => $expression) {
        $periodArray[$type] = formatting_task_time_period($expression);
    }

    return  $periodArray["month"]." month " . $periodArray["day"]." day ".$periodArray["hour"]." hour ".$periodArray["minute"]." minute";
       
}

/**
 * Formatting each time expression from the task to only keep the number
 * 
 * @param string $expression
 * @return int
 */
function formatting_task_time_period(string $expression): int 
{
    $timevalue = 0;

    // Manage "*" expression
    if ($expression !== '*') {
        $timevalue = intval($expression);
    }

    // Manage "/" expression
    if (strpos($expression, '/') !== false) {
        // For "*/5" we're only keeping the 5
        $parts = explode('/', $expression);
        $timevalue = intval(end($parts));
    }

    // Manage list (ex: "1,2,3")
    if (strpos($expression, ',') !== false) {
        $numbers = explode(',', $expression);
        $numbersArray = array_map('intval', $numbers);
        // We're only keeping the last value of the list
        $timevalue = intval(end($numbersArray));
    }

    // Manage ranges (ex: "1-5")
    if (strpos($expression, '-') !== false) {
        $range = explode('-', $expression);
        $start = intval($range[0]);
        $end = intval($range[1]);
        // We keep the difference between the range
        $timevalue = intval($end - $start);
    }

    return $timevalue;
}
