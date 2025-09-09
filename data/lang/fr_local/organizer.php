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
 * Strings for component 'organizer', language 'fr', version '3.9'.
 *
 * @package     organizer
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['absolutedeadline_help'] = 'Cochez cette case pour définir le moment après lequel les participants ne peuvent plus rien changer';
$string['addslots_placesinfo'] = 'Cette action créera {$a->numplaces} nouvelles places possibles, pour un total de {$a->totalplaces} places possibles pour {$a->numstudents} participants.';
$string['allowsubmissionsfromdate_help'] = 'Cochez ici si vous voulez que l\'agenda soit accessible aux participants après une certaine date.';
$string['alwaysshowdescription_help'] = 'Si cette case est décochée, la description du devoir ci-dessus ne sera visible pour les participants qu\'à partir de la date de début des inscriptions.';
$string['appointment_reminder_teacher:fullmessage'] = 'Bonjour {$a->receivername},

Dans le cadre du cours {$a->courseid} {$a->coursefullname}, vous avez un rendez-vous avec des participants le {$a->date} à {$a->time} dans le local {$a->location}.

Système de messagerie Moodle';
$string['appointment_reminder_teacher:smallmessage'] = 'Vous avez un rendez-vous avec des participants le {$a->date} à {$a->time} dans le local {$a->location}.';
$string['availablefrom_help'] = 'Détermine la période pendant laquelle les participants pourront s\'inscrire pour ces créneaux. Sinon, cochez "Dès maintenant" pour leur permettre de s\'inscrire immédiatement.';
$string['cannot_eval'] = 'Impossible d\'évaluer, le participant a un';
$string['configmaximumgrade'] = 'Définit la valeur par défaut dans le champ de note lors de la création d\'un nouvel agenda. C\'est la note maximale que le participant peut obtenir pour son rendez-vous.';
$string['deletekeep'] = 'Les rendez-vous suivants vont être annulés. Les participants inscrits en seront informés et les créneaux seront supprimés:';
$string['emailteachers_help'] = 'Pour éviter le spamming, les enseignants ne reçoivent pas d\'email lors de la première inscription des participants dans un créneau horaire. Cochez cette case pour autoriser l\'agenda à envoyer ces notifications aux enseignants.
Notez que les notifications pour la désinscription ou le changement de créneau sont toujours envoyées.';
$string['eventappointmentadded'] = 'le participant s\'est inscrit dans un créneau.';
$string['eventappointmentremoved'] = 'le participant s\'est désinscrit d\'un créneau.';
$string['grouporganizer_desc_nogroup'] = 'Ceci est un agenda de groupe. Les participants peuvent inscrire leur groupe dans les créneaux disponibles. Tous les membres du groupe peuvent modifier et commenter leur inscription.';
$string['legend_comments'] = 'Commentaires du participant/enseignant';
$string['message_info_available'] = 'Il reste {$a->freeslots} créneaux disponibles pour {$a->notregistered} participants sans rendez-vous.';
$string['modulename_help'] = 'Les agendas permettent à l\'enseignant de prendre des rendez-vous avec les participants en créant des créneaux horaires dans lesquels les participants peuvent s\'inscrire.';
$string['multimember'] = 'Les participants ne peuvent pas faire partie de plusieurs groupes au sein du même groupement.';
$string['mymoodle_attended'] = '{$a->attended} participants sur {$a->total} se sont présentés à leur rendez-vous.';
$string['mymoodle_attended_short'] = '{$a->attended} participants sur {$a->total} se sont présentés.';
$string['mymoodle_registered'] = '{$a->registered} participants sur {$a->total} se sont inscrits à un rendez-vous';
$string['mymoodle_registered_short'] = '{$a->registered} participants sur {$a->total} inscrits';
$string['notificationtime_help'] = 'Définit le délai entre l\'envoi d\'un rappel au participant et son rendez-vous.';
$string['organizer:assignslots'] = 'Attribuer le créneau à un participant';
$string['organizer:receivemessagesstudent'] = 'Recevoir les messages tels qu\'envoyés aux participants';
$string['organizer:sendreminders'] = 'Envoyer aux participants un rappel de leur inscription';
$string['organizer:viewregistrations'] = 'Voir le statut des inscriptions de participants';
$string['organizer:viewstudentview'] = 'Voir tous les créneaux en tant que participant';
$string['relativedeadline_help'] = 'Définit la limite d\'inscription avant le créneau. Les participants ne pourront plus s\'inscrire, modifier leur inscription ou se désinscrire après cette échéance.';
$string['remindall_desc'] = 'Envoyer des rappels à tous les participants sans rendez-vous';
$string['status_no_entries'] = 'Cet agenda n\'a pas de participants inscrits.';
$string['studentcomment_title'] = 'Commentaires du participant';
$string['tabstud'] = 'Vue participant';
$string['teachervisible_help'] = 'Cochez ici si vous voulez que les participants puissent voir l\'enseignant associé à leur créneau horaire.';
