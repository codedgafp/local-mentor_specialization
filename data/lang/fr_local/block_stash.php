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
 * Strings for component 'block_stash', language 'fr', version '3.9'.
 *
 * @package     block_stash
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['dropname_help'] = 'Le nom du lieu vous sert à les organiser, il ne sera pas affiché aux participants.';
$string['drops_help'] = '<p>Les lieux sont des endroits où vos objets sont présents dans le <em>monde virtuel</em>. Sans <em>lieu</em> défini, les participants ne pourront pas récupérer l\'objet.</p>
<p>Quelques options sont proposées pour les lieux, notamment le nombre de fois qu\'un participant peut récupérer l\'objet dans ce lieu ou la fréquence à laquelle l\'objet réapparaît dans le même lieu après avoir été récupéré.</p>
<p>Par exemple, si vos participants doivent récupérer une <em>clé</em> pour débloquer une activité, vous préciserez que les participants ne peuvent la récupérer qu\'une seule fois dans ce lieu.</p>
<p>Si par contre il leur faut <em>5 pièces</em> pour débloquer une autre activité, vous pouvez spécifier que l\'objet doit réapparaître quotidiennement pour les encourager à consulter votre cours chaque jour.</p>
<p>Notez toutefois que les objets n\'apparaîtront pas par magie dans votre cours, vous devrez ajouter un code spécial dans un contenu pour qu\'ils apparaîssent.</p>';
$string['itemname_help'] = 'Le nom de l\'objet qui sera affiché aux participants.';
$string['maxpickup_help'] = 'Le nombre de fois qu\'un même objet peut être récupéré par chaque participant dans ce lieu. Par exemple, si vous spécifiez « 1 », il ne sera récupérable qu\'une fois par participant. Par contre, si vous spécifiez « 5 », chaque participant pourra le récupérer 5 fois dans ce lieu. Pour les valeurs différentes de « 1 », il est préférable de l\'utiliser en combinaison avec « l\'intervalle de récupération ».';
$string['pickupinterval_help'] = '<p>Ceci définit le temps nécessaire pour qu\'un objet réapparaisse pour les participants qui l\'ont déjà récupéré. Par exemple, si vous avez ajouté un objet «pain» vous pourriez définir un intervalle de récupération de 24 heures pour laisser le temps au boulanger d\'en refaire. Il est important de savoir que lorsqu\'un participant récupère un objet, les autres participants ne sont pas impactés.</p>
<p>Ce paramètre n\'a pas d\'effet si «Nombre maximum» est égal à «1».';
$string['tradename_help'] = 'Le nom du troc. Il peut être affiché aux participants.';
