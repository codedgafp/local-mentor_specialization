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
 * Strings for component 'enrol_lti', language 'fr', version '3.9'.
 *
 * @package     enrol_lti
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowunenrol'] = 'Permettre aux données IMS de désinscrire les participants et enseignants';
$string['provisioningmode_help'] = 'Ce réglage détermine comment les comptes sont traités au premier lancement. Plusieurs modes sont pris en charge :
<ul>
<li>Nouveaux comptes seulement (automatique) - Des comptes seront créés automatiquement pour les utilisateurs qui lancent depuis la plateforme. Ce réglage est le réglage par défaut pour le premier lancement par les participants.</li>
<li>Comptes existants et nouveaux (demande) - L’utilisateur pourra choisir que faire. Il peut décider le lier un compte existant ou de créer une nouveau compte pour lui. C’est l’option la plus flexible et le réglage par défaut pour le premier lancement par les enseignants.</li>
<li>Comptes existants seulement (demande) - L’utilisateur devra lier un compte existant. Il n’aura pas accès aux ressources de l’outil sans le faire.</li>
</ul>';
$string['provisioningmodestudentlaunch'] = 'Mode de provisionnement au premier lancement par un participant';

$string['rolelearner'] = 'Rôle du participant';
$string['rolelearner_help'] = 'Le rôle qui sera attribué dans l\'outil au participant distant.';
