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
 * Strings for component 'quiz_answersheets', language 'fr', version '3.9'.
 *
 * @package     quiz_answersheets
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answersheets:submitresponses'] = 'Soumettre les réponses du participant';
$string['bulkinstructions'] = 'Afin de télécharger les tentatives en lot, vous devez installer l\'outil `save-answersheets` sur votre ordinateur. Ceci fait:

1. Les tentatives qui seront téléchargées correspondent au paramétrage du rapport affiché à la page précédente.
  Le processus utilisera chaque lien vers **Formulaire de relecture** dans ce rapport. Par conséquent, en cas de doute, retournez au rapport et vérifiez que les tentatives présentes dans le rapport correspondent bien à celles que vous voulez exporter.
2. Lorsque le rapport est prêt, téléchargez le [fichier d\'instructions pour le téléchargement en lot]({$a->scripturl}) qui fournira à l\'outil `save-answersheets` les étapes à réaliser.
  **Tenez-bien compte de l\'avertissement en haut de cette page!**
3. Sauvegardez ce fichier (nommé `{$a->scriptname}-steps.txt`) dans le même répertoire que `save-answersheets` sur votre ordinateur.
4. Ouvrez un terminal de commande et placez-vous dans ce répertoire.
5. Entrez la commande `.\\save-answersheets \'{$a->scriptname}-steps.txt\'` et attendez son exécution. Le script affiche les opérations au fur et à mesure de l\'exécution.
6. Lorsque le script a terminé son exécution, vous devriez trouver un fichier `{$a->scriptname}.zip` dans le répertoire `output`.
7. N\'oubliez pas de supprimer le fichier `{$a->scriptname}-steps.txt`.

Après avoir téléchargé le fichier, si vous ne souhaitez obtenir que le formulaire d\'un participant, vous pouvez exécuter une commande de la forme `.\\save-answersheets --download-only \'X1234567\' \'{$a->scriptname}-steps.txt\'`

Si vous exécutez à nouveau ces commandes, elles n\'exporteront que les fichiers qui n\'ont pas encore été récupérés. Cela peut-être utile, par exemple, si quelques participants seulement ont réalisé le test depuis le dernier export.';
$string['column_submit_student_responses'] = 'Soumettre les réponses des participants';
$string['submit_student_responses_title'] = '{$a} : soumettre les réponses du participant';
