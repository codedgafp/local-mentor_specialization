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
 * Strings for component 'randomactivity', language 'fr', version '3.9'.
 *
 * @package     randomactivity
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmreassign'] = 'Vous êtes sur le point de modifier le pool d\'activités utilisé par cette activité aléatoire. Les participants se verront attribuer de nouvelles activités. <br>
Les participants qui ont commencé à travailler sur leur activité précédemment attribuée perdront leur progression si une autre activité leur est attribuée. <br>
Les participants qui ont obtenu une note pour leur activité précédemment attribuée perdront leur note pour cette activité  si une autre activité leur est attribuée.';
$string['dynamicdisplay_help'] = 'Si réglé sur « Oui », cette activité s\'affichera sur la page du cours en tant que l\'activité vers laquelle elle pointe. Cela ne modifiera que que les participants.';
$string['modulename_help'] = 'Le module Activité aléatoire permet à l\'enseignant de définir un groupe d\'activités ; les participants se verront attribuer une de ces activités au hasard. <br><br>
La note d\'activité sera récupérée pour chaque participant et utilisée comme note d\'activité aléatoire. <br>
La graine aléatoire peut être personnalisée afin de garantir la cohérence entre les activités pour chaque participant.';
$string['orderbyselect_help'] = 'Si "Trier par apparition dans le cours" est sélectionné, les Activités Aléatoires apparaîtront telles qu\'elles apparaissent dans le cours. <br> <br>
Si " Grouper par classement" est sélectionné, les Activités Aléatoires seront regroupées dans plusieurs tableaux, avec toutes les Activités Aléatoires dans le même tableau ayant le même classement. <br>
Les activités aléatoires avec les même classement signifie qu\'ils ont le même grain et le même nombre d\'activités. Tout participant participant à plusieurs de ces activités aléatoires se verra attribuer la même n-ième activité (par exemple, à la première activité de chaque activité aléatoire avec le même classement).';
$string['pluginname_help'] = 'Vous pouvez définir ici le pool d\'activités à utiliser pour cette activité aléatoire. <br> Seuls les enseignants peuvent voir cette page.
Les participants accédant à cette activité seront redirigés vers l\'activité tirée au sort à laquelle ils sont attribués.';
$string['seed_help'] = 'La graine permet de définir quelle activité est attribuée à quel participant. <br> Vous pouvez configurer plusieurs activités aléatoires avec <b>le même nombre d\'activités</> et <b>la même graine</b>.
Ces activités aléatoires attribueront les activités de la même manière : les participants recevant la première activité d\'une activité aléatoire se verront attribués également la première activité des autres activités aléatoires. <br>';
