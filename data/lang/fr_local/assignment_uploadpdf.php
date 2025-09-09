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
 * Strings for component 'assignment_uploadpdf', language 'fr', version '3.9'.
 *
 * @package     assignment_uploadpdf
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['coversheet_help'] = 'Ce fichier (format PDF) sera automatiquement joint au fichier soumis par le participant.<br/>Un lien vers cette page de présentation sera disponible sur la page de remise du participant pour qu\'il puisse la consulter.<br/><em>Note:</em> Il est possible de remplir automatiquement la page de présentation en utilisant un modèle (voir le prochain élément dans les paramètres).';
$string['coversheettemplate_help'] = 'Si vous sélectionner un modèle, le participant devra, avant de soumettre son devoir, fournir un certain nombre de renseignements (spécifiés dans le modèle). Ces renseignements seront automatiquement ajoutés à la page de présentation, selon la mise en page du modèle.<br/>Vous pouvez créer/supprimer/modifier les modèles en cliquant sur le bouton d\'édition.<br/><em>Note:</em> Choisir un modèle sans sélectionner une page de présentation n\'aura aucun effet.';
$string['onlypdf_help'] = 'En sélectionnant Oui, vous empêcherez les participants de remettre des fichiers autres que PDF.<br/>Si vous sélectionnez Non, les participants auront un message d\'avertissement si leur fichier nest pas un PDF, mais pourront le remettre <em>à condition d\'avoir remis au moins un PDF</em>.<br/>Cette deuxième option permet, par exemple, la remise d\'autres fichiers complémentaire au PDF. Seul le PDF pourra être annoté en ligne.';
