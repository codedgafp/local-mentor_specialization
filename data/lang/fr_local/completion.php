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
 * Strings for component 'completion', language 'fr', version '3.9'.
 *
 * @package     completion
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bulkcompletiontracking_help'] = '<strong>Aucun :</strong> ne pas indiquer d\'achèvement d\'activité

<strong>Manuel :</strong> les participants peuvent marquer manuellement l\'activité comme achevée

<strong>Avec conditions :</strong> marquer l\'activité comme achevée lorsque des conditions sont remplies';
$string['completionusegrade_desc'] = 'Les participants doivent recevoir une note pour terminer cette activité';
$string['completionusegrade_help'] = 'Quand cette option est activée, les participants doivent obtenir une note à l\'activité pour la terminer. Des icônes de réussite ou d\'échec peuvent être affichées, si une note minimale pour réussir a été spécifiée.';
$string['completionview_desc'] = 'Les participants doivent afficher cette activité pour la terminer';
$string['err_nousers'] = 'Aucun des participants de ce cours ou de ce groupe n\'a de rôle pour lequel le suivi de l\'achèvement des activités est activé. Les informations d\'achèvement ne sont affichées que pour les utilisateurs disposant de la capacité « Être affiché dans les rapports d\'achèvement ». Or cette capacité n\'est permise que pour le rôle de participant ; ce message est donc affiché s\'il n\'y a pas de participant.';
$string['err_settingslocked'] = 'Un ou plusieurs participants ont déjà rempli un critère, c\'est pourquoi les réglages ont été verrouillés. Le déverrouillage des critères d\'achèvement supprimera les données existantes de l\'état d\'achèvement des utilisateurs et causera des confusions.';
