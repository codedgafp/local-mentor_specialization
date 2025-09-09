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
 * Local language pack from http://localhost/mentor
 *
 * @package    core
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
global $CFG;

$string['emailonlyallowed'] = 'Cette adresse de courriel ne fait pas partie de celles qui sont autorisées.';
$string['newusernewpasswordtext'] = 'Bonjour {$a->firstname},

Un nouveau compte a été créé pour vous sur <b>la plateforme interministérielle de ' . '
formation Mentor</b>. Un mot de passe temporaire vous a été attribué.

Les informations nécessaires à votre connexion sont maintenant :
    Identifiant : votre adresse e-mail
    Mot de passe: {$a->newpassword}

Vous devrez changer votre mot de passe lors de votre première connexion. Ensuite, vous ' . '
serez invité à <b>compléter votre profil</b>. L\'exactitude des informations saisies permettra ' . '
de <b>garantir l\'accès à toutes les formations qui vous sont réservées</b>.

Pour commencer à travailler sur Mentor, veuillez-vous connecter en cliquant sur le lien ci-dessous.
<br/><a href="{$a->link}">{$a->link}</a>

Dans la plupart des logiciels de courriel, cette adresse devrait apparaître comme un lien ' . '
de couleur bleue qu\'il vous suffit de cliquer. Si cela ne fonctionne pas, copiez ce lien et ' . '
collez-le dans la barre d\'adresse de votre navigateur web.

Si vous avez besoin d\'aide, veuillez consulter la page <a href="' . $CFG->wwwroot . '/local/staticpage/view.php?page=faq">FAQ</a> dans le bas de page.
Note : Pour en savoir plus sur la gestion de vos données à caractère personnel et l\'exercice de vos droits, vous pouvez consulter la <a href="' . $CFG->wwwroot . '/local/staticpage/view.php?page=donneespersonnelles">politique de confidentialité</a>.

L\'équipe Mentor

<img src="' . $CFG->wwwroot . '/theme/mentor/pix/logo.png" alt="Logo de Mentor" style="width:200px; height:56px;">';
$string['newpasswordtext'] = 'Bonjour {$a->firstname},

Le mot de passe de votre compte sur <b>la plateforme interministérielle de ' . '
formation Mentor</b> a été remplacé par un nouveau mot de passe temporaire.

Les informations pour vous connecter sont désormais :
    Identifiant : votre adresse e-mail
    Mot de passe : {$a->newpassword}

Merci de visiter cette page afin de changer de mot de passe :
<br/><a href="{$a->link}">{$a->link}</a>

Dans la plupart des logiciels de courriel, cette adresse devrait apparaître comme un lien de couleur ' . '
bleue qu\'il vous suffit de cliquer. Si cela ne fonctionne pas, copiez ce lien et collez-le dans ' . '
la barre d\'adresse de votre navigateur web.

Si vous avez besoin d\'aide, veuillez contacter l\'administrateur du site <b>Mentor</b>,

L\'équipe Mentor

<img src="' . $CFG->wwwroot . '/theme/mentor/pix/logo.png" alt="Logo de Mentor" style="width:200px; height:56px;">';
$string['emailconfirmation'] = 'Bonjour,

Un nouveau compte a été demandé sur « {$a->sitename} » avec votre adresse de courriel.
<br/></br>
Pour confirmer votre nouveau compte, veuillez vous rendre à cette adresse web :

<a href="{$a->link}">{$a->link}</a>
<br/><br/>
Ce lien est valable pendant 7 jours après réception.<br/>
Dans la plupart des programmes de courriel, ce lien devrait apparaître sous la forme d\'un lien bleu sur lequel vous pouvez simplement cliquer. Si cela ne fonctionne pas, veuillez couper et coller l\'adresse dans la barre d\'adresse en haut de la fenêtre de votre navigateur web.
<br/><br/>
Si vous avez besoin d\'aide, veuillez contacter l\'administrateur du site, {$a->admin}';
$string['passwordforgotteninstructions2']
        = 'Pour recevoir un nouveau mot de passe, veuillez indiquer ci-dessous votre adresse de courriel. Si les données correspondantes se trouvent dans la base de données, un message vous sera envoyé par courriel, avec des instructions vous permettant de vous connecter.';
$string['emailpasswordconfirmmaybesent']
        = '<p>Si vous avez fourni une adresse de courriel correcte, un message vous a été envoyé par courriel.</p> <p>Ce message contient de simples instructions pour confirmer et terminer la modification du mot de passe. Si vous n\'arrivez toujours pas à vous connecter, veuillez contacter l\'administrateur du site.</p>';
$string['lastname'] = 'Nom';
$string['emailresetconfirmation'] = 'Bonjour {$a->firstname},

Une demande de réinitialisation de mot de passe a été demandée pour votre compte {$a->sitename}.

Pour confirmer cette demande et définir un nouveau mot de passe, veuillez cliquer sur le lien ci-dessous : {$a->link}

Ce lien est valable durant {$a->resetminutes} minutes à partir de la demande de réinitialisation. Si cette demande de réinitialisation n\'a pas été effectuée par vous-même, aucune action n\'est nécessaire.

Dans la plupart des logiciels de courriel, cette adresse devrait apparaître comme un lien de couleur bleue sur lequel il vous suffit de cliquer. Si cela ne fonctionne pas, copiez ce lien et collez-le dans la barre d\'adresse de votre navigateur web.
En cas de difficulté, vous pouvez vous rapprocher de votre assistance en cliquant sur la page Contact dans le pied de page Mentor.

L\'équipe Mentor

<img src="https://mentor.gouv.fr/theme/mentor/pix/logo.png" alt="Logo de Mentor" style="width:200px; height:56px;">';
$string['myhome'] = 'Accueil';
$string['addstudent'] = 'Ajouter un participant';
$string['adminhelpassignstudents'] = 'Choisissez un cours et ajoutez des participants (menu Administration)';
$string['courseavailable'] = 'Ce cours est ouvert aux participants';
$string['courseavailablenot'] = 'Ce cours n\'est pas ouvert aux participants';
$string['coursehelpcategory'] = 'Positionne le cours dans la liste des cours et le rend plus simple à trouver pour les participants.';
$string['coursehelphiddensections'] = 'Comment les sections cachées du cours seront affichées pour les participants.';
$string['coursehidden'] = 'Ce cours n\'est actuellement pas disponible pour les participants';
$string['coursevisibility_help'] = 'Ce réglage détermine si le cours apparaît dans la liste des cours et si les participants peuvent y accéder. S\'il est réglé sur Caché, l\'accès n\'est permis qu\'aux utilisateurs ayant la capacité de voir les cours cachés (par exemple les enseignants).';
$string['defaultcoursestudent'] = 'Participant';
$string['defaultcoursestudentdescription'] = 'Les participants ont en général moins de privilèges dans un cours.';
$string['defaultcoursestudents'] = 'Participants';
$string['defaultcourseteacherdescription'] = 'Les enseignants peuvent tout faire dans un cours, y compris ajouter et modifier les activités et donner des notes aux participants.';
$string['edulevel_help'] = '* Enseignement : actions effectuées par un enseignant, p. ex. modification d\'une ressource
* Participation : actions effectuées par un participant, p. ex. écrire dans un forum
* Autres : actions effectuées par un utilisateur avec un rôle différent d\'enseignant ou participant';
$string['existingstudents'] = 'Participants inscrits';
$string['hiddenfromstudents'] = 'Caché pour les participants';
$string['hidefromstudents'] = 'Cacher pour les participants';
$string['indicator:accessesafterend_help'] = 'Cet indicateur montre si le participant a accédé au cours après la date de fin du cours.';
$string['indicator:accessesbeforestart_help'] = 'Cet indicateur montre si le participant a accédé au cours avant la date de début du cours.';
$string['indicator:anywrite_help'] = 'Cet indicateur représente toute action d\'écriture (remise) effectuée par le participant.';
$string['indicator:anywriteincourse_help'] = 'Cet indicateur représente toute action d\'écriture (remise) effectuée par le participant dans toute activité de cours.';
$string['indicator:completeduserprofile_help'] = 'Cet indicateur montre que le participant a complété son profil utilisateur.';
$string['indicator:nostudent'] = 'Inscriptions des participants';
$string['indicator:nostudent_help'] = 'Cet indicateur montre la disponibilité de participants dans le cours.';
$string['indicator:potentialcognitive_help'] = 'Cet indicateur est basé sur la profondeur cognitive que pourrait atteindre un participant qui participe aux activités du cours.';
$string['indicator:potentialsocial_help'] = 'Cet indicateur se base sur l\'interaction sociale que pourrait atteindre un participant qui participe aux activités du cours.';
$string['indicator:readactions_help'] = 'Cet indicateur représente le nombre d\'actions de lecture (affichage) effectuées par le participant.';
$string['indicator:userforumstracking_help'] = 'Cet indicateur montre si le participant a activé le suivi des messages des forums ou non.';
$string['instudentview'] = 'en affichage « participant »';
$string['mailstudents'] = 'Informer les participants';
$string['missingstudent'] = 'Vous devez choisir un participant';
$string['modvisible_help'] = 'Si la disponibilité est réglée sur « Afficher sur la page du cours », l\'activité ou la ressource est disponible pour les participants (éventuellement sujette à des restrictions d\'accès définies par l\'enseignant).

Si la disponibilité est réglée sur « Cacher pour les participants », l\'activité ou la ressource n\'est disponible que pour les utilisateurs avec les permissions requises pour voir les activités cachées (par défaut, les utilisateurs dont le rôle est enseignant ou enseignant non éditeur).';
$string['modvisiblehiddensection_help'] = 'Si la disponibilité est réglée sur « Cacher pour les participants », l\'activité ou la ressource n\'est disponible que pour les utilisateurs avec les permissions requises pour voir les activités cachées (par défaut, les utilisateurs dont le rôle est enseignant ou enseignant non éditeur).

Si le cours contient de nombreuses activités ou ressources, la page de cours peut être simplifiée en réglant la disponibilité sur « Rendre disponible, mais invisible sur la page de cours ». Dans ce cas, un lien vers l\'activité doit être fourni par ailleurs, par exemple dans par exemple dans une ressource de type page ou une étiquette. L\'activité reste visible dans le carnet de notes et les autres rapports.';
$string['modvisiblewithstealth_help'] = 'Si la disponibilité est réglée sur « Afficher sur la page du cours », l\'activité ou la ressource est disponible pour les participants (éventuellement sujette à des restrictions d\'accès définies par l\'enseignant).

Si la disponibilité est réglée sur « Cacher pour les participants », l\'activité ou la ressource n\'est disponible que pour les utilisateurs avec les permissions requises pour voir les activités cachées (par défaut, les utilisateurs dont le rôle est enseignant ou enseignant non éditeur).

Si le cours contient de nombreuses activités ou ressources, la page de cours peut être simplifiée en réglant la disponibilité sur « Rendre disponible, mais invisible sur la page de cours ». Dans ce cas, un lien vers l\'activité doit être fourni par ailleurs, par exemple dans une ressource de type page ou une étiquette. L\'activité reste visible dans le carnet de notes et les autres rapports.';
$string['noneditingteacherdescription'] = 'Les enseignants non éditeurs peuvent enseigner dans leur cours et donner des notes aux participants, mais ne peuvent ni ajouter, ni modifier des activités.';
$string['nopotentialstudents'] = 'Aucun participant potentiel';
$string['nostudentsingroup'] = 'Il n\'y a pas encore de participant dans ce groupe';
$string['nostudentsyet'] = 'Pas encore de participant inscrit à ce cours';
$string['potentialstudents'] = 'Participants potentiels';
$string['removestudent'] = 'Supprimer cet participant';
$string['showgrades'] = 'Afficher le carnet de notes aux participants';
$string['showgrades_help'] = 'Plusieurs activités d\'un cours peuvent être évaluées au moyen de notes. Ce réglage détermine si un participant peut voir une liste de toutes ses notes données dans ce cours, en cliquant sur le lien « Notes » dans le bloc ou le tiroir de navigation du cours.';
$string['showreports_help'] = 'Les rapports d\'activité sont disponibles pour chaque participant qui affiche ses activités dans le cours. En plus d\'une liste de ses contributions, comme les messages d\'un forum ou les soumissions d\'un devoir, ces rapports incluent également des journaux d\'accès. Ce paramètre détermine si un participant peut consulter ses propres rapports d\'activité via sa page de profil.';
$string['statsstudentactivity'] = 'Activité des participants';
$string['statsstudentreads'] = 'Consultations des participants';
$string['statsstudentwrites'] = 'Messages des participants';
$string['students'] = 'Participants';
$string['studentsandteachers'] = 'Participants et enseignants';
$string['summary_help'] = 'Le résumé de section est un texte assez bref destiné à préparer les participants aux activités présentées dans la section (thématique ou hebdomadaire). Le texte est affiché sur la page du cours, au-dessous du titre de la section.';
$string['visibletostudents'] = 'Visible pour les participants';
$string['wordforstudent'] = 'Votre terme pour « participant »';
$string['wordforstudenteg'] = 'exemples : participant, apprenti, participant…';
$string['wordforstudents'] = 'Votre terme pour « participants »';
$string['wordforstudentseg'] = 'exemples : participants, apprentis, participants…';
