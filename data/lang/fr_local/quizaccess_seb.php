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
 * Strings for component 'quizaccess_seb', language 'fr', version '3.9'.
 *
 * @package     quizaccess_seb
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['seb_requiresafeexambrowser_help'] = 'Si ce réglage est activé, les participants ne peuvent ne peuvent y répondre qu\'au moyen de Safe Exam Browser.
Les options disponibles sont :

* Non
<br/>Safe Exam Browser n\'est pas requis pour répondre au test.
* Oui – Utiliser un gabarit existant
<br/>Un gabarit de configuration de Safe Exam Browser peut être utilisé. Les gabarits sont gérés dans l\'administration du site. Vos réglages manuels remplacent les réglages du gabarit.
* Oui – Configurer manuellement
<br/>Aucun gabarit de configuration de Safe Exam Browser n\'est utilisé. Vous pouvez configurer Safe Exam Browser manuellement.
* Oui – Déposer ma propre configuration
<br/>Vous pouvez déposer votre propre fichier de configuration Safe Exam Browser. Tous les réglages manuels et l\'utilisation des gabarits sont désactivés.
* Oui – Utiliser la configuration du client SEB
<br/>Aucune configuration de Safe Exam Browser n\'est effectuée du côté Moodle. Les participants peuvent répondre au test avec n\'importe quelle configuration de Safe Exam Browser.';
$string['sebrequired'] = 'Ce test a été configuré de sorte que les participants ne peuvent y répondre qu\'au moyen de Safe Exam Browser.';
$string['setting:displayblocksbeforestart_desc'] = 'Si ce réglage est activé, les blocs seront affichés avant que le participant commence le test.';
$string['setting:displayblockswhenfinished_desc'] = 'Si ce réglage est activé, les blocs seront affichés une fois que le participant a terminé le test.';
