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
 * @package    mod
 * @subpackage lesson
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename'] = 'Séquence adaptative';
$string['modulename_help']
        = 'Le module d\'activité Séquence adaptative permet à l\'enseignant de proposer des contenus et/ou des activités d\'exercice d\'une façon intéressante et flexible. L\'enseignant peut utiliser la séquence adaptative pour créer une ou plusieurs pages qui se suivent linéairement ou qui offrent plusieurs chemins au participant. L\'enseignant peut augmenter l\'engagement et s\'assurer de la compréhension en incluant divers types de questions : à choix multiple, d\'appariement et à réponse courte. Selon la réponse du participant et la créativité de la personne qui crée la séquence adaptative, les participants poursuivent vers la page suivante, reviennent à une page précédente ou sont redirigé vers un tout autre chemin. Une séquence adaptative peut être sanctionnée par une note. La note est alors enregistrée dans le carnet de notes. Les séquences adaptatives peuvent être utilisées par exemple : * pour l\'apprentissage autonome d\'un nouveau sujet * pour des simulations ou des jeux de rôles exerçant la prise de décision * comme un moyen de combiner plusieurs canaux différents, permettant ainsi de renforcer l\'apprentissage * pour des supports de révision différenciés, avec plusieurs jeux de questions de révision suivant les réponses précédemment données';
$string['modulenameplural'] = 'Séquences adaptatives';
$string['pluginname'] = 'Séquence adaptative';
$string['actionaftercorrectanswer_help'] = 'Après une réponse correcte, il y a 3 possibilités pour la page suivante :

* Normale : suivre la séquence dans l’ordre logique
* Afficher une page non vue : les pages sont affichées aléatoirement sans qu’aucune page ne soit affichée deux fois
* Afficher une page sans réponse : les pages sont affichées aléatoirement, certaines pages déjà vues par le participant lui étant montrée une nouvelle fois, s’il n’y a pas répondu ou s’il y a répondu incorrectement';
$string['actions'] = 'Actions';
$string['activitylink'] = 'Lien vers l’activité suivante';
$string['activitylink_help'] = 'Afin de fournir un lien vers une autre activité de cours au terme de la séquence, choisir une activité dans le menu déroulant.';
$string['activityoverview'] = 'Vous avez des séquences à terminer';
$string['allowofflineattempts'] = 'Permettre de suivre la séquence hors ligne au moyen de l’app mobile';
$string['allowofflineattempts_help'] = 'Si ce réglage est activé, l’utilisateur d’une app mobile peut télécharger la séquence et l’effectuer hors ligne.
Toutes les réponses possibles et les réponses correctes seront aussi téléchargées.
Remarque : il n’est pas possible d’effectuer hors ligne une séquence assortie d’une limite de temps.';
$string['cannotfindnextpage'] = 'Sauvegarde de la séquence : page suivante non trouvée !';
$string['cannotfindpages'] = 'Impossible de trouver les pages de la séquence';
$string['cannotfindrecords'] = 'Erreur : impossible de trouver les enregistrements de la séquence';
$string['canretake'] = '{$a} peut refaire la séquence';
$string['closebeforeopen'] = 'Impossible de modifier la séquence. Vous avez indiqué une date de fermeture antérieure à la date d’ouverture.';
$string['completederror'] = 'Terminer la séquence';
$string['completethefollowingconditions'] = 'Vous devez remplir la (les) condition(s) suivante(s) dans la séquence <b>{$a}</b> avant de continuer.';
$string['completionendreached_desc'] = 'Si ce réglage est activé, le participant doit atteindre la page de fin de la séquence pour achever cette activité';
$string['configintro'] = 'Les données saisies ici définissent les valeurs par défaut utilisées dans la configuration d’une nouvelle activité Séquence. Les réglages indiqués comme avancés ne sont affichés que le lien « Afficher plus » est cliqué.';
$string['configpassword_desc'] = 'Détermine si un mot de passe est requis pour accéder à la séquence.';
$string['configtimelimit_desc'] = 'Si une limite de temps est fixée, un avertissement est affiché au début de la séquence et un compte à rebours est affiché. Une valeur 0 signifie une durée illimitée.';
$string['congratulations'] = 'Félicitations - la séquence est terminée';
$string['deleteallattempts'] = 'Supprimer toutes les tentatives des séquences';
$string['deletedefaults'] = 'Séquence par défaut {$a} x supprimée';
$string['dependencyon_help'] = 'Grâce à ce réglage, l’accès à cette séquence peut dépendre des résultats du participant à d’autres séquences dans le même cours. Il est possible de combiner les critères « durée utilisée », « terminé » ou « note plus haute que ».';
$string['displayleftif_help'] = 'Ce réglage détermine si un participant doit obtenir une note minimale pour que le menu de la séquence soit affiché. Ceci impose au participant de parcourir la totalité de la séquence lors de sa première tentative, puis lui permet d’utiliser le menu pour sa relecture, s’il a obtenu la note requise.';
$string['displayleftmenu_help'] = 'Si ce réglage est activé, un menu est affiché, permettant aux utilisateurs de parcourir les pages de la séquence.';
$string['displayreview_help'] = 'Si cette option est activée, lorsqu’une question reçoit une réponse incorrecte, le participant a la possibilité de corriger celle-ci (sans obtenir de point) ou de continuer la séquence. Si le participant choisit de continuer vers une autre question, il sera dirigé vers la page à suivre après une réponse (fausse). Par défaut, les sauts de pages pour une réponse fausse sont définis sur « Cette page » et donnent un score de 0. Il est donc recommandé de spécifier un saut vers une page différente en cas de réponse fausse pour éviter de prêter à confusion pour les participants.';
$string['editinglesson'] = 'Modification de la séquence';
$string['editlesson'] = 'Modifier la séquence';
$string['editlessonsettings'] = 'Modifier les réglages de la séquence';
$string['endoflesson'] = 'Fin de la séquence';
$string['eolstudentoutoftime'] = 'Attention : le temps à votre disposition pour cette séquence est échu. Votre dernière réponse ne sera pas prise en compte si elle est survenue après l’échéance.';
$string['eolstudentoutoftimenoanswers'] = 'Vous n’avez répondu à aucune question. Votre note pour cette séquence est de 0.';
$string['essayemailmessage2'] = '<p>Question ouverte : {$a->question}</p><p>Votre réponse : <em>{$a->response}</em></p><p>Commentaire de l’évaluateur : <em>{$a->comment}</em></p><p>Vous avez obtenu {$a->earned} points sur un total de {$a->outof} à cette question ouverte.</p><p>Votre note pour cette séquence est maintenant {$a->newgrade} %.</p>';
$string['essayemailmessagesmall'] = '<p>Vous avez obtenu {$a->earned} sur {$a->outof} pour cette question de composition.</p><p>Votre note pour la séquence {$a->lesson} a été modifiée à {$a->newgrade} %.</p>';
$string['essayemailsubject'] = 'Note pour la question de séquence';
$string['eventhighscoreadded'] = 'Meilleur résultat de séquence ajouté';
$string['eventhighscoresviewed'] = 'Meilleurs résultats de séquence consultés';
$string['eventlessonended'] = 'Séquence terminée';
$string['eventlessonrestarted'] = 'Séquence recommencée';
$string['eventlessonresumed'] = 'Séquence reprise';
$string['eventlessonstarted'] = 'Séquence commencée';
$string['eventoverridecreated'] = 'Dérogation de séquence créée';
$string['eventoverridedeleted'] = 'Dérogation de séquence supprimée';
$string['eventoverrideupdated'] = 'Dérogation de séquence modifiée';
$string['gotoendoflesson'] = 'Aller à la fin de la séquence';
$string['handlingofretakes_help'] = 'Lorsque les participants ont la permission de répéter la séquence, ce réglage spécifie si la note de la séquence est la moyenne ou la note de la meilleure tentative.';
$string['indicator:cognitivedepth'] = 'Séquence : aspect cognitif';
$string['indicator:cognitivedepth_help'] = 'Cet indicateur est basé sur la profondeur cognitive atteinte par le participant dans une activité Séquence.';
$string['indicator:cognitivedepthdef'] = 'Séquence : aspect cognitif';
$string['indicator:cognitivedepthdef_help'] = 'Le participant a atteint durant cet intervalle d’analyse ce pourcentage d’engagement cognitif offert par les activités « Séquence » (niveaux : pas de vue, vue, envoi, vue du feedback, commentaire du feedback, nouvel envoi après vue du feedback).';
$string['indicator:socialbreadth'] = 'Séquence : aspect social';
$string['indicator:socialbreadth_help'] = 'Cet indicateur se base sur l’interaction sociale atteinte par le participant dans une activité Séquence.';
$string['indicator:socialbreadthdef'] = 'Séquence : aspect social';
$string['indicator:socialbreadthdef_help'] = 'Le participant a atteint durant cet intervalle d’analyse ce pourcentage d’engagement social offert par les activités « Séquence » (niveaux : pas de participation, participant seul, participant avec d’autres).';
$string['invalidid'] = 'Aucun identifiant de cours ou de séquence n’a été fourni';
$string['invalidlessonid'] = 'Identifiant de séquence non valide';
$string['jumps_help'] = 'Chaque réponse (pour les questions) ou description (pour les pages de contenu) possède un saut correspondant. Ce saut peut être relatif, comme cette page ou la page suivante, ou absolu, en spécifiant une des pages de la séquence.';
$string['leftduringtimed'] = 'Vous avez quitté une séquence à durée limitée.<br />Veuillez cliquer sur Continuer pour recommencer cette séquence.';
$string['leftduringtimednoretake'] = 'Vous avez quitté une séquence à durée limitée et vous n’êtes<br />pas autorisé à la recommencer ou la continuer.';
$string['leftduringtimedsession'] = 'Vous avez interrompu une séquence chronométrée.';
$string['lesson:addinstance'] = 'Ajouter une séquence';
$string['lesson:edit'] = 'Modifier les activités séquence';
$string['lesson:grade'] = 'Évaluer les questions de composition de séquences';
$string['lesson:manage'] = 'Gérer les activités séquence';
$string['lesson:manageoverrides'] = 'Gérer les dérogations de séquence';
$string['lesson:view'] = 'Consulter une activité séquence';
$string['lesson:viewreports'] = 'Consulter les rapports des séquences';
$string['lessonbeingpreviewed'] = 'La séquence est en cours de prévisualisation.';
$string['lessonclosed'] = 'Cette séquence s’est terminée le {$a}.';
$string['lessoncloses'] = 'La séquence se termine';
$string['lessonformating'] = 'Format de la séquence';
$string['lessonmenu'] = 'Menu séquence';
$string['lessonnotready'] = 'Cette séquence n’est pas encore prête. Veuillez contacter votre {$a}.';
$string['lessonnotready2'] = 'Cette séquence n’est pas encore prête.';
$string['lessonopen'] = 'Cette séquence sera ouverte le {$a}.';
$string['lessonopens'] = 'La séquence s’ouvre';
$string['lessonpagelinkingbroken'] = 'La première page n’a pas été trouvée. Les liens de la séquence sont vraisemblablement cassés. Veuillez contacter un administrateur.';
$string['lessonstats'] = 'Statistiques de la séquence';
$string['maxgrade_help'] = 'Ce réglage détermine la note maximale pouvant être accordée dans cette séquence. Si la valeur 0 est indiquée, la séquence n’apparaîtra dans aucune des pages de notes.';
$string['maximumnumberofanswersbranches_help'] = 'Cette valeur détermine le nombre maximal de réponses utilisables dans la séquence. Si une séquence n’utilise que des questions vrai/faux, elle peut être fixée à 2. Ce paramètre peut être modifié à tout moment, car il n’a d’effet que sur ce que voit l’enseignant, pas sur les données.';
$string['maximumnumberofattempts_help'] = 'Ce réglage fixe le nombre maximal de tentatives à disposition des participants pour répondre à chaque question. Si une réponse incorrecte est répétée, lorsque cette valeur est atteinte, la page suivante de la séquence est affichée.';
$string['mediafile_help'] = 'Un fichier média peut être déposé pour utilisation dans la séquence. Dans ce cas, un bloc « Média lié » sera affiché sur chaque page de la séquence, comprenant un lien pour afficher ce fichier.';
$string['messageprovider:graded_essay'] = 'Notification d’évaluation de composition de séquence';
$string['modattempts_help'] = 'Si ce réglage est activé, les participants peuvent reprendre la séquence depuis le début.';
$string['noessayquestionsfound'] = 'Il n’y a pas de question de composition dans cette séquence.';
$string['nolessonattempts'] = 'Personne n’a encore fait cette séquence.';
$string['nolessonattemptsgroup'] = 'Aucune tentative n’a été effectuée dans cette séquence par des membres du groupe {$a}.';
$string['nooverridedata'] = 'Vous devez définir une dérogation pour au moins un des paramètres de la séquence.';
$string['noretake'] = 'Vous n’êtes pas autorisé à refaire cette séquence.';
$string['normal'] = 'Normal - suivre le parcours de la séquence';
$string['notenoughtimespent'] = 'Vous avez terminé cette séquence en {$a->timespent}, c’est-à-dire en moins de temps que la durée minimale exigée {$a->timerequired}.';
$string['notyetcompleted'] = 'La séquence a été commencée, mais n’est pas terminée';
$string['numberofpagestoshow_help'] = 'Ce réglage détermine le nombre de pages affichées dans une séquence. Il n’est valable que pour les séquences où les pages sont affichées en ordre aléatoire (lorsque le réglage « Action après réponse correcte » est fixé à « Afficher une page non vue » ou « Afficher une page sans réponse »). Si le nombre indiqué est 0, toutes les pages seront affichées.';
$string['overview_help'] = 'Une séquence est constituée de plusieurs pages et éventuellement de pages de contenu.
Une page contient des données et se termine souvent par une question. Un saut est associé à chaque réponse. Ce lien peut être relatif, comme cette page ou page suivante, ou absolue, en spécifiant une des pages de la séquence. Une page de contenu est une page qui contient des liens vers d’autres pages de la séquence, par exemple une table des matières.';
$string['page-mod-lesson-edit'] = 'Modifier page de séquence';
$string['page-mod-lesson-view'] = 'Afficher ou prévisualiser une page séquence';
$string['page-mod-lesson-x'] = 'Toute page de séquence';
$string['passwordprotectedlesson'] = '{$a} est une séquence protégée par mot de passe.';
$string['pluginadministration'] = 'Administration de la séquence';
$string['pluginname'] = 'Séquence';
$string['practice'] = 'Séquence d’entraînement';
$string['practice_help'] = 'Le résultat d’une séquence d’entraînement n’apparaîtra pas dans le carnet de notes.';
$string['prerequisiteisobsolete'] = 'Le réglage « Séquence prérequise » sera supprimé prochainement. Veuillez plutôt utiliser les restrictions d’accès en lieu et place.';
$string['prerequisitelesson'] = 'Séquence prérequise';
$string['privacy:metadata:grades'] = 'Un enregistrement des notes de chaque séquence';
$string['privacy:metadata:overrides'] = 'Un enregistrement des dérogation par séquence';
$string['privacy:metadata:overrides:available'] = 'La date et l’heure à laquelle les participants peuvent commencer la séquence.';
$string['privacy:metadata:overrides:deadline'] = 'La date d’échéance pour terminer la séquence.';
$string['privacy:metadata:overrides:password'] = 'Le mot de passe pour accéder à la séquence';
$string['privacy:metadata:overrides:timelimit'] = 'La temps imparti pour terminer la séquence, en secondes.';
$string['privacy:metadata:timer'] = 'Un enregistrement d’une tentative de séquence';
$string['privacy:metadata:userpref:lessonview'] = 'Le mode d’affichage préféré lors de l’édition de séquences';
$string['progressbar_help'] = 'Si ce réglage est activé, une barre de progression est affichée en bas des pages de la séquence, indiquant le pourcentage approximatif du travail effectué.';
$string['progressbarteacherwarning2'] = 'La barre de progression ne sera pas affichée, car vous pouvez modifier cette séquence';
$string['progresscompleted'] = 'Vous avez terminé {$a} % de la séquence';
$string['retakesallowed_help'] = 'Si ce réglage est activé, les participants peuvent effectuer la séquence à plusieurs reprises.';
$string['reverttodefaults'] = 'Revenir aux réglages par défaut de la séquence';
$string['reviewlesson'] = 'Revoir la séquence';
$string['savechangesandeol'] = 'Enregistrer tous les changements et aller à la fin de la séquence.';
$string['score_help'] = 'Le score n’est utilisé que si l’option « score personnalisé » de la séquence est activée. Chaque réponse peut alors recevoir un nombre de points (positif ou négatif).';
$string['search:activity'] = 'Séquence – information sur l’activité';
$string['slideshow_help'] = 'Si ce réglage est activé, la séquence sera affichée à la manière d’une présentation (diaporama), avec une largeur et une hauteur déterminées.';
$string['startlesson'] = 'Commencer la séquence';
$string['studentoneminwarning'] = 'Attention : il vous reste moins d’une minute pour terminer la séquence.';
$string['studentoutoftimeforreview'] = 'Attention : vous avez dépassé le temps alloué pour relire la séquence';
$string['teacherjumpwarning'] = 'Un saut {$a->cluster} ou un saut {$a->unseen} est utilisé dans cette séquence. Un saut « Page suivante » sera utilisé à sa place. Veuillez vous connecter en tant que participant pour tester ces sauts.';
$string['timelimit_help'] = 'Si ce réglage est activé, un avertissement est affiché au début de la séquence, indiquant le temps imparti pour la séquence. Un compte à rebours est également affiché. Les réponses données après le délai ne sont pas évaluées.';
$string['timelimitwarning'] = 'Vous avez {$a} pour terminer la séquence.';
$string['timespenterror'] = 'Passer au moins {$a} minutes dans la séquence';
$string['usepassword'] = 'Séquence protégée par mot de passe';
$string['usepassword_help'] = 'Si ce réglage est activé, un mot de passe doit être saisi pour accéder à la séquence.';
$string['usersnone'] = 'Aucun participant n’a accès à cette séquence';
$string['completiontimespent'] = 'Les participants doivent faire cette activité au moins durant';
$string['completiontimespentdesc'] = 'le participant doit travailler sur cette activité durant au moins {$a}';
$string['displayofgrade'] = 'Affichage de la note (pour le participant)';
$string['modattempts'] = 'Permettre la relecture par les participants';
$string['modattemptsnoteacher'] = 'La critique par les participants ne fonctionne que pour les participants.';
$string['ongoing_help'] = 'Si ce réglage est activé, le participant verra sur chaque page, le nombre des points qu\'il a obtenu par rapport au total possible jusqu\'ici.';
$string['studentname'] = 'Nom du participant';
$string['teacherongoingwarning'] = 'Le score actuel n\'est affiché que pour les participants. Veuillez vous connecter en tant que participant pour tester le score actuel.';
$string['teachertimerwarning'] = 'Le chronomètre ne fonctionne que pour les participants. Veuillez vous connecter en tant que participant pour tester le chronomètre.';
