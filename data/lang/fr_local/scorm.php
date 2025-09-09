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
 * Fr custom translations
 *
 * @package    mod_scorm
 * @copyright  2022 Edunao SAS (contact@edunao.com)
 * @author     adrien <adrien@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['popup'] = 'Nouvel onglet';
$string['completionstatusrequireddesc'] = 'le participant doit atteindre au moins l\'un des statuts suivants : {$a}';
$string['forcenewattempts_help'] = 'Il y a 3 options disponibles :
* Non – Si une tentative précédente est terminée, réussie ou a échoué, le participant aura la possibilité d\'entrer en mode relecture ou d\'effectuer une nouvelle tentative.
* Lorsque la tentative précédente a été terminée, réussie ou a échoué – Tient compte du réglage du paquetage SCORM définissant l\'état « terminé », « réussi » ou « échoué ».
* Toujours – Chaque nouvel accès à l\'activité SCORM générera une nouvelle tentative et le participant ne sera pas dirigé au point atteint lors de la tentative précédente.';
$string['indicator:cognitivedepth_help'] = 'Cet indicateur est basé sur la profondeur cognitive atteinte par le participant dans une activité SCORM.';
$string['indicator:socialbreadth_help'] = 'Cet indicateur se base sur l\'interaction sociale atteinte par le participant dans une activité SCORM.';
$string['lastattemptlock_help'] = 'Si ce réglage est activé, les participants ne peuvent plus lancer le lecteur SCORM une fois qu\'ils ont épuisé le nombre de tentatives qui leur sont allouées.';
$string['skipview'] = 'Cacher la structure du contenu aux participants';
$string['skipview_help'] = 'Ce réglage détermine si la structure du contenu est cachée aux participant. Si le paquetage ne contient qu\'un seul objet d\'apprentissage. Si la page ne contient qu\'un seul objet d\'apprentissage, l\'affichage de la page de structure de contenu pourrait toujours être sautée. Si l\'option  d\'affichage est « jamais », la structure du contenue sera donc montrée à chaque accès. Il est possible de choisir de ne montrer la structure que lors du premier accès, en choisissant « Toujours, sauf la première fois ».

Notez que ce réglage n\'a d\'effet que pour les participants.';
$string['skipviewdesc'] = 'Ce réglage détermine si la structure du contenu est par défaut cachée aux participants';
