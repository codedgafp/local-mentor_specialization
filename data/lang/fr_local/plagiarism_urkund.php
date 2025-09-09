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
 * Strings for component 'plagiarism_urkund', language 'fr', version '3.9'.
 *
 * @package     plagiarism_urkund
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowallsupportedfiles_help'] = 'Ceci permet à l\'enseignant de restreindre les types de fichiers qui seront envoyés à URKUND pour analyse. Cela n\'empêche pas les participants de déposer d\'autres types de fichiers sur le devoir.';
$string['explainerrors'] = 'Cette page liste tous les fichiers qui sont actuellement sous un statut d\'erreur. <br/>Si des fichiers sont supprimés de cette page, ils ne pourront plus être soumis à nouveau à analyse et les erreurs ne s\'afficheront plus pour les enseignants ou les participants';
$string['studentdisclosure'] = 'Divulgation par le participant';
$string['studentdisclosure_help'] = 'Ce texte sera affiché à tous les participants sur la page de téléchargement des fichiers.';
$string['submitonfinal'] = 'Ne soumettre le fichier que lorsque le participant a cliqué sur « Envoyer pour évaluation »';
$string['urkund_enableoptoutdesc'] = 'Désactiver ceci retirera la possibilité pour les participants d\'afficher ou de cacher (selon les réglages par défaut) le contenu de leurs textes dans le cas où ils seraient identifiés comme correspondant à des écrits d\'autres participants clients (« opt-in » et « opt-out »). En désactivant cette option, vous certifiez que vous prendrez la responsabilité de gérer vous-même les questions de droit d\'auteur des écrits soumis par vos participants et que cela ne contrevient pas à la législation applicable dans votre pays.';
$string['urkund_show_student_report'] = 'Montrer le rapport de similitude au participant';
$string['urkund_show_student_score'] = 'Montrer le pourcentage de similitude au participant';
$string['urkund_studentemail'] = 'Envoyer un courriel au participant';
$string['urkund_studentemail_help'] = 'Cela enverra un courriel au participant lorsqu\'un fichier a été traité afin de l\'informer qu\'un rapport d\'analyse est disponible';
