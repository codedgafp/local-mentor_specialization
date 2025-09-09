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
 * Strings for component 'qtype_stack', language 'fr', version '3.9'.
 *
 * @package     qtype_stack
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowwords_help'] = 'Par défaut, des noms de fonctions ou de variables de plus de deux caractères ne sont pas permis. Voici la liste des noms de fonction et de variables qui sont permises dans les réponses des participants.';
$string['branchfeedback_help'] = 'Ceci est un CASText, qui pourra dépendre des variables de la question, des éléments d\'input et des variables de feedback. Ce texte est évalué et affiché au participant s\'il traverse cette branche.';
$string['forbidwords_help'] = 'Une liste de chaînes de caractères interdites dans les réponses des participants, séparées par des virgules.';
$string['generalfeedback_help'] = 'Le feedback général est en CASText. Il est affiché au participant après qu\'il a répondu à la question. Contrairement au feedback normal, qui dépend du contenu de la réponse donnée par le participant, le feedback général est indépendant du contenu de la réponse. Il peut toutefois répondre des variables de la question utilisées dans la version de la question.';
$string['mustverify'] = 'Demander au participant de vérifier';
$string['mustverify_help'] = 'Ce champ spécifie si la saisie du participant lui est présentée en retour, dans le cadre d\'un processus en deux étapes avant qu\'elle soit évaluée. Les erreurs de syntaxe sont toujours rapportées.';
$string['pluginnamesummary'] = 'STACK permet de créer des questions mathématiques pour les tests de Modèle. Un système de calcul formel est utilisé pour établir les propriétés mathématiques des réponses des participants.';
$string['prtwillbecomeactivewhen'] = 'Cet arbre de réponse potentiel sera actif quand le participant aura répondu : {$a}';
$string['questiontext_help'] = 'Le texte de la question est en CASText. C\'est le texte présenté au participant comme question. Vous devez insérer les éléments d\'input et les chaînes de validation dans ce champ et uniquement dans ce champ. Par exemple, on peut y insérer « [[input:ans1]] [[validation:ans1]] ».';
$string['quiet_help'] = 'Si ce réglage est activé, les feedbacks générés automatiquement par les tests de réponse sont supprimés et donc pas affichés pour les participants. Les champs de feedback des branches ne sont pas concernés par ce réglage.';
$string['settingajaxvalidation_desc'] = 'Si ce réglage est activé, la saisie des participants est validée dès qu\'ils font une pause dans leur saisie. Cela donne une meilleure expérience utilisateur, mais va charger le serveur.';
$string['studentanswer'] = 'Réponse du participant';
$string['syntaxhint_help'] = 'L\'indice syntaxique sera affiché dans le champ de la réponse, s\'il est laissé vide par le participant.';
