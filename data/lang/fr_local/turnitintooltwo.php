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
 * Strings for component 'turnitintooltwo', language 'fr', version '3.9'.
 *
 * @package     turnitintooltwo
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['attachrubricnote'] = 'Remarque: les participants pourront voir les grilles d&#39;évaluation jointes et leurs contenus avant de soumettre leur devoir.';
$string['enablepseudo'] = 'Activer les paramètres de confidentialité du participant';
$string['enablepseudo_desc'] = 'Si cette option est sélectionnée, les adresses e-mails des participants seront transformées en pseudo équivalent aux appels d’API de Turnitin.<br /><i>(<b>Remarque :</b> cette option n’est plus modifiable si les données d’un utilisateur Moodle ont déjà été synchronisées avec Turnitin)</i>';
$string['enrolling'] = 'Inscription des participants à Turnitin';
$string['erater_handbook_learners'] = 'Participants en anlais';
$string['errorenrollingall'] = 'Une erreur est survenue pendant l’inscription de l’ensemble des participants sur Turnitin – veuillez consulter votre administrateur système';
$string['excludebiblio_help'] = 'Cette option permet à l’enseignant d’exclure de la recherche de correspondances les textes apparaissant dans une bibliographie, les œuvres citées ou les sections de références des copies des participants lors du traitement du rapport d’originalité. Cette option peut être ignorée individuellement pour chacun des rapports.';
$string['modulename_help'] = 'Crée un exercice Moodle Direct Turnitin qui relie une activité de Moodle à un ou plusieurs exercices Turnitin. Une fois reliée, l&#39;activité permet aux enseignants d’évaluer et de délivrer des observations sur les travaux écrits des participants utilisant les outils d&#39;évaluation, disponibles depuis le Visualiseur de documents Turnitin.';
$string['nonenrolledstudent'] = 'Participant non inscrit';
$string['nonsubmittersformdesc'] = 'Rédigez un message ci-dessous pour l’envoyer aux participants qui n’ont pas encore envoyé de copie pour cet exercice.';
$string['nonsubmittersformsuccess'] = 'Votre message a été envoyé aux participants n’ayant rien envoyé.';
$string['postdate_warning'] = 'Veuillez noter que la modification des dates de l’exercice peut affecter l’affichage des notes pour les participants et le moment où les noms des participants sont révélés aux enseignants.';
$string['pseudoemailsalt_desc'] = '<b>[Facultatif]</b><br />Salage optionnel pour augmenter la complexité de la pseudo adresse e-mail du participant.<br />(<b>Remarque :</b> le salage doit rester inchangé pour garder une certaine cohérence au niveau des pseudo adresses e-mails)';
$string['pseudofirstname'] = 'Pseudo prénom du participant';
$string['pseudofirstname_desc'] = '<b>[Facultatif]</b><br />Prénom du participant qui s’affiche dans le Visualiseur de documents Turnitin';
$string['pseudolastname'] = 'Pseudo nom de famille du participant';
$string['pseudolastname_desc'] = 'Le nom du participant qui s´affiche dans le visualiseur de document Turnitin';
$string['reportgenspeed_help'] = 'Il existe 3 paramétrages possibles pour cet exercice : &#39;Générer les rapports immédiatement (les renvois ne sont pas autorisés)&#39;, &#39;Générer les rapports immédiatement (les renvois sont autorisés jusqu&#39;à la date limite)&#39; et &#39;Générer les rapports à la date limite (les renvois sont autorisés jusqu’à la date limite)&#39;<br /><br />L’option &#39;Générer les rapports immédiatement (les renvois ne sont pas autorisés)&#39; permettra de créer le rapport d’originalité dès que le participant enverra son travail. Si cette option est activée, l’élève ne sera pas en mesure de renvoyer un nouveau travail vers le même exercice.<br /><br />Pour autoriser les renvois, vous devez choisir l’option &#39;Générer les rapports immédiatement (les renvois sont autorisés jusqu&#39;à la date limite)&#39;. Cette option permet au participant d’envoyer indéfiniment sa copie pour l’exercice jusqu’à la date limite. Le temps de traitement du rapport d’originalité des renvois peut durer jusqu’à 24 h.<br /><br />L’option &#39;Générer les rapports à la date limite (les renvois sont autorisés jusqu’à la date limite)&#39; créera les rapports d’originalité uniquement à la date limite de l&#39;exercice. Grâce à cette option, tous les travaux envoyés vers un exercice seront comparés les uns aux autres au moment de la création des rapports d’originalité.';
$string['revealdesc'] = 'Veuillez indiquer ci-dessous un motif pour révéler le nom d&#39;un participant.';
$string['revealerror'] = 'Vous devez renseigner un motif valide pour révéler le nom d’un participant.';
$string['spapercheck'] = 'Comparer avec la base de données documentaire des participants';
$string['spapercheck_help'] = 'Comparer avec la base de données documentaire des participants de Turnitin lors du traitement du Rapport de Similitude. Le pourcentage de similitude peut diminuer si cette option n&#39;est pas sélectionnée.';
$string['student'] = 'Participant';
$string['student_notread'] = 'L&#39;participant n&#39;a pas consulté cette copie.';
$string['student_read'] = 'le participant a consulté la copie le :';
$string['studentdataprivacy'] = 'Configuration de la confidentialité des données des participants';
$string['studentdataprivacy_desc'] = 'Les paramètres suivants peuvent être configurés pour s&#39;assurer que les données personnelles du participant ne sont pas transmises à Turnitin via l’API.';
$string['studentdisclosure'] = 'Accord de divulgation de l&#39;participant';
$string['studentdisclosure_help'] = 'Ce texte apparaîtra aux participants sur la page de chargement des fichiers';
$string['studentremoved'] = 'L&#39;participant a été supprimé du cours Turnitin';
$string['studentremovingerror'] = 'Un problème est survenu en supprimant l&#39;participant du cours Turnitin.';
$string['studentreports'] = 'Montrer les Rapports de Similitude aux participants';
$string['studentreports_help'] = 'Cette option vous permet d’autoriser les participants à voir leur Rapport de Similitude. En sélectionnant Oui, le rapport d’analyse généré par Turnitin sera disponible pour les participants.';
$string['submitnothing'] = 'Activer l’évaluation pour cet participant qui n’a pas envoyé de copie';
$string['submitnothingwarning'] = 'En cliquant sur le crayon gris d&#39;un participant qui n’a pas envoyé de fichier, vous verrez apparaître un modèle d’évaluation qui vous permettra de lui laisser des commentaires GradeMark sur cet exercice. Le modèle d’évaluation remplace l’envoi d’un document et empêche le participant de renvoyer un document si les renvois ne sont pas autorisés.<br><br>Voulez-vous vraiment évaluer sans envoi ?';
$string['submitonfinal'] = 'Soumettre le document lorsque l&#39;participant l&#39;envoie pour l&#39;évaluation';
$string['submitpapersto'] = 'Conserver les travaux des participants';
$string['submitpapersto_help'] = 'Cette option permet aux enseignants de choisir de conserver les travaux des participants dans la base de données documentaire des participants de Turnitin. L&#39;avantage d’un tel choix de stockage est que les travaux soumis à un exercice seront comparés avec l&#39;ensemble des autres copies envoyées par les participants pour vos cours actuels et passés. Si vous sélectionnez &#34;Aucune base de données&#34;, les travaux de vos élèves ne seront pas conservés dans la base de données documentaire des participants.';
$string['tiiaccountsettings_desc'] = 'Veuillez vous assurer que ces paramètres correspondent à ceux configurés dans votre compte Turnitin. Sinon, vous pourriez rencontrer des difficultés lors de la création d’exercices et/ou pour les copies envoyées par les participants.';
$string['turnitinenrolstudents'] = 'Inscrire tous les participants';
$string['turnitinstudents'] = 'Participant Turnitin';
$string['turnitinstudents_desc'] = 'Les utilisateurs sélectionnés ci-dessous sont inscrits à ce cours Turnitin. Les participants inscrits peuvent accéder au cours en se connectant au site Internet de Turnitin';
$string['turnitinstudentsremove'] = 'Voulez-vous vraiment supprimer cet participant du cours Turnitin ?';
$string['turnitintooltwoagreement_desc'] = '<b>[Facultatif]</b><br />Merci d’introduire l’accord de confirmation des envois.<br />(<b>Remarque :</b> si le champ de l’accord reste vierge, aucune confirmation ne sera demandée aux participants lors de leur envoi)';
$string['tutorstatus'] = '{$a->submitted}/{$a->total} copies envoyées par les participants, {$a->graded} copie{$a->gplural} notée(s)';
$string['unanonymiseerror'] = 'Une erreur est survenue en révélant le nom d&#39;un participant';
