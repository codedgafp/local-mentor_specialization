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
 * Strings for component 'activequiz', language 'fr', version '3.9'.
 *
 * @package     activequiz
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activequiz:seeresponses'] = 'Afficher les autres réponses des participants pour les noter';
$string['activequiz:viewownattempts'] = 'Autoriser les participants à voir leur propres tentatives à un Active Quiz.';
$string['anonymousresponses'] = 'Rendre anonymes les réponses des participants';
$string['anonymousresponses_help'] = 'Rendre anonymes les réponses des participants dans la vue de l\'enseignant, de sorte que les noms des participants ou des groupes ne soient pas affichés';
$string['groupattendance_help'] = 'Si cette case est cochée, le participant rejoignant le Active Quiz peut choisir avec quels participants du groupe il exécute sa tentative.';
$string['grouping_help'] = 'Sélectionnez le groupe que vous souhaitez utiliser pour regrouper les participants';
$string['instructorquizinst'] = '<p>Merci d\'attendre que les participants se connectent.< /br>
Une fois que vous cliquez sur « Démarrer le Active Quiz », le Active Quiz lancera la première question.</p>
    <p>
<p>Contrôles :</p>
    <ul>
        <li>
            Poser à nouveau cette question
            <ul>
                <li>
                    Permet à l\'enseignant de poser à nouveau la même question (disponible durant la relecture d\'une question).
                </li>
            </ul>
        </li>
        <li>
            Question suivante
            <ul>
                <li>
                    Passer à la question suivante (disponible durant la relecture d\'une question).
                </li>
            </ul>
        </li>
        <li>
            Terminer la question
            <ul>
                <li>
                    Termine la question actuelle. Permet aussi à l\'enseignant d\'arrêter une question minutée plus tôt (disponible tant que la question est en cours). <i>Si la question n\'a pas de limite de temps, l\'enseignant devra cliquer sur « Terminer la question »</i>
                </li>
            </ul>
        </li>
        <li>
            Aller à la question
            <ul>
                <li>
                    Ouvre une boite de dialogue pour permettre de sélectionner la question dans la liste de toutes les question du Active Quiz de destination (disponible durant la relecture d\'une question).
                </li>
            </ul>
        </li>
        <li>
            Fermer la session
            <ul>
                <li>
                    Ferme la session actuelle, ainsi que toutes les tentatives des participants. Cela entrainera automatiquement la notation des tentatives. (disponible tout le temps).
                </li>
            </ul>
        </li>
        <li>
            Recharger les résultats
            <ul>
                <li>
                    Recharge l\'état des réponses des participants dans la zone d\'information. Permet à l\'enseignant de voir combien de participants ou de groupes ont répondus et combien doivent encore le faire (disponible durant la relecture d\'une question).
                </li>
            </ul>
        </li>
        <li>
            Voir / cacher les « non répondus »
            <ul>
                <li>
                    Affiche ou cache la zone d\'information qui indique combien de participants ou de groupes ont répondus et combien doivent encore le faire (disponible durant l\'interrogation).
                </li>
            </ul>
        </li>
        <li>
            Montrer la réponse juste
            <ul>
                <li>
                    Affiche pour l\'enseignant une vue avec la question ainsi que la réponse correcte sélectionnée (disponible durant la relecture d\'une question). N\'affichera pas la réponse correctes pour des questions de typr notées manuellement, essais ou graphiques.
                </li>
            </ul>
        </li>
    </ul>
</p>';
$string['invalidgroupid'] = 'Un identifiant de groupe valide est requis pour les participants';
$string['modulename_help'] = '<p>Active Quiz permet à un enseignant de créer et animer un test en temps réel. Toutes les questions courantes de l\'activité « Test » peuvent être utilisées dans un Active Quiz.
</p>
<p>Active Quiz permet une participation individuelle ou en groupe. Dans le cas d\'une participation en groupe, la note sera appliquée uniquement à tous les participants du groupe durant la session.
Les questions peuvent être paramétrées pour autoriser plusieurs essais.
Une limite de temps peut être indiquée pour automatiquement clore la question, mais l\'enseignant peut aussi décider d\'arrêter lui même la question et de passer à la suivante.
Il a aussi la possibilité de passer d\'une question à une autre durant une session.
Enfin, il peut superviser la participation des participants ou des groupes, les réponses des participants en temps réel, et les questions déjà posées.
</p>
<p>
Chaque tentative est évaluée automatiquement comme l\'activité « Test » (à l\'exception des questions de type essais ou PoodLL) et la note est inscrite dans le carnet de notes.
La notation pour les participations en groupe peut être automatiquement répercutée du participant meneur à tous les autres membres.
</p>

<p>
L\'enseignant a la possibilité d\'afficher des conseils, donner des commentaires et montrer les réponses correctes aux participants à l’achèvement du test.</p>

<p>Active Quiz peut être utilisé comme outil pour mener des travaux de groupes au sein de Moodle.</p>';
$string['numberoftries_help'] = 'Nombre de fois qu\'un participant peut répondre à la question. Il sera tout de même toujours limité par la durée de la question.';
$string['showhistoryduringquiz_help'] = 'Afficher l\'historique des réponses du participant ou du groupe durant la relecture d\'une question pendant le Active Quiz.';
$string['teacherstartinstruct'] = 'Utiliser cette page pour démarrer la session et que les participants puissent la rejoindre.<br />
Utiliser la zone de texte pour donner un nom à la session (cela pourra vous aider à la relecture ultérieure des résultats).';
$string['theattempt_help'] = 'le participant peut relire toute la tentative.';
$string['waitstudent'] = 'En attente de la connexion des participants';
$string['workedingroups_help'] = 'Cochez cette case pour indiquer aux participants qu\'ils travailleront en groupe. Assurez vous de sélectionner un groupement ci-dessous.';
