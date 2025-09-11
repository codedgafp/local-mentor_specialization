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
 * Strings for component 'admin', language 'fr', version '3.9'.
 *
 * @package     admin
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configallowobjectembed'] = 'Par mesure de sécurité, les utilisateurs avec rôle de participant n’ont pas les permissions requises pour intégrer des fichiers multimédias dans des textes à l’aide de balises EMBED et OBJECT du code HTML, bien que le multimédia puisse être affiché au moyen du filtre multimédia. Activer cette option pour permettre l’utilisation de ces balises.';

$string['configallusersaresitestudents'] = 'Pour les activités affichées sur la page d\'accueil du site, TOUS les utilisateurs doivent-ils être considérés comme des participants ? Si vous choisissez « Oui », tout utilisateur possédant un compte confirmé pourra participer à ces activités en tant que participant. Si vous choisissez « Non », seuls les participants d\'au moins un cours pourront accéder aux activités de la page d\'accueil.';
$string['configenableanalytics'] = 'Les modèles d\'analyse de données, par exemple « Participants en risque de décrochage » ou « Activités à venir à effectuer », peuvent générer des prédictions, envoyer des notifications d\'indications et offrir d\'autres actions, comme l\'envoi de messages aux utilisateurs.';
$string['confighiddenuserfields'] = 'Veuillez sélectionner quelles informations vous désirez cacher aux autres utilisateurs du cours que les administrateurs/enseignants. Vous pourrez ainsi améliorer la protection des données des participants. Il est possible de sélectionner plusieurs champs.';
$string['configrequestedstudentname'] = 'Terme utilisé pour « participant » dans les cours demandés';
$string['configrequestedstudentsname'] = 'Terme utilisé pour « participants » dans les cours demandés';
$string['configshowsiteparticipantslist'] = 'Tous les participants et les enseignants de la page d\'accueil de ce site seront affichés dans la liste des participants du site. Qui doit avoir les permissions requises pour voir cette liste des participants de la page d\'accueil ?';
$string['enablecommunicationsubsystem_desc'] = 'Ce réglage permet l’intégration de fournisseurs de communication comme Matrix pour faciliter la communication entre participants et enseignants. Ces intégrations se gérent dans les <a href="settings.php?section=managecommunicationproviders">Plugins</a>.';

$string['hidefromstudents'] = 'Cacher pour les participants';
$string['searchindexwhendisabled_desc'] = 'Permet à la tâche programmée de construire l\'index de recherche, même si la recherche est désactivée. Cette option est utile pour construire l\'index avant de rendre la recherche disponible pour les participants.';
