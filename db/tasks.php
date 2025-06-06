<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin scheduled tasks
 *
 * @package    local_mentor_specialization
 * @copyright  2021 Edunao SAS (contact@edunao.com)
 * @author     adrien <adrien@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$tasks = [
    [
        'classname' => 'local_mentor_specialization\task\open_sessions',
        'blocking' => 0,
        'minute' => '*/5',
        'hour' => '*',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\close_sessions',
        'blocking' => 0,
        'minute' => '*/5',
        'hour' => '*',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\archive_sessions',
        'blocking' => 0,
        'minute' => '*/5',
        'hour' => '*',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\email_disabled_accounts',
        'blocking' => 0,
        'minute' => '*/10',
        'hour' => '*',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\email_library_updates',
        'blocking' => 0,
        'minute' => 0,
        'hour' => '8',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\email_catalog_updates',
        'blocking' => 0,
        'minute' => 0,
        'hour' => '8',
        'day' => '*',
        'dayofweek' => '1',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\email_library_publish',
        'blocking' => 0,
        'minute' => 0,
        'hour' => '8',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
    ],
    [
        'classname' => 'local_mentor_specialization\task\delete_archived_sessions',
        'blocking' => 0,
        'minute' => '0',
        'hour' => '0',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
        'disabled' => 1,
    ],
    [
        'classname' => 'local_mentor_specialization\task\notify_delete_archived_sessions',
        'blocking' => 0,
        'minute' => '0',
        'hour' => '0',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
        'disabled' => 1,
    ],
    [
        'classname' => 'local_mentor_specialization\task\update_user_mainentity',
        'blocking' => 0,
        'minute' => '*',
        'hour' => '2',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
        'disabled' => 1,
    ],
    [
        'classname' => 'local_mentor_specialization\task\identify_external_users_and_without_mainentity',
        'blocking' => 0,
        'minute' => '*',
        'hour' => '3',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*',
        'disabled' => 1,
    ],
];
