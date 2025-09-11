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
 * Strings for component 'course', language 'fr', version '3.9'.
 *
 * @package     course
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['downloadcoursecontent_help'] = 'Ce réglage détermine si les contenus de cours peuvent être téléchargés par les utilisateurs disposant de la capacité adéquate (par défaut ceux qui ont le rôle de participant ou d’enseignant).';
$string['noaccesssincestartinfomessage'] = 'Bonjour {$a->userfirstname},
<p>Certains participants du cours {$a->coursename} n\'ont jamais accédé au cours.</p>';
$string['nocoursestudents'] = 'Aucun participant';
$string['norecentaccessesinfomessage'] = 'Bonjour {$a->userfirstname},
<p>Certains participants du cours {$a->coursename} n\'ont pas accédé récemment au cours.</p>';
$string['noteachinginfomessage'] = 'Bonjour {$a->userfirstname},
<p>Des cours dont la date de début est fixé la semaine prochaine ont été identifiés comme sans enseignant ou sans inscription de participant.</p>';
$string['studentsatriskincourse'] = 'Participants à risque dans le cours {$a}';
$string['studentsatriskinfomessage'] = 'Bonjour {$a->userfirstname},
<p>Des participants dans le cours {$a->coursename} ont été identifiés comme en risque de décrochage.</p>';
$string['target:coursecompetencies'] = 'Participants risquant de ne pas atteindre les compétences attribuées à un cours';
$string['target:coursecompetencies_help'] = 'Cette cible décrit si un participant est considéré comme risquant de ne pas atteindre les compétences attribuées à un cours. Elle considère que toutes les compétences attribuées au cours doivent être atteintes avant la fin du cours.';
$string['target:coursecompletion'] = 'Participants risquant de ne pas remplir les conditions d\'achèvement du cours';
$string['target:coursecompletion_help'] = 'Cette cible décrit si le participant est considéré comme risquant de ne pas remplir les conditions d\'achèvement du cours.';
$string['target:coursedropout'] = 'Participants risquant de décrocher';
$string['target:coursedropout_help'] = 'Cette cible décrit si un participant est considéré comme risquant de décrocher.';
$string['target:coursegradetopass'] = 'Participants risquant de ne pas atteindre la note minimale pour passer le cours';
$string['target:coursegradetopass_help'] = 'Cette cible décrit si un participant est considéré comme risquant de ne pas atteindre la note minimale pour passer le cours.';
$string['target:noaccesssincecoursestart'] = 'Participants qui n\'ont pas encore accédé au cours';
$string['target:noaccesssincecoursestart_help'] = 'Cette cible décrit le participant qui n\'ont pas encore accédé à un cours auxquels ils sont inscrits.';
$string['target:noaccesssincecoursestartinfo'] = 'Les participants suivants sont inscrits dans un cours qui a commencé, mais ils n\'ont jamais accédé au cours.';
$string['target:norecentaccesses'] = 'Participant qui n\'ont pas accédé récemment au cours';
$string['target:norecentaccesses_help'] = 'Cette cible identifie les participants qui n\'ont pas accédé à un cours auxquels ils sont inscrits durant l\'intervalle fixé pour l\'analyse (par défaut, le mois passé).';
$string['target:norecentaccessesinfo'] = 'Les participants suivants n\'ont pas accédé aux cours auxquels ils sont inscrits dans l\'intervalle d\'analyse fixé (par défaut le mois dernier).';
$string['target:noteachingactivityinfo'] = 'Les cours suivants devant commencer les jours prochains risquent de ne pas pouvoir commencer parce qu\'ils n\'ont pas d\'enseignant ou de participant inscrits.';
$string['targetlabelstudentcompetenciesno'] = 'Participant qui atteindra probablement les compétences attribuées à un cours';
$string['targetlabelstudentcompetenciesyes'] = 'Participant qui n\'atteindra probablement pas les compétences attribuées à un cours';
$string['targetlabelstudentcompletionno'] = 'Participant qui remplira probablement les conditions d\'achèvement du cours';
$string['targetlabelstudentcompletionyes'] = 'Participant qui risque de ne pas remplir les conditions d\'achèvement du cours';
$string['targetlabelstudentdropoutyes'] = 'Participant en risque de décrochage';
$string['targetlabelstudentgradetopassno'] = 'Participant qui atteindra probablement la note minimale pour passer le cours.';
$string['targetlabelstudentgradetopassyes'] = 'Participant risquant de ne pas atteindre la note minimale pour passer le cours.';
