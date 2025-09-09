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
 * Strings for component 'teamup', language 'fr', version '3.9'.
 *
 * @package     teamup
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allstudents'] = 'Tous les participants';
$string['analyzeaggregatewarning'] = '<br><span style="color:{color};"> Critère {answer} : <b>{nbstudent}</b>=> Nombre de groupes probables : {nbgroup} composé de {nbstudentgroup} participants avec {reste} participants éparpillés.</span>';
$string['analyzeaggregatewarningOK'] = '<br><span style="color:{color};"> Critère {answer}</td><td>: <b>{nbstudent}</b>=>Nombre de groupes probables : {nbgroup} composé de {nbstudentgroup} participants.</span>';
$string['analyzeclustercriterion'] = 'Le nombre de participants répondant à ces critères est de <b>{nbstudent}</b> répartis dans <b>{nbteam}</b> groupes.';
$string['analyzeclustersuccess'] = '<br>Il pourra y avoir deux participants dans tous les groupes avec ces critères.';
$string['analyzeclusterwarning'] = '<br><span style="color:red;">Attention, il ne pourra pas y avoir deux participants dans tous les groupes avec ces critères.</span>';
$string['criterionquestion'] = 'Concerne les participants ayant répondu {question} :';
$string['deleteAllRed'] = 'Supprimer tous les participants sans réponse';
$string['equalizeHelp'] = 'Force le nombre de participants par groupes indépendamment des critères basés sur le nombre entre parenthèses. Parfois nécessaire après une optimisation';
$string['helpserie'] = '<p>#
                                          Le module de création de groupes peut être utilisé pour créer des séries.<br>
                                          Les séries sont des groupes de participants créer avec comme seul critère l\'ordre alphabétique.<br>
                                          Ces groupes sont préfixés par le terme « Série » ex:« Série 01 »<br>
                                          L\'utilité des groupes séries est qu\'ils sont utilisés comme filtres sur la liste des participants.<br>
                                          Par défaut, vous créez les groupes sur l\'ensemble des participants du cours.<br>
                                          Les séries permettent de les créer sur un sous-groupe de participants particuliers.<br>
                                          C\'est utile pour de grosses classes, entre autres.<br>
                                          Il est possible de créer des séries sois-même indépendamment du bouton série.<br>
                                          A la création du groupe dans Moodle, quand le nom de ce groupe vous est demandé. Commencez le nom du groupe par « Série » ex : « Série Classe réelle ».<br>
                                          Cella vous permet de réduire le nombre de participant au cours en tenant compte des assistants ou de participants qui ne sont effectivement pas présent.<br>
                                          Une fois les séries créées, le bouton série disparait. Pour le faire réapparaitre si nécessaire, il faut supprimer l\'ensemble des groupes séries.<br>
                                          Mais, il reste toujours possible de les créer en préfixant le nom du groupe par Série.<br>
                                        </p>';
$string['keepAllRed'] = 'Garder uniquement les participants sans réponse';
$string['modulename_help'] = 'Ce module est un outil pour affecter des participants à des groupes Moodle, créés en fonction de leurs réponses à une série de questions que vous spécifiez.
L\'idée est de formuler des questions à choix multiple avec d\'éventuelles restrictions afin de répartir les participants dans les groupes sur base de 4 logiques :
* grouper les individus semblables
* disperser les individus semblables
* éviter les minorités
* équilibrer le niveau (sur base d\'une réponse chiffrée).
L\'outil distribue les participants de manière égale parmi un nombre spécifié de groupes.
Ce plugin est un fork du module Moodle <a href=\\"https://moodle.org/plugins/mod_teambuilder\\" target=\\"_blank\\"> Team Builder </a> dont notre module copie l\'interface.
L\'algorithme de répartition et ses options s\'inspirent ceux du projet Open Source <a href=\\"https://www.groupeng.org/GroupENG\\" target=\\"_blank\\"> GroupEng </a>.';
$string['nbStudent'] = 'Nombre de participants';
$string['noanswer'] = 'Cet participant n\'a pas répondu.';
$string['presentation'] = '<h3>Présentation du module</h3>
<p>
L\'activité  Formation de groupes assitée (Team Up) permet de composer un questionnaire avec des questions à choix multiple avec possibilité de restrictions sur les réponses.

<p>
Le premier onglet de l\'activité, <b>Questionnaire</b>, permet de créer les questions pour les participants.<br>
<b>Prévisualisation des questions</b>, le second onglet, permet de voir le formulaire auquel les participants vont devoir répondre. <br>
Le dernier onglet,<b>Prévisualiser</b>, permet la création des groupes par l\'enseignant.<br>
</p>

<p>
La création des groupes se fait en deux étapes. La première étape est une simulation.
Pendant la simulation, il est possible de modifier les critères, les réordonner et de déplacer les participants manuellement d\'un groupe à l\'autre.
Et l\'étape suivante est la création effective des groupes dans Moodle.<br>
Il ne faut donc pas oublier d\'appuyer sur <button type=\\"button\\" class=\\"creategroups\\" style=\\"font-size: 1.0em;\\" id=\\"\\">Créer les groupes dans Moodle</button> pour finaliser la création.<br>
</p>

<p>
Il y a quatre opérateurs de base pour créer les groupes.<br>
<table class="mod-teamup-table">
  <tr><td>Grouper les individus semblables</td><td>= Former des groupes dont les membres sont similaires concernant des critères définis. Création de groupes homogènes. Appliqué à des valeurs discrètes, sans obligation qu\'elles soient numériques.</td></tr>
  <tr><td>Disperser les individus semblables</td><td>= Répartir les participants répondant à un critère à travers les groupes. Appliqué à des valeurs discrètes, sans obligation qu\'elles soient numériques.</td></tr>
  <tr><td>Eviter les minorités</td><td>= Répartir les participants de manière à ce qu\'au moins deux participants partageant un critère soient dans le même groupe (notamment concernant les minorités). Appliqué à des valeurs discrètes, sans obligation qu\'elles soient numériques.</td></tr>
  <tr><td>Equilibrer le niveau</td><td>= Créer des groupes qui soient « justes », dont les forces totales sont similaires dans tous les groupes (généralement basé sur des résultats académiques). Appliqué à des valeurs numériques (continues et discrètes).</td></tr>
</table>
</p>

<p>
Lorsque vous prévisualisez une répartition, vous pouvez cliquez sur le bloc associé à un participant, vous voir ses informations et réponses dans une info-bulle.<br>
Si un participant ne doit pas entrer dans le répartition, vous pouvez le supprimer en cliquant sur la croix à côté de son nom.<br>
</p>
<u>La barre d\'action :</u><br>
Nombre de groupes :<input id="nbteam" min="1" style="width:40px;height:21px;margin-top:5px;margin-right:5px;" value="31" type="number" disabled="">31 / 123(4)</span> <button type="button" id="buildteams" class=""><strong>Prévisualisation</strong></button> <button type="button" id="resetteams" class="">Réinitialiser</button> <button type="button" id="prettify" style="">Optimiser</button> <button type="button" id="serie"">Série</button> <button type="button" id="equalize" style="">Égaliser</button>
<ul>
  <li>Le nombre de groupes détermine le nombre de participants approximatif par groupe ex: 123 participants dans 31 groupes donnent 4. Indiqué entre parenthèses à côté du nombre de participants.</li>
  <li>Prévisualiser : Ce bouton crée les groupes selon les critères dans la prévisualisation.</li>
  <li>Réinitialiser : Ce bouton remet tous les participants hors des groupes dans la partie <b>non affecté aux groupes</b></li>
  <li>Optimiser : Ce bouton essaye d\'améliorer la répartition des groupes en fonction des critères. Le succès n\'est pas garanti mais vous pouvez répéter plusieurs fois l\'opération.</li>
  <li>Égaliser : Force le nombre de participants par groupes  indépendamment des critères basés sur le nombre entre parenthèses. Parfois nécessaire après une optimisation.</li>
</ul>
</p>';
