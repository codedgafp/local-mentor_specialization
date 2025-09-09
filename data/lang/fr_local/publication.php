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
 * Strings for component 'publication', language 'fr', version '3.9'.
 *
 * @package     publication
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowsubmissionsfromdateh_help'] = 'Vous pouvez déterminer la période durant laquelle les participants peuvent déposer des fichiers ou donner leur approbation pour la publication de leurs fichiers. Durant cette période, les participants peuvent modifier leurs fichiers et peuvent aussi retirer leur approbation pour publication.';
$string['autoimport_help'] = 'Si activé, les nouveaux dépôts de travaux dans le Devoir correspondant seront importés automatiquement dans cette activité. Optionnellement, l\'approbation du participant doit être obtenue à nouveau pour les nouveaux fichiers.';
$string['configobtainstudentapproval'] = 'Les documents sont visibles après approbation du participant.';
$string['configobtainteacherapproval'] = 'Les documents des participants sont par défaut visibles pour les autres participants.';
$string['mode_help'] = 'Définit si les participants déposent des fichiers dans l\'activité, ou si les travaux rendus dans une activité Devoir sont utilisés.';
$string['modeupload'] = 'les participants déposent des fichiers';
$string['nothing_to_show_users'] = 'rien à afficher - aucun participant disponible';
$string['notifystudents'] = 'Notifier les participants des changements approuvés';
$string['notifystudents_help'] = 'Si ce paramètre est activé, les participants recevront un message dès que le statut d\'approbation d\'un de leur document est modifié. Les méthodes de message sont paramétrables.';
$string['notifyteacher_help'] = 'Si ce paramètre est activé, les évaluateurs recevront un message quand un participant dépose un fichier. Les méthodes de message sont paramétrables.';
$string['obtainstudentapproval_help'] = 'L\'approbation des participants est-elle nécessaire ?
<br>
<ul>
<li> oui - les fichiers ne seront visibles par tous qu\'après l\'approbation du participant. L\'enseignant peut demander l\'approbation de participants ou de fichiers individuels.</li>
<li> non - la visibilité des fichiers est déterminée par l\'enseignant uniquement.</li>
</ul>';
$string['privacy:metadata:files'] = 'Stocke des informations (identifiant, propriétaire, provenance, hachage du contenu, nom du fichier et si approuvé par l\'enseignant et/ou le participant) sur les fichiers déposés ou importés dans mod_publication.';
$string['privacy:metadata:studentapproval'] = 'Indique si le participant a approuvé ou rejeté le fichier.';
$string['privacy:metadata:type'] = 'Indique l\'origine du fichier (déposé par le participant, importé depuis un devoir de type fichier ou de type texte en ligne).';
$string['publication:approve'] = 'Décider si les fichiers doivent être visibles par tous les participants';
$string['studentapproval_help'] = 'Représente l\'état de l\'approbation par le participant :

* ? - en attente
* ✓ - approuvé
* ✖ - rejeté';
$string['updatefileswarning'] = 'Les fichiers de chaque participant seront mis à jour avec leur travail rendu dans l\'activité Devoir. Les fichiers déjà visibles ici seront remplacés aussi, s\'ils ont été supprimés ou modifiés. Les réglages de visibilité (approbation) du participant ne seront pas modifiés.';
$string['visibleforstudents_no'] = 'Ce fichier n\'est PAS visible par les participants';
$string['visibleforstudents_yes'] = 'Ce fichier est visible par les participants';
$string['warning_changefromobtainstudentapproval'] = 'Si vous effectuez cette modifications, vous seul pourrez décider quels fichiers sont visibles par tous les participants. L\'approbation des participants ne sera pas demandée. Tous les fichiers marqués comme approuvés deviendront visibles par tous les participants, sans prendre en compte les décisions des participants.';
$string['warning_changefromobtainteacherapproval'] = 'Après l\'activation de ce réglage, tous les fichiers déposés seront visibles par les autres participants. Vous pourrez rendre les fichiers invisibles à certains participants manuellement.';
$string['warning_changetoobtainstudentapproval'] = 'Si vous effectuez cette modification, l\'approbation des participants sera nécessaire pour tous les fichiers marqués comme visibles. Ces fichiers ne deviendront visibles qu\'après l\'approbation des participants.';
