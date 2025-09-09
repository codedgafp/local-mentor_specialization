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
 * Strings for component 'attendance', language 'fr', version '3.9'.
 *
 * @package     attendance
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['automark_help'] = 'Permet de compléter le marquage automatiquement.
Si « Oui », les participants seront automatiquement marqués en fonction de leur premier accès au cours.
Si « Définir non marqué à la fin de la session », les participants qui n\'ont pas marqué leur présence seront mis sur le statut non marqué sélectionné.';
$string['commonsession'] = 'Tous les participants';
$string['commonsessions'] = 'Tous les participants';
$string['emailcontent_help'] = 'Lorsqu\'un avertissement est envoyé à un participant, le contenu de l\'e-mail est extrait de ce champ. Les caractères génériques suivants peuvent être utilisés :
<ul>
<li>%coursename%</li>
<li>%userfirstname%</li>
<li>%userlastname%</li>
<li>%userid%</li>
<li>%warningpercent%</li>
<li>%attendancename%</li>
<li>%cmid%</li>
<li>%numtakensessions%</li>
<li>%points%</li>
<li>%maxpoints%</li>
<li>%percent%</li>
</ul>';
$string['emailsubject_help'] = 'Lorsqu\'un avertissement est envoyé à un participant, le sujet du courriel est extrait de ce champ.';
$string['emailuser_help'] = 'Si activé, un avertissement sera envoyé au participant.';
$string['encoding_help'] = 'Fait référence au type d\'encodage des code-barres utilisé sur la carte d\'identité des participants. Les types caractéristiques de schémas d\'encodage de code-barres incluent Code-39, Code-128 et UPC-A.';
$string['error:qrcode'] = 'L\'autorisation pour les participants d\'enregistrer leur propre présence doit être activée pour utiliser le code QR ! Ignoré.';
$string['eventtakenbystudent'] = 'Statut de présence renseigné par le participant';
$string['groupsession'] = 'Groupe de participants';
$string['identifyby'] = 'Identifier le participant par';
$string['modulename_help'] = 'Le module d\'activité présence permet à un enseignant d\'enregistrer les présences aux cours et permet aux participants de visualiser leurs présences.

L\'enseignant peut créer plusieurs sessions et noter les participations comme « Présent », « Absent », « Retard » ou « Excusé » et modifier les statuts si besoin.

Les rapports sont disponibles pour la classe entière ou individuellement pour chaque participant.';
$string['passwordgrp'] = 'Mot de passe participant';
$string['passwordgrp_help'] = 'Si défini, les participants devront entrer ce mot de passe avant qu\'ils puissent définir leur propre statut de présence pour la session. Si vide, aucun mot de passe n\'est nécessaire.';
$string['preventsharederror'] = 'L\'auto-marquage a été désactivé pour une session car cet appareil semble avoir été utilisé pour enregistrer la présence d\'un autre participant.';
$string['preventsharedip'] = 'Empêcher les participants de partager des adresses IP';
$string['preventsharedip_help'] = 'Empêcher les participants d\'utiliser un même appareil (identifié par l\'utilisation d\'une adresse IP) pour noter la présence d\'autres participants.';
$string['privacy:metadata:attendancewarningdone'] = 'Journal des avertissements envoyés aux participants sur leur fiche de présence.';
$string['privacy:metadata:statusid'] = 'Identifiant de l\'état de présence du participant.';
$string['privacy:metadata:studentid'] = 'Identifiant du participant ayant enregistré la présence.';
$string['privacy:metadata:takenby'] = 'Identifiant de l\'utilisateur qui a pris la présence du participant.';
$string['privacy:metadata:timetaken'] = 'Horodatage de la prise de présence pour le participant.';
$string['resultsperpage_desc'] = 'Nombre de participants affichés sur une page';
$string['sessiontype_help'] = 'Vous pouvez ajouter des sessions pour tous les participants ou pour un groupe de participants. La possibilité d\'ajouter différents types dépend du mode de groupe de l\'activité.

* En mode groupe « Aucun groupe », vous ne pouvez ajouter que des sessions pour tous les participants.
* En mode groupe « Groupes séparés », vous ne pouvez ajouter que des sessions pour un groupe de participants.
* En mode groupe « Groupes visibles », vous pouvez ajouter les deux types de sessions.';
$string['set_by_student'] = 'Renseigné par le participant';
$string['setunmarked_help'] = 'Si le marquage automatique est activé dans les paramètres de la session, sélectionnez la valeur par défaut qui sera attribuée au participant si celui-ci omet d\'entrer sa présence.';
$string['studentavailability'] = 'Disponible pour les participants (minutes)';
$string['studentid'] = 'ID Participant';
$string['studentmarking'] = 'Saisie par le participant';
$string['studentpassword'] = 'Mot de passe participant';
$string['studentrecordingexpanded'] = 'Enregistrement des participants déplié';
$string['studentrecordingexpanded_desc'] = 'Affiche le paramètre « Enregistrement participant » déplié par défaut lors de la création de nouvelles sessions.';
$string['studentscanmark'] = 'Permettre aux participants de renseigner eux-mêmes leur présence';
$string['studentscanmark_desc'] = 'Si coché, les enseignants pourront autoriser les participants à enregistrer eux-mêmes leur présence.';
$string['studentscanmark_help'] = 'Cette option permet aux participants de renseigner eux-mêmes leur statut de présence';
$string['studentscanmarksessiontime'] = 'Les participants enregistrent la fréquentation pendant le temps de la session';
$string['studentscanmarksessiontime_desc'] = 'Si les participants vérifiés ne peuvent enregistrer leur présence qu\'au cours de la session.';
$string['usemessageform'] = 'ou utiliser le formulaire ci-dessous pour envoyer un message aux participants sélectionnés';
$string['warningdesc_course'] = 'Les seuils d’avertissements définis ici affectent le rapport d’absence et permettent aux participants et aux tiers d’être notifiés. Si plusieurs avertissements sont déclenchés en même temps, seul l\'avertissement avec le seuil d\'avertissement le plus bas sera envoyé.';
