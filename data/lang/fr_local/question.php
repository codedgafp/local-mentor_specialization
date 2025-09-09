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
 * Strings for component 'question', language 'fr', version '3.9'.
 *
 * @package     question
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['penaltyfactor_help'] = 'Ce réglage détermine la fraction de la note obtenue qui sera retirée pour chaque mauvaise réponse donnée. Il n\'est applicable que pour les tests en mode adaptatif.

Le facteur de pénalité doit être un nombre compris entre 0 et 1. Un facteur de pénalité de 1 signifie que le participant doit fournir la bonne réponse au premier essai, sous peine de n\'obtenir aucun point. Un facteur de pénalité de 0 indique que le participant peut réessayer autant qu\'il le veut et pourra obtenir tous les points.';
$string['penaltyforeachincorrecttry_help'] = 'Lorsque des questions sont en mode « Interactif avec essais multiples » ou « Adaptatif », les participants ont plusieurs essais pour trouver la bonne réponse. Cette option contrôle comment ils sont pénalisés pour chaque essai incorrect.

La pénalité est un pourcentage de la note totale de la question, donc si la question est notée sur 3 points et que la pénalité est de 0,3333333, alors le participant aura 3 points s\'il répond correctement à la question au premier essai, 2 points s\'il répond correctement au deuxième essai, et 1 point s\'il répond correctement au troisième essai.

Pour certaines questions en plusieurs parties, cette logique est appliquée séparément à chacune des parties de la question. Les détails dépendent du type de question et peuvent être compliqués, mais le principe est de donner crédit aux participants de manière aussi équitable que possible pour les connaissances qu\'ils ont démontrées.';
