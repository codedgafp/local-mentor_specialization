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
 * Strings for component 'via', language 'fr', version '3.9'.
 *
 * @package     via
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enrolmenttype_help'] = 'Inscription automatique : tous les utilisateurs inscrits au cours seront ajoutés à l\'activité Via. Si un participant est ajouté au cours après la création de l\'activité Via, il sera ajouté lors de la prochaine synchronisation du Cron. Si par compte il accède   à l\'activité avant que le Cron l\'ait ajouté, il sera ajouté à l\'affichage de la page des détails de l\'activité. Les utilisateurs inscrits avec des droits d\'édition dans le cours moodle seront automatiquement synchronisés comme animateurs, mais cette liste demeure éditable.
Inscription manuelle : les participants doivent être ajoutés   à partir de la liste des participants en choisissant le participant parmi la liste des « Participants potentiels » (droite) et ajoutés à l\'aide de la flèche au « Participant actuel » (gauche). NB.  Dans les deux modes d\'inscription, l\'utilisateur qui créera l\'activité est ajouté comme présentateur de façon automatique, mais reste éditable, tout comme la liste des animateurs. Il n\'est pas possible d\'avoir plus d\'un présentateur.';
$string['noparticipants_help'] = 'Cette option est disponible seulement en mode d\'inscription automatique et fait en sorte que les utilisateurs ayant le statut de participant sont tous inscrits avec les droits d\'animateurs dans via.';
$string['noparticipantscheckbox'] = 'Ajouter les participants comme animateurs.';
