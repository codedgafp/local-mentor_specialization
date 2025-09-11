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
 * Strings for component 'quiz', language 'fr', version '3.9'.
 *
 * @package     quiz
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adaptive_help'] = 'Si ce paramètre est activé, il est permis de répondre plusieurs fois à une même question au cours d\'une même tentative à un test. Par exemple, si une réponse est marquée comme incorrecte, le participant peut réessayer immédiatement de répondre correctement. Toutefois, selon la fonction choisie dans « Appliquer les pénalités », une pénalité sera habituellement déduite à chaque essai incorrect.';
$string['addarandomquestion_help'] = 'Quand une question aléatoire est ajoutée, une question choisie au hasard dans la catégorie est insérée dans le test. Les participants auront une sélection de questions différentes. Quand un test permet plusieurs tentatives, chaque tentative pourra contenir une sélection différente de questions.';
$string['affectedstudents'] = 'Participants concernés';
$string['attemptgradeddelay_desc'] = 'Un délai est appliqué avant d’envoyer au participants une notification d’évaluation, pour donner à l’enseignant le temps de modifier la note.';
$string['attemptsonly'] = 'N\'afficher que les participants ayant déjà effectué le test';
$string['bothattempts'] = 'Afficher aussi les participants n\'ayant pas fait le test';
$string['browsersecurity_help'] = 'Si vous sélectionnez l\'option « Nouvelle fenêtre plein écran avec un peu de sécurité Javascript »,

* le test démarre uniquement si le participant possède un navigateur qui accepte le Javascript';
$string['canredoquestions_desc'] = 'Si ce réglage est activé, après avoir répondu à une question, un bouton « Répondre à une question similaire » est affiché. Ceci permet de répondre à une question similaire (sélectionnée aléatoirement ou à la même question, sans avoir à envoyer la tentative de l\'ensemble du test et à en commencer une autre. L\'option est utile pour les tests de formation ou d\'entraînement.

Ce réglage n\'a d\'effet que sur les questions et les comportements offrant aux participants la possibilité de terminer la question avant que la tentative ne soit envoyée (par exemple, les comportements « Feedback immédiat » et « Interactif avec essais multiples »).';
$string['canredoquestions_help'] = 'Si ce réglage est activé, après avoir répondu à une question, un bouton « Répondre à une question similaire » est affiché. Ceci permet de répondre à une question similaire (sélectionnée aléatoirement ou à la même question, sans avoir à envoyer la tentative de l\'ensemble du test et à en commencer une autre. L\'option est utile pour les tests de formation ou d\'entraînement.

Ce réglage n\'a d\'effet que sur les questions et les comportements offrant aux participants la possibilité de terminer la question avant que la tentative ne soit envoyée (par exemple, les comportements « Feedback immédiat » et « Interactif avec essais multiples »).';
$string['completionattemptsexhausted_help'] = 'Marquer le test comme terminé lorsque le participant a épuisé le nombre maximal de tentatives.';
$string['completionpass_help'] = 'Si ce réglage est activé, l\'activité est considérée comme terminée lorsque le participant reçoit la note pour passer (définie ainsi dans la section Notes des réglages du test) ou une note supérieure.';
$string['completionpassdesc'] = 'le participant doit atteindre une note minimale pour achever cette activité';
$string['completionpassorattemptsexhausteddesc'] = 'Le participant doit obtenir une note minimale de réussite ou épuiser toutes les tentatives disponibles pour achever cette activité';
$string['configrequirepassword'] = 'Les participants doivent saisir ce mot de passe avant de pouvoir faire le test.';
$string['delay1st2nd_help'] = 'Si ce réglage est activé, les participants doivent attendre le laps de temps indiqué avant d\'entreprendre une deuxième tentative pour le test.';
$string['delaylater_help'] = 'Si ce réglage est activé, ce délai détermine la durée que devra attendre le participant avant sa troisième tentative, ou les suivantes.';
$string['eachattemptbuildsonthelast_help'] = 'Lorsqu\'on autorise le participant à refaire plusieurs fois un test et que cette option est activée, le participant pourra commencer une nouvelle tentative à partir des résultats de l\'essai précédent. le participant pourra ainsi compléter un test en plusieurs fois.';
$string['editingquiz_help'] = 'Lors de la création d’un test, les concepts principaux suivants sont à considérer :

* le test, qui contient des questions sur une ou plusieurs pages ;
* la banque de questions, qui contient des copies de toutes les questions, organisées en catégories ;
* les questions aléatoires. Les participants obtiennent des questions différentes lors de leur tentative du test, et un participant obtient des questions différentes lors de chaque tentative.';
$string['generalfeedback_help'] = 'Le feedback général d\'une question est le texte présenté au participant après une tentative de réponse. Contrairement au feedback pour une question spécifique, qui dépend du type de question et de la réponse donnée, le même feedback général est toujours affiché.';
$string['grademethod_help'] = 'Lorsqu\'il est permis au participant d\'effectuer plusieurs tentatives, les possibilités suivantes sont disponibles pour calculer sa note finale pour le test.

* Note la plus élevée – la meilleure des notes de toutes les tentatives
* Note moyenne – la moyenne arithmétique de toutes les tentatives
* Première note – la note obtenue à la première tentative (les autres tentatives sont ignorées)
* Dernière note – la note obtenue à la dernière tentative (les autres tentatives sont ignorées)';
$string['indicator:cognitivedepth_help'] = 'Cet indicateur est basé sur la profondeur cognitive atteinte par le participant dans une activité Test.';
$string['indicator:socialbreadth_help'] = 'Cet indicateur se base sur l\'interaction sociale atteinte par le participant dans une activité Quiz.';
$string['messageprovider:submission'] = 'Notifications des tentatives de tests remises par vos participants';

$string['modulename_help'] = 'Le module d\'activité test permet à l\'enseignant de créer des tests comportant des questions de divers types, notamment des questions à choix multiple, vrai-faux, d\'appariement, à réponses courtes ou calculées.

L\'enseignant peut autoriser plusieurs tentatives pour un test, les questions étant mélangées ou choisies aléatoirement dans une banque de questions. Une limite de temps peut être fixée.

Chaque tentative est évaluée automatiquement, à l\'exception des questions de composition, et la note est enregistrée dans le carnet de notes.

L\'enseignant peut choisir quand et si il veut que des indices, un feedback et les réponses correctes soient proposés aux participants.

Les tests peuvent notamment être utilisés :

* pour des évaluations certificatives (examen),
* comme mini-tests pour des devoirs de lecture ou au terme de l\'étude d\'un thème,
* comme exercice pour un examen, en utilisant les questions de l\'examen de l\'année précédente,
* pour fournir un feedback de performance,
* pour l\'auto-évaluation.';
$string['navmethod_help'] = 'Lorsque la navigation séquentielle est activée, les participants doivent parcourir le test dans l’ordre et ne peuvent ni revenir à la page précédente, ni passer à une page ultérieure.';
$string['notavailabletostudents'] = 'Ce test n\'est actuellement pas disponible pour vos participants';
$string['overallfeedback_help'] = 'Le feedback global est un texte montré au participant lorsqu\'il a terminé une tentative d\'un test. En spécifiant des limites de notes supplémentaires (sous forme de nombre ou de pourcentage), le texte affiché peut différer suivant la note obtenue par le participant.';
$string['overduehandling_help'] = 'Ce réglage détermine ce qui se passe si le participant n\'envoie pas son test avant l\'échéance du délai. Si le participant est actif à cet instant, la tentative sera envoyée automatiquement. S\'il n\'est pas connecté, ce réglage détermine ce qui se passe à ce moment.';
$string['popupnotice'] = 'Pour les participants, l\'affichage de ce test se fera dans une fenêtre « sécurisée »';
$string['quiz:emailnotifysubmission'] = 'Recevoir une notification lors de la remise des tentatives de tests de vos participants';
$string['quizopenclose_help'] = 'Les participants ne peuvent commencer leur tentative qu\'après l\'heure d\'ouverture et doivent la terminer avant l\'heure de fermeture.';
$string['reportmulti_q_x_student'] = 'Choix des participants';
$string['requirepassword_help'] = 'Si un mot de passe est indiqué, les participants doivent le saisir avant de pouvoir faire le test.';
$string['reviewoverallfeedback_help'] = 'Le feedback donné à la fin d’une tentative du test, et qui dépend du total des points obtenu par le participant.';

$string['reviewoptions'] = 'Les participants peuvent relire';
$string['shownoattempts'] = 'Afficher les participants sans tentative';
$string['shownoattemptsonly'] = 'N\'afficher que les participants sans tentative';
$string['showuserpicture_help'] = 'Si ce réglage est activé, le nom et l\'avatar du participant s\'affichent durant le test et lors de la relecture. Cela permet aux surveillants de vérifier plus facilement qu\'un participant est bien connecté à son propre compte.';
$string['shufflequestions_help'] = 'Si ce réglage est activé, à chaque tentative du test, l\'ordre des questions dans cette section sera mélangé dans un ordre aléatoire différent.

Ceci permet de rendre plus difficile le partage des réponses entre participants, mais rend également plus difficile les discussions entre les participants et l\'enseignant sur une question déterminée.';
$string['usersnone'] = 'Aucun participant n\'a accès à ce test';
