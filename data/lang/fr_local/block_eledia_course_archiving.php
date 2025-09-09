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
 * Strings for component 'block_eledia_course_archiving', language 'fr', version '3.9'.
 *
 * @package     block_eledia_course_archiving
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configure_description'] = 'Ici vous pouvez configurer le processus d\'archivage. Tous les cours qui sont situés directement dans les catégories sources seront vérifiés par rapport à leur date de début.
Si la date se situe dans l\'intervalle de temps entre aujourd\'hui et les jours choisis dans le passé, le cours sera archivé.
Cela signifie que le cours sera rendu invisible,  déplacé dans la catégorie d\'archives configurée et tous les utilisateurs participants seront désinscrits.
Dans une deuxième étape, tous les cours dans les  catégories archives sont comparés à leur date de début du cours. Si c\'est supérieur au nombre choisi de jours dans le passé, le cours sera supprimé. <br /><br /> Le processus peut être initié par un
 formulaire qui est lié dans le bloc. Le bloc peut être ajouté à la page principale uniquement.';
