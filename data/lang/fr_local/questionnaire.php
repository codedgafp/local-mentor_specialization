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
 * Local language pack from http://dgafp.local
 *
 * @package    mod
 * @subpackage quastionnaire
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


$string['completionsubmit'] = 'Compléter le questionnaire';
$string['minforcedresponses_help'] = 'Utilisez ces paramètres si vous voulez forcer les participants à cocher un minimum de **Min. cases à cocher** ou un maximum de **Max. cases à cocher**.
Pour les forcer à cocher un nombre exact de cases, tapez la même valeur pour **Min.** et **Max**. Si vous voulez uniquement forcer un minimum ou un maximum de cases cochées, laissez l\'autre valeur à zéro. Ex. pour avoir un minimum de 2 cases cochées sur un total de 5, tapez **Min.** = 2 et laissez **Max.** à 0.
Si vous avez saisi pour l\'un ou l\'autre de ces paramètres une valeur différente de 0, si le participant ne respecte pas le nombre mini ou maxi imposé, un message d\'erreur sera affiché.
Évidemment, il vous appartient de préciser vos exigences dans le texte de la question !';
$string['qtype_help'] = 'Ce paramètre vous permet de définir si les participants pourront répondre au questionnaire une seule fois, une fois par jour, par semaine, par mois ou un nombre illimité de fois.';
$string['respondenteligiblestudents'] = 'Les participants seulement';
$string['respondenttype_help'] = 'Vous pouvez ici choisir si le nom du participant sera affiché ou non lorsque vous visualiserez les réponses à ce questionnaire. Si non, le mot **Anonyme** sera affiché.';
$string['responseview'] = 'Les participants peuvent voir TOUTES les réponses';
$string['responseview_help'] = 'Vous pouvez paramétrer si les participants auront le droit de voir les réponses de leurs camarades (tableau statistique général).';
$string['resume_help'] = 'Cette option permet aux participants de sauvegarder leurs réponses à un questionnaire avant de les soumettre. Les participants peuvent commencer à répondre, sauvegarder l\'état d\'avancement, et reprendre le questionnaire plus tard à leur convenance, pour reprendre au point où ils en étaient. Ceci peut se révéler utile pour un questionnaire particulièrement long.';
$string['url_help'] = 'Adresse vers laquelle rediriger le participant après qu\'il a soumis ses réponses.';
