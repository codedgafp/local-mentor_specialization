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
 * Strings for component 'qtype_regexp', language 'fr', version '3.9'.
 *
 * @package     qtype_regexp
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['penaltyforeachincorrecttry_help'] = 'Lorsque vous utilisez le mode « Interactif avec tentatives multiples » ou « Adaptatif »
les participants ont plusieurs essais pour trouver la bonne réponse. Cette option contrôle comment ils seront pénalisés pour chaque essai incorrect.

La pénalité est un pourcentage de la note totale de la question, donc si la question est notée sur 3 points et que la pénalité est de 0,33, alors le participant aura 3 points s\'il répond correctement à la question au premier essai,
2 points s\'il répond correctement au deuxième essai, et 1 point s\'il répond correctement au troisième essai.

Si vous avez sélectionné comme mode d\'aide pour cette question <strong>Lettre</strong> ou <strong>Mot</strong>,
 la valeur indiquée pour la pénalité s\'appliquera également à tout « achat » de lettre ou de mot.';
$string['pluginnamesummary'] = 'Question à réponse courte où les réponses du participant sont basées sur des expressions régulières';
$string['regexpsummary'] = 'Question à réponse courte où les réponses du participant sont basées sur des expressions régulières';
$string['studentshowalternate_help'] = 'Montrer <strong>toutes</strong> les réponses alternatives correctes au participant sur la page « Relecture » ? S\'il y a beaucoup de réponses alternatives générées automatiquement, la page peut devenir très longue…';
$string['usehint_help'] = 'Si un mode d\'aide autre que <strong>Aucun</strong> est sélectionné, un bouton d\'aide sera affiché pour permettre au participant d\'« acheter » une lettre ou un mot.

En mode <strong>Adaptif</strong>, le bouton d\'aide affichera « Acheter la lettre suivante » ou « Acheter le mot suivant » selon
le mode sélectionné par l\'enseignant. Pour la valeur de la pénalité d\'achat d\'une lettre ou d\'un mot,
voir le paramétrage <strong>plus bas sur cette page</strong>.

En mode <strong>Adaptif sans pénalité</strong>, le bouton d\'aide affichera « Demander la lettre suivante » ou « Demander le mot suivant »

La valeur par défaut du paramètre <strong>Mode d\'aide</strong> est <strong>Aucun</strong>.';
