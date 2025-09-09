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
 * Strings for component 'qtype_formulas', language 'fr', version '3.9'.
 *
 * @package     qtype_formulas
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answertype_help'] = 'Il y a quatre types de réponses.

Les réponses nombre, numérique et formule numérique requièrent un nombre ou une liste de nombres comme réponse.

Les réponses formule algébrique requièrent une chaîne ou une liste de chaînes comme réponse.

Les différents types de réponses imposent diférentes restrictions lors de la saisie des réponses, aussi les participants ont besoin de savoir
comment les saisir. Le code de vérification du format dans la question leur signalera
en cours de frappe s\'ils entrent une réponse illégale. Lisez la documentation pour plus de détails.';
$string['correctfeedback_help'] = 'Ce feedback sera affiché aux participants ayant le maximum de points sur cette partie. Il peut intégrer des variables globales ou locales qui seront remplacées par leurs valeurs.';
$string['feedback_help'] = 'Le feedback de cette partie sera affiché seulement aux participants qui n\'ont pas obtenu la note maximale à la partie.
Il peut contenir des variables globales et locales qui seront remplacées par leur valeur';
$string['incorrectfeedback_help'] = 'Ce feedback sera affiché aux participants n\'ayant pas de points sur cette partie. Il peut intégrer des variables globales ou locales qui seront remplacées par leurs valeurs.';
$string['partiallycorrectfeedback_help'] = 'Ce feedback sera affiché aux participants n\'ayant pas le maximum de points sur cette partie. Il peut intégrer des variables globales ou locales qui seront remplacées par leurs valeurs.';
$string['postunit_help'] = 'Vous pouvez spécifier une unité ici. Ce type de question est spécialement conçu pour le système SI, un espace
représente le \'produit\' de différentes \'unités de base\' and <tt> ^ </tt> est utilisé pour les exposants.
De plus <tt> / </tt> peut être utilisé pour les exposants négatifs. Toute permuntation des unités de base est considérée comme équivalente.

Les participants doivent utiliser le même format d\'entrée. Par exemple,

<pre class="prettyprint">1 m<br>0.1 m^2<br>20 m s^(-1)<br>400 kg m/s<br>100 kW</pre>';
$string['unitpenalty_help'] = 'Cette option spécifie la pénalité pour une unité incorrecte.

Sa valeur doit être entre 0 et 1. S\'il vaut 1, l\'unité et la réponse doivent être simultanément corrects
pour obtenir une note non nulle à la partie. La valeur et la réponse sont donc traitées comme une seule entité.
Par contre s\'il vaut 0, les participants obtiendront la note maximale à la partie dès que leur réponse est juste,
sans tenir compte des caractères figurant après la réponse qu\'il s\'agisse d\'une unité incorrecte ou de caractères quelconques.

Aussi il est recommandé d\'utiliser une pénalité de 1 dès que la question implique une réponse sans unité.';
$string['vars2_help'] = 'Toutes les variables locales et les réponses du participant peuvent être utilisées ici.
Voir la documentation pour les utilisations avancées.';
