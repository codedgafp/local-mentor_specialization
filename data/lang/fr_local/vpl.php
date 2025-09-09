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
 * Strings for component 'vpl', language 'fr', version '3.9'.
 *
 * @package     vpl
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['discard_submission_period_description'] = 'Pour chaque participant et devoir, le système essaie de rejeter les soumissions. Le système conserve la dernière et au moins une soumission pour chaque période';
$string['executionfiles_help'] = '<h2>Introduction</h2>
<p>Ici, vous définissez les fichiers nécessaires à la préparation de
l\'exécution, du débogage ou de l\'évaluation d\'une soumission.
Cela inclut les fichiers de script, les fichiers de test de programme
et les fichiers de données</p>
<h2>Script par défaut pour exécuter ou pour déboguer</h2>
<p>Si vous ne définissez pas de fichiers de script pour exécuter ou déboguer
les soumissions, le système résoudra le langage que vous utilisez (en fonction
des extensions de nom de fichier) et utilisera un script prédéfini.</p>
<h2>Évaluation automatique</h2>
<p>Fonctionnalités intégrées pour facilitter l\'évaluation des dépôts de participants.
Cette fonctionnalité perme d\'exécuter le programme du participant et de vérifier sa
sortie pour une entrée donnée. Pour configurer les cas d\'évaluation, vous devez remplir
le fichier &quot;vpl_evaluate.cases&quot;.</p>

<p>Le fichier &quot;vpl_evaluate.cases&quot; a le format suivant :</p>
<ul>
<li> «<strong>case </strong>= Description du cas» : Facultatif. Définir un début de définition de cas de test.</li>
<li> «<strong>input </strong>= texte» : peut êre sur plusieurs lignes. Se termine par une autre instruction.</li>
<li> «<strong>output </strong>= texte» : peut êre sur plusieurs lignes. Se termine par une autre instruction. Un cas peut avoir plusieurs sorties correctes. Il y a 3 types de sorties : nombres, texte and texte exact :
<ul>
<li> <strong>number</strong>: séquence de nombres (entiers et flottants). Seuls les nombres de la sortie sont vérifiés, les autres textes sont ignorés. Les flottants sont vérifiés avec une tolérance</li>
<li> <strong>text</strong>: texte sans guillemets. Seuls les mots sont vérifiés et les autres caractères sont ignorés, la comparaison est insensible à la casse </li>
<li> <strong>exact text</strong>: texte ntre guillemets doubles. La correspondance exacte est utilisée pour tester la sortie.</li>
</ul>
</li>
<li> «<strong>grade reduction</strong> = [valeur|pourcentage%]» : Par défaut, une erreur réduit la note de l\'élève
(commence par maxgrade) de (grade_range / nombre de cas) mais avec cette instruction, vous pouvez changer
la valeur ou le pourcentage de réduction.</li>
</ul>
</p>
<h2>Usage général</h2>
<p>Un nouveau fichier peut être ajoué en écrivnat son nom dans la boîte de dialogue &quot;<b>Ajouter un fichier</b>&quot';
$string['executionoptions_help'] = '<p>Diverses options d\'exécution sont définies dans cette page</p>
<ul>
<li><b>Basée sur</b>: définit une autre instance VPL à partir de laquelle certaines fonctionnalités sont importées :
<ul><li>Fichiers d\'exécution (concaténation des fichiers de script prédéfinis)</li>
<li>Limites des ressources d\'exécution.</li>
<li>Variantes, qui se concaténent pour générer des multivariantes.</li>
<li>Taille maximale de chaque fichier à télécharger avec la soumission</li>
</ul>
</li>
<li><b>Exécuter</b>, <b>Déboguer</b> et <b>Évaluer</b>: doivent être réglés sur «Oui» si l\'action correspondante peut êre exécutée pendan la modification de la soumission. Cela affecte uniquement les participants, les utilisateurs ayant la capacité de noter peuvent toujours exécuter ces actions.</li>
<li><b>Évaluer uniquement lors de la soumission</b> : la soumission est évaluée automatiquement lors de son téléchargement.</li>
<li><b>Évaluaion automatique</b>: si le résultat de l\'évaluation comprend des codes de notation, ils sont utilisés pour définir automatiquement la note.</li>
</ul>';
$string['finalreduction_help'] = '<b>FR [NE/FE R]</b><br>
<b>FR</b> Réduction de la note finale.<br>
<b>NE</b> Évaluations automatiques demandées par le participant.<br>
<b>FE</b> Évaluations libres autorisées.<br>
<b>R</b> Réduction de note par évaluation. S\'il s\'agit d\'un pourcentage, il s\'applique au résultat précédent.<br>';
$string['modulename_help'] = '<p>VPL est un module d\'activité pour Moodle qui gère des exercices de programmation et dont les principales caractéristiques sont :</p>
<ul>
<li>Activer pour modifier le code source des programmes dans le navigateur</li>
<li>Les participants peuvent exécuter des programmes interactivement dans le navigateur</li>
<li>Vous pouvez exécuter des tests pour examiner les programmes.</li>
<li>Permet de rechercher la similitude entre les fichiers.</li>
<li>Permet de définir des restrictions de modification et d\'éviter le collage de texte externe.</li>
</ul>
<p><a href="http://vpl.dis.ulpgc.es">Page d\'accueil de Virtual Programming lab</a></p>';
$string['reductionbyevaluation_help'] = 'Réduire le score final d\'une valeur ou d\'un pourcentage pour chaque évaluation automatique demandée par le participant';
$string['testcases_help'] = 'Cette fonction permet d\'exécuter le programme du participant et de vérifier sa sortie pour une entrée donnée. Pour configurer les cas d\'évaluation, vous devez remplir le fichier &quot;vpl_evaluate.cases&quot;.<br>
Le fichier «vpl_evaluate.cases» a le format suivant :<br>
<ul>
<li> «<strong>case </strong>= Description du cas» : Facultatif. Définir un début de définition de cas de test.</li>
<li> «<strong>input </strong>= texte» : peut êre sur plusieurs lignes. Se termine par une autre instruction.</li>
<li> «<strong>output </strong>= texte» : peut êre sur plusieurs lignes. Se termine par une autre instruction. Un cas peut avoir plusieurs sorties correctes. Il y a 3 types de sorties : nombres, texte and texte exact :
<ul>
<li> <strong>number</strong>: séquence de nombres (entiers et flottants). Seuls les nombres de la sortie sont vérifiés, les autres textes sont ignorés. Les flottants sont vérifiés avec une tolérance</li>
<li> <strong>text</strong>: texte sans guillemets. Seuls les mots sont vérifiés et les autres caractères sont ignorés, la comparaison est insensible à la casse </li>
<li> <strong>exact text</strong>: texte ntre guillemets doubles. La correspondance exacte est utilisée pour tester la sortie.</li>
</ul>
</li>
<li> «<strong>grade reduction</strong> = [valeur|pourcentage%]» : Par défaut, une erreur réduit la note de l\'élève
(commence par maxgrade) de (grade_range / nombre de cas) mais avec cette instruction, vous pouvez changer
la valeur ou le pourcentage de réduction.</li>
</ul>';
$string['variations_help'] = '<p>Un ensemble de variantes peut être défini pour une activité. Ces variantes sont attribuées aléatoirement aux participants.</p>
<p>Ici, vous pouvez indiquer si cette activité comporte des variantes, mettre un titre pour l\'ensemble des variantes et ajouter les variantes souhaitées.</p>
<p>Chaque variante a un code d\'identification et une description. Le code d\'identification est utilisé par le fichier <b> vpl_enviroment.sh </b> pour passer
la variante attribuée à chaque élève aux fichiers de script. La description, formatée en HTML, est présentée aux participants à qui a été attribuée
la variante correspondante.</p>';
