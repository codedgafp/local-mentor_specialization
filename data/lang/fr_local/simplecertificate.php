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
 * Strings for component 'simplecertificate', language 'fr', version '3.9'.
 *
 * @package     simplecertificate
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['certificatetext_help'] = 'Ceci est le texte qui sera utilisé dans le certificat, certains mots spéciaux seront remplacés par des variables telles que le nom du cours, le nom du participant, de qualité... Ce sont : {USERNAME} -> nom d\'utilisateur complet {COURSENAME} -> nom du cours complet (ou un autre nom de parcours défini) {GRADE} -> formaté année {DATE} -> date formatée  {OUTCOME} -> Résultats {HOURS} -> heures définies en cours {TEACHERS} -> Liste des enseignants
Le texte peut utiliser du html de base, les polices de base, tables, mais il faut éviter toute définition de position';
$string['coursetimereq_help'] = 'Entrez ici la durée minimale, en minutes, où le participant doit être inscrit dans le cours avant qu\'il ne soit en mesure de recevoir le certificat';
$string['delivery_help'] = 'Choisissez ici la façon dont vous souhaitez que vos élèves obtiennent leur certificat.
Ouvrir dans le navigateur : Ouvre le certificat dans une nouvelle fenêtre du navigateur.
Forcer le  Téléchargement : Ouvre la fenêtre de téléchargement du fichier du navigateur.
Certificat Email : Cette option envoie le certificat au participant en pièce jointe.
Après qu\'un utilisateur a reçu son certificat, s\'il clique sur le lien du certificat de la page d\'accueil du cours, il verra la date à laquelle il a reçu son certificat et sera en mesure d\'examiner son certificat reçu.';
$string['emailothers_help'] = 'Entrez ici les adresses courriel séparées par une virgule, de ceux qui devraient être alertés par courriel chaque fois que les participants reçoivent un certificat';
$string['emailteachers_help'] = 'Si elle est activée, les enseignants sont alertés avec un e-mail chaque fois que les participants reçoivent un certificat.';
