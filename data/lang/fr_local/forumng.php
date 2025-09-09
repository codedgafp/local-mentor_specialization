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
 * Strings for component 'forumng', language 'fr', version '3.9'.
 *
 * @package     forumng
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['afterenddatecapable'] = 'Les participants peuvent lire tous les messages de ce forum mais ne peuvent plus publier de messages depuis la fermeture du forum le {$a}. Vous avez toujours accès aux messages publiés.';
$string['beforestartdatecapable'] = 'Les participants peuvent consulter tous les messages de ce forum, mais ne pourront envoyer leur propres publications jusqu\'au : {$a}. Vous avez accès aux messages envoyés avant cette date.';
$string['configshowidnumber'] = 'Inclut les numéros d\'identification dans les rapports liés au forum (peut être vu par les modérateurs mais pas par les participants)';
$string['configshowusername'] = 'Inclut les noms d\'utilisateur dans les rapports liés au forum (peut être vu par les modérateurs mais pas les participants)';
$string['displayperiod_help'] = 'Vous pouvez masquer cette discussion aux participants jusqu\'à, ou à partir, d\'une
certaine date.

Les participants ne voient pas la discussion masquée. Pour les modérateurs, la liste de discussion est affichée en gris avec l\'icône de l\'horloge.';
$string['enableratings_help'] = 'Si l\'option est activée, les messages du forum peuvent être évalués en utilisant une échelle numérique par défaut ou définie. Une ou plusieurs personnes peuvent évaluer le message et l\'évaluation affichée est la moyenne de ces évaluations.<br>Si vous utilisez une échelle numérique jusqu\'à 5 (ou moins), une jolie «étoile» est affichée. Sinon, c\'est une liste déroulante.<br>Les rôles contrôlent qui peut évaluer et voir les évaluations. Par défaut, seuls les enseignants peuvent évaluer les messages, et les participants ne peuvent voir que les notes sur leurs propres messages.';
$string['sharedinfo'] = 'Il s\'agit d\'un forum partagé. Les paramètres d\'accès ici présents ne sont pas partagés, et s\'appliquent exclusivement aux participants qui accèdent au forum partagé de ce cours. Si vous souhaitez éditer d\'autres paramètres pour le forum, merci <a href=\'{$a}\'> d\'éditer les paramètres du forum d\'origine.</a>.';
$string['subscription_help'] = 'Vous pouvez abonner tout le monde de façon imposée, ou de les abonner par défaut, la différence est que dans ce dernier cas, les utilisateurs peuvent choisir de se désabonner.<br>Ces options incluent tous les participants aux cours (participants et enseignants). Les utilisateurs qui n\'appartiennent pas au cours (comme l\'administrateur) peuvent quand même s\'abonner.';
$string['teacher_grades_students'] = 'Les enseignants évaluent les participants';
