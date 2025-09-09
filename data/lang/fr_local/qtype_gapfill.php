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
 * Strings for component 'qtype_gapfill', language 'fr', version '3.9'.
 *
 * @package     qtype_gapfill
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['noduplicates_help'] = 'Si cette option est activée, chaque réponse doit être unique, ce qui est utile lorsque chaque champ possède un | comme opérateur. Par exemple : Quelles sont les couleurs des médailles olympiques ? Chaque champ est composé de [or|argent|bronze], si le participant choisit « or » 3 fois, seul le premier champ sera compté comme juste (les autres ne seront pas considérés comme des bonnes réponses). Cela permet d\'éliminer au fur et à mesure les propostitions disponibles et ainsi éviter tous doublons dans les réponses';
$string['wronganswers_help'] = 'Liste de mauvaises réponses faite pour détourner le participant des bonnes réponses. Chaque mot est séparé par des virgules, disponible seulement dans les modes glisser-déposer et liste déroulante';
