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
 * Strings for component 'offlinequiz', language 'fr', version '3.9'.
 *
 * @package     offlinequiz
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allstudents'] = 'Afficher tous les participants';
$string['attemptsonly'] = 'Afficher uniquement les participants ayant des résultats';
$string['closestudentview'] = 'Fermer la vue participante';
$string['generalfeedback_help'] = 'Le feedback général d\'une question est le texte présenté au participant après une tentative. Contrairement au feedback pour une question spécifique, qui dépend du type de question et de la réponse donnée, le même feedback général est toujours affiché.';
$string['modulename_help'] = 'Ce module permet à l\'enseignant de concevoir les tests hors-lignes constitués de questions à choix multiples.
Les questions sont sauvegardées dans la banque de questions de Moodle et peuvent  être réutilisées dans le cours et même dans d\'autres cours.
Les tests hors-lignes peuvent-être téléchargés au format PDF. Les participants cochent leurs réponses sur une grille. Les grilles sont scannées et les réponses importées dans le système.';
$string['noattemptsonly'] = 'Afficher uniquement les participants sans résultat';
$string['oneclickroledesc'] = 'Choisir le rôle pour les inscriptions en un clic. Seuls les rôles avec le modèle "Participant" peuvent être sélectionnés.';
$string['participants_help'] = '<p>Les listes de participants sont destinées aux tests hors-ligne avec un nombre important de participants. Elles aident l\'enseignant à vérifier quels participants ont effectivement participé au test hors-ligne et si tous les résultats ont été importés correctement.
Vous pouvez ajouter des utilisateurs aux différentes listes. Chaque liste peut par exemple contenir les participants regroupés dans une salle. Les participants peuvent être membres d\'un groupe spécial. Un outil d\'inscription peut être utilisé pour créer ces groupes.
Des listes de participants peuvent être téléchargées sous forme de documents PDF, imprimées et cochées exactement comme les grilles de réponse des tests hors-ligne. Plus tard elles peuvent être importées et les participants marqués seront considérés comme présents au test hors-ligne.
Veuillez éviter toute marque ou tâche sur les codes barres car ils sont utilisés pour identifier chaque participant.</p>';
$string['quizopenclose_help'] = 'Les participants ne peuvent voir leurs tentatives qu\'après l\'heure d\'ouverture et avant l\'heure de fermeture.';
$string['reviewoptions'] = 'Les participants peuvent relire';
$string['reviewoptions_help'] = 'Ces options permettent de décider les informations que les participants au test hors-ligne peuvent voir après l\'import des résultats.
Vous pouvez aussi définir les dates de début et de fin de la relecture. Les cases à cocher signifient
<table>
<tr><td style="vertical-align: top;"><b>La tentative</b></td><td>
Le texte des questions et les réponses seront affichés aux participants. Ils verront quelles réponses ils ont choisies, mais les réponses correctes ne seront pas indiquées.</td>
</td></tr>
<tr><td style="vertical-align: top;"><b>Si correcte</b></td><td>
Cette option ne peut être activée que si l\'option "La tentative" est aussi activée. Si activée, les participants verront quelles réponses étaient correctes (fond vert) ou incorrectes (fond rouge).
</td></tr>
<tr><td style="vertical-align: top;"><b>Points</b></td><td>
Les notes (points) pour les tests hors-ligne seront affichées. Cette option n\'est utile que si "Réponses juste" ou "La grille scannée" sont activés.
</td></tr>
<tr><td style="vertical-align: top;"><b>Réponse juste</b></td><td>
La réponse correcte à la question est affichée. Cette option n\'est disponible que si l\'option "La tentative" est activée.
</td></tr>
<tr><td style="vertical-align: top;"><b>La grille scannée</b></td><td>
La grille des réponses scannée est affichée. Les cases reconnues comme cochées sont marquées par un cadre vert.
</td></tr>
<tr><td style="vertical-align: top;"><b>La grille scannée avec les notes</b></td><td>
La grille des réponses scannée est affichée. Les cases reconnues comme cochées sont marquées par un cadre vert. Les croix inexactes ou manquantes sont indiquées par un carré rouge. De plus, une table indique les notes maximum et les notes atteintes pour chaque question.
</td></tr>
</table>';
$string['showcopyrightdesc'] = 'Si vous activez cette option, une mention de copyright sera affichée aux participants sur la page de relecture des résultats.';
$string['showstudentview'] = 'Afficher la vue participant';
$string['showtutorial'] = 'Afficher un tutoriel sur les tests hors-ligne aux participants';
$string['showtutorial_help'] = 'Cette option détermine si les participants peuvent visualiser un tutoriel sur les bases des tests hors-ligne.
Ce tutoriel fournit des informations sur comment utiliser les différents documents constituant un test hors-ligne. Une partie interactive leur enseigne comment marquer correctement leur numéro d\'identification.<br />
<b>Veuillez noter :</b><br />
Si vous réglez cette option sur Oui, mais que le test hors-ligne est masqué, le lien ne sera pas visible. Dans ce cas, vous pouvez ajouter un lien vers le tutoriel sur la page de cours.';
$string['studycode'] = 'Code participant';
