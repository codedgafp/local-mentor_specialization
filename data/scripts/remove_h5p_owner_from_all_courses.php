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
 * Remove all H5P owners from all courses.
 * (to launch at the root of the project)
 *
 * @copyright  2023 Edunao SAS (contact@edunao.com)
 * @author     Remi Colet <remi.colet@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This script can only be called by CLI.
define('CLI_SCRIPT', true);

require_once(__DIR__ . '/config.php');

$DB->execute('
    UPDATE {files}
    SET userid = null
    WHERE id IN (
        SELECT f.id
        FROM {files} f
        JOIN {context} c ON c.id = f.contextid
        WHERE f.mimetype = \'application/zip.h5p\'
        AND (c.contextlevel = 50 OR c.contextlevel = 70 or c.contextlevel = 80)
     )
');
