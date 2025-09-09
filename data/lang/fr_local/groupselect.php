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
 * Strings for component 'groupselect', language 'fr', version '3.9'.
 *
 * @package     groupselect
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['deleteemptygroups'] = 'Supprimer le groupe quand le dernier participant l\'a quitté';
$string['deleteemptygroups_help'] = 'Si activé, le groupe sera automatiquement supprimé lorsque le dernier participant l\'aura quitté';
$string['globalpassword_help'] = 'Définit un mot de passe global pour rejoindre les groupes, écrase des mots de passe définis par les participants.';
$string['modulename_help'] = '<p>Permet aux participants de créer et de sélectionner des groupes. Fonctionnalités: </p><ul><li>Les participants peuvent créer des groupes, leur donner une description et les protéger par un mot de passé, si désiré</li><li>les participants peuvent sélectionner et rejoindre des groupes</li><li>Des référents peuvent être assignés aux groupes</li><li>Les enseignants peuvent exporter les groupes du cours en fichier csv </li><li>Compatibilité totale avec des groupes de base de Moodle: Des groupes peuvent être créés par d\'autres moyens si nécessaire, gère la remise de devoirs de groupe etc.</li></ul>';
$string['showassignedteacher_help'] = 'Si défini, les référents attribués apparaissent comme membres de groupe. Utile si les participants ont besoin de connaître leur enseignant attribué';
$string['studentcancreate'] = 'Les participants peuvent créer des groupes';
$string['studentcancreate_help'] = 'Si défini, les participants sans groupe (dans le groupement sélectionné) peuvent créer des groupes.';
$string['studentcanjoin'] = 'Les participants peuvent joindre des groupes';
$string['studentcanjoin_help'] = 'Si défini, les participants peuvent joindre des groupes. Cette permission peut être définie dans les capacités des rôles.';
$string['studentcanleave'] = 'Les participants peuvent quitter des groupes';
$string['studentcanleave_help'] = 'Si défini, les participants peuvent quitter des groupes. Cette permission peut être définie dans les capacités des rôles.';
$string['studentcansetdesc'] = 'Les participants peuvent créer et modifier la description du groupe';
$string['studentcansetdesc_help'] = 'Si activé, les participants peuvent spécifier une description pour un groupe et les membres de ce groupe peuvent la modifier';
$string['studentcansetenrolmentkey'] = 'Les participants peuvent définir des mots clés pour rejoindre des groupes.';
$string['studentcansetenrolmentkey_help'] = 'Si défini, les participants peuvent définir une clé d\'inscription pour rejoindre des groupes';
$string['studentcansetgroupname'] = 'Les participants peuvent définir le nom de nouveaux groupes';
$string['studentcansetgroupname_help'] = 'Si défini, les participants peuvent définir des noms de groupe';
