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
 * Strings for component 'block_xp', language 'fr', version '3.9'.
 *
 * @package     block_xp
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configdescription_help'] = 'Une courte introduction est affichée dans le bloc, sous le niveau du participant. Les participants ont la possibilité de masquer ce message pour ne plus le voir.';
$string['configrecentactivity_help'] = 'Si c\'est activé, le bloc affichera une courte liste d\'événements récents qui ont récompensé le participant avec des points.';
$string['enablecheatguard_help'] = 'La mise en garde sur la triche offre une technique simple qui empêche les participants d\'abuser du système en utilisant des techniques évidentes telles que rafraîchir la page sans arrêt ou répéter la même action en boucle.';
$string['enableinfos_help'] = 'Lorsque ce réglage est sur «Non», les participants ne seront pas en mesure d\'afficher la page d\'infos.';
$string['enableladder_help'] = 'Lorsque ce réglage est sur «Non», les participants ne seront pas en mesure d\'afficher l\'échelle.';
$string['enablelevelupnotif_help'] = 'Lorsque ce réglage est à \'Oui\', une fenêtre surgissante sera affichée pour féliciter les participants du nouveau niveau atteint.';
$string['eventsrules_help'] = 'Ce plugin utilise les événements pour attribuer des points aux actions effectuées par les participants.
Vous pouvez utiliser le formulaire ci-dessous pour ajouter vos propres règles et modifier celles par défaut.

Il est conseillé de consulter la page _Log_ du plugin pour identifier les événements déclenchés lorsque les participants effectuent des actions dans le cours.

Ressources additionnelles:

- [Comment sont calculés les points d\'expérience?] (Https://levelup.plus/docs/article/how-are-experience-points-calculated?ref=blockxp_help)
- [Règles de dépannage] (https://levelup.plus/docs/article/event-rule-not-working?ref=blockxp_help)';
$string['rulesformhelp'] = '<p> Ce plugin utilise les événements pour attribuer des points d\'expérience aux participants selon les actions effectuées. Vous pouvez utiliser le formulaire ci-dessous pour ajouter vos propres règles et voir celles par défaut. </p>
<p> Il est conseillé de vérifier le plugin <a href="{$a->log}">historique</a> pour identifier les événements qui sont déclenchés lorsque vous effectuez des actions dans le cours, et aussi pour en savoir plus sur les événements eux-mêmes: <a href="{$a->list}">liste de tous les événements</a> , <a href="{$a->doc}">documentation développeur</a> . </p>
<p> Enfin, veuillez noter que le plugin ignore toujours:
<ul>
    <li> Les actions effectuées par les administrateurs, invités ou non connectés. </li>
    <li> Les actions réalisées par des utilisateurs n\'ayant pas la permission <em>block/xp:earnxp</em>.</li>
    <li> Les actions répétées dans un court intervalle de temps, pour éviter la tricherie. </li>
    <li> Et les événements de niveau d\'éducation différent de <em>participation.</em> </li>
</ul>
</p>';
