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
 * Strings for component 'assignfeedback_file', language 'fr', version '3.9'.
 *
 * @package     assignfeedback_file
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['batchoperationconfirmuploadfiles'] = 'Déposer un ou plusieurs fichiers de feedback pour tous les participants sélectionnés ?';
$string['enabled_help'] = 'Si ce réglage est activé, l\'enseignant peut déposer des fichiers comme feedback lors de l\'évaluation des devoirs. Ces fichiers peuvent être, par exemple mais pas seulement, les travaux des participants annotés, des documents avec des commentaires ou des feedbacks audio.';
$string['feedbackfileadded'] = 'Nouveau fichier de feedback « {$a->filename} » pour le participant « {$a->student} »';
$string['feedbackfileupdated'] = 'Fichier de feedback « {$a->filename} » modifié pour le participant « {$a->student} »';
$string['feedbackzip_help'] = 'Un fichier ZIP contenant une liste de fichiers de feedback pour un ou plusieurs participants. Les fichiers de feedback seront attribués aux participants en fonction de leur identifiant utilisateur, qui doit être la 2e partie du nom de chaque fichier, immédiatement après le nom de l\'utilisateur. Cette convention est utilisée lorsque vous téléchargez les travaux remis. Il est donc plus simple de télécharger tous les travaux remis, ajouter des commentaires et re-compresser le tout, puis de déposer le fichier ZIP. Les fichiers non modifiés seront ignorés.';
$string['privacy:metadata:filepurpose'] = 'Fichiers de feedback de l\'enseignant pour le participant.';
