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
 * Strings for component 'hotpot', language 'fr', version '3.9'.
 *
 * @package     hotpot
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowpaste_help'] = 'Si ce paramètre est activé, les participants seront autorisés à copier, coller et faire glisser du texte dans la boîte à texte.';
$string['allowreview_help'] = 'Si activé, les participants pourront relire leurs tentatives après la fermeture du test.';
$string['attemptlimit_help'] = 'Nombre maximum de tentatives auquel à droit un participant dans cette activité HotPotatoes';
$string['delay3_help'] = 'Ce paramètre définit le délai entre la fin du test et le retour à Moodle.

** Utiliser un temps défini (en secondes) **
: Le retour à Moodle aura lieu après le temps spécifié en secondes.

** Utiliser les paramètres du fichier source/modèle **
: Le retour à Moodle aura lieu après le temps spécifié en secondes au sein du fichier source.

** Attendre que le participant clique sur OK **
: Le retour à Moodle aura lieu après que participant a cliqué sur le bouton OK du message de fin du test.

** Ne pas continuer automatiquement **
: Le retour à Moodle ne sera pas automatique. Le participant pourra aller où bon lui semble.

Dans tous les cas, le résultat du test est envoyé immédiatement après la fin du test ou à l\'abandon du test, indépendamment de ce paramètre.';
$string['modulename_help'] = 'Le module HotPot permet aux enseignants de distribuer du matériel d\'apprentissage interactif à leurs participants via Moodle et afficher des rapports sur les réponses et les résultats des élèves.

Une activité HotPot unique se compose d\'une page d\'entrée optionnelle, un seul exercice, et une page de sortie optionnelle. L\'exercice peut être une page Web statique ou une page Web interactive qui offre aux élèves du contenu texte, audio et visuels et enregistre leurs réponses. L\'exercice est créé sur ordinateur en utilisant le logiciel de création de l\'enseignant, puis téléchargé sur Moodle.

Une activité HotPot peut gérer les exercices créés avec les logiciels de création qui suivent :

* Hot Potatoes (version 6)
* Qedoc
* Xerte
* iSpring
* Un éditeur HTML';
$string['stopbutton_help'] = 'Si ce paramètre est activé, un bouton stop est ajouté au test.

Si le participant clique sur le bouton stop, le résultat obtenu jusqu\'ici sera envoyé à Moodle et la tentative de test sera considérée comme abandonnée.

Le texte affiché sur le bouton stop peut être issu du paquetage de langue Moodle ou définie par l\'enseignant pour créer son propre bouton stop.';
