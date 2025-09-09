<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Strings for component 'assignfeedback_offline', language 'fr', version '3.9'.
 *
 * @package     assignfeedback_offline
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enabled_help'] = 'Si ce réglage est activé, l\'enseignant pourra télécharger, puis déposer un formulaire d\'évaluation comprenant les notes des participants.';
$string['feedbackupdate'] = 'Remplir le champ « {$a->field} » avec le texte« {$a->text} » pour le participant « {$a->student} »';
$string['gradesfile_help'] = 'Le formulaire d\'évaluation avec les notes modifiées. Ce fichier doit être un fichier CSV encodé en UTF-8, qui a été téléchargé depuis le devoir, et doit contenir des colonnes pour les notes des participants et leur identifiant.';
$string['gradeupdate'] = 'Mettre la note {$a->grade} au participant {$a->student}';
