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
 * Strings for component 'assignfeedback_pdf', language 'fr', version '3.9'.
 *
 * @package     assignfeedback_pdf
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['annotationhelp_text'] = '<table>
<thead><tr><th>Contrôle</th><th>Raccourci clavier</th><th>Description</th></tr></thead>
<tr><td>{$a->save}</td><td> </td><td>Fermer l\'annotation sans générer de fichier de réponse </td></tr>
 <tr><td>{$a->generate}</td><td> </td><td>Générer un fichier PDF de réponse téléchargeable par le participant</td></tr>
 <tr><td>Rechercher commentaires</td><td> </td><td>Sauter à un commentaire précédent et le surligner</td></tr>
 <tr><td>Précédent</td><td> </td><td>Afficher les commentaires d\'un autre devoir pour cet participant (dans un cadre latéral)</td></tr>
 <tr><td><-- Précédent</td><td>p</td><td>Voir page précédente</td></tr>
 <tr><td>Suivant --></td><td>n</td><td>Voir page suivante</td></tr>
 <tr><td>Couleur de fond</td><td>[ and ]</td><td>Modifier la couleur de remplissage de la boîte de commentaires (aussi par clic droit sur commentaire)</td></tr>
 <tr><td>Couleur du trait</td><td>{ and }</td><td>Modifier la couleur pour l\'annotation</td></tr>
 <tr><td>Choisir estampe</td><td> </td><td>Choisir l\'estampe pour l\'outil d\'estampe</td></tr>
 <tr><td>{$a->comment}</td><td>c</td><td>Cliquer dans la page pour ajouter commentaire et cliquer de nouveau dans la page pour enregistrer. Cliquer sur le commentaire pour le modifier, glisser pour déplacer. Cliquer à droite pour modifier la couleur, enregistrer dans la liste ou supprimer (ou supprimer du texte).</td></tr>
 <tr><td>{$a->line}</td><td>l</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour ajouter un trait sur la page</td></tr>
 <tr><td>{$a->rectangle}</td><td>r</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour dessiner un rectangle sur la page</td></tr>
 <tr><td>{$a->oval}</td><td>o</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour dessiner un  ovale sur la page</td></tr>
 <tr><td>{$a->freehand}</td><td>f</td><td>Cliquer et glisser pour dessiner à main levée</td></tr>
 <tr><td>{$a->highlight}</td><td>h</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour surligner du contenu</td></tr>
 <tr><td>{$a->stamp}</td><td>s</td><td>Cliquer pour ajouter l\'estampe choisie (taille par défaut). Cliquer et glisser pour ajuster la taille</td></tr>
 <tr><td>{$a->erase}</td><td>e</td><td>Cliquer sur une annotation (et non un commentaire) pour la supprimer</td></tr>
 <tr><td>Liste</td><td> </td><td>Cliquer à droite sur la page pour ajouter un commentaire préalablement enregistré dans la liste. Utiliser le "x" pour supprimer des éléments de la liste.</td></tr>
 </table>';
$string['enabled_help'] = 'Ceci permet l\'annotation en ligne de fichiers PDF (remise via devoir PDF) et l\'envoi du corrigé aux participants.';
