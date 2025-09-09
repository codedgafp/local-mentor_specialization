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
 * Strings for component 'enrol_ldap', language 'fr', version '3.9'.
 *
 * @package     enrol_ldap
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname_desc'] = '<p>Vous pouvez utiliser un serveur LDAP pour contrôler les inscriptions aux cours. On suppose que votre arbre LDAP contient des groupes correspondant aux cours, et que chacun de ces groupes/cours contiendra les inscriptions à faire correspondre avec les participants.</p>
<p>On suppose que dans LDAP, les cours sont définis comme des groupes, et que chaque groupe comporte plusieurs champs indiquant l\'appartenance (<em>member</em> ou <em>memberUid</em>), contenant un identificateur unique de l\'utilisateur.</p>
<p>Pour pouvoir utiliser les inscriptions par LDAP, les utilisateurs <strong>doivent</strong> avoir un champ idnumber valide. Les groupes LDAP doivent comporter cet idnumber dans le champ définissant l\'appartenance afin que l\'utilisateur soit inscrit à ce cours. Cela fonctionne bien si vous utilisez déjà l\'authentification par LDAP.</p>
<p>Les inscriptions sont mises à jour lors de la connexion de l\'utilisateur. Il est aussi possible de lancer un script pour synchroniser les inscriptions. Voyez pour cela le fichier <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Cette extension peut également servir à la création automatique de nouveaux cours lorsque de nouveaux groupes apparaissent dans LDAP.</p>';
