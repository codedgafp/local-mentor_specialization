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
 * Enable all self enrol session with status completed and archived.
 *
 * @copyright  2023 Edunao SAS (contact@edunao.com)
 * @author     Remi Colet <remi.colet@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This script can only be called by CLI.
define('CLI_SCRIPT', true);

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/local/mentor_core/classes/model/session.php');

$time = time();

/*
SQL : Liste des inscriptions automatique liées à des sessions au statut terminée ou archivée qui sont désactivé

SELECT e.id as enrolid, e.enrol as enrol, c.id as courseid, s.id as sessionid
FROM mdl_enrol e
         JOIN mdl_course c ON c.id = e.courseid
         JOIN mdl_session s ON s.courseshortname = c.shortname
WHERE (s.status = 'completed' OR s.status = 'archived')
  AND e.enrol = 'self'
  AND e.status = 1;

*/

$DB->execute('
    UPDATE {enrol}
    SET status       = 0,
        enrolenddate = ' . $time . '
    WHERE id IN (SELECT e.id
             FROM {enrol} e
             JOIN {course} c ON c.id = e.courseid
             JOIN {session} s ON s.courseshortname = c.shortname
             WHERE (
                 s.status = \'' . \local_mentor_core\session::STATUS_COMPLETED . '\' OR
                 s.status = \'' . \local_mentor_core\session::STATUS_ARCHIVED . '\'
             )
             AND e.enrol = \'self\'
             AND e.status = 1
     )
');
