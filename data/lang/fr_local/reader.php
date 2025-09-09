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
 * Strings for component 'reader', language 'fr', version '3.9'.
 *
 * @package     reader
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['availablefrom_help'] = 'Les participants ne peuvent accéder à cette activité qu\'après la date et l\'heure spécifiées ici. Avant cette date et heure, il ne sera pas disponible.';
$string['availableuntil_help'] = 'Les participants ne peuvent accéder à cette activité que jusqu\'à la date et l\'heure spécifiées ici. Après cette date et heure, il ne sera plus disponible.';
$string['averagefailed_help'] = 'Le nombre moyen des tests de Reader échoué par participant';
$string['averagepointsallterms_help'] = 'Nombre moyen de points gagnés par chaque participant de ce groupe, en tenant compte de tous les points jamais gagnés par aucun d\'entre eux dans aucune activité de lecture sur ce site Moodle';
$string['averagepointsthisterm_help'] = 'Nombre moyen de points obtenus par chaque participant de ce groupe, en considérant uniquement les points obtenus dans cette activité de lecture pendant le trimestre en cours';
$string['averagetaken_help'] = 'Le nombre moyen de tests de Reader fait par participant';
$string['awardextrapoints'] = 'Attribuer des points supplémentaires aux participants sélectionnés';
$string['cheatedmessage_help'] = 'Ce message sera envoyé aux participants jugés par le module Reader comme ayant triché.';
$string['checkcheating_help'] = 'Ce paramètre spécifie si l\'adresse IP doit être vérifiée ou non lorsque les participants tentent des tests Reader.

**Éteint**
: Les adresses IP ne seront pas vérifiées

**Nulle part**
: Si deux participants lancent le même test à la même heure et que tous les deux réussissent, ils seront jugés par le module Reader comme ayant triché.

** Sur les ordinateurs adjacents **
Si deux participants lancent le même test à une heure similaire à partir d\'une adresse IP similaire et que les deux réussissent, ils seront jugés par le module Reader comme ayant triché.';
$string['clearedmessage_help'] = 'Ce message est envoyé aux participants qui ont été jugés par le module Lecteur comme ayant triché mais qui ont ensuite été effacés par l\'enseignant.';
$string['configmreadersettings'] = 'Ces paramètres permettent aux participants de ce site Moodle d\'accéder aux tests sur mReader.org
Pour obtenir un identifiant de site et une clé, vous devez être inscrit au cours suivant:
: https://www.moodlereader.com/moodle4reader/course/view.php?id=2';
$string['configmreadersitekey'] = 'La clé secrète permettant aux participants de ce site Moodle d\'accéder aux tests sur mReader.org';
$string['configmreaderurl'] = 'L\'URL sur laquelle les participants peuvent accéder aux tests sur mReader.org';
$string['countactive'] = 'Participants actifs';
$string['countactive_help'] = 'Le nombre de participants ayant répondu à au moins un test de Reader';
$string['countinactive'] = 'Participants inactifs';
$string['countinactive_help'] = 'Nombre de participants qui n\'ont pas répondu à des test de Reader';
$string['deleteallattempts_help'] = 'En règle générale, vous ne devez PAS supprimer les tentatives de tests Reader.

Vous ne devez supprimer les tentatives que si vous êtes absolument certain que les participants de ce cours ne répondront plus jamais aux tests Reader sur ce site Moodle.

En effet, en supprimant les tentatives de tests Reader, vous autorisez les participants à reprendre tous les tests Reader qu\'ils ont déjà effectués. Ce n’est PAS ainsi que le module Reader est censé fonctionner. Les participants ne devraient avoir qu\'une seule chance de répondre à un test Reader.

La suppression de tentatives de tests Reader remettra également à zéro les scores de lecture de tous les participants, ce qui n\'est probablement pas ce que vous, ou les participants, souhaitez.';
$string['deletemessages_help'] = 'Tous les messages qui apparaissent sur la page principale des participants pour les activités de Reader dans ce cours seront supprimés.';
$string['downloadmode_help'] = 'Cette page peut être dans les deux modes suivants:

**Ordinaire**
: En mode normal, seuls les livres dont les données n\'ont pas encore été téléchargées, ou ceux dont les données ont été mises à jour, seront disponibles. Les livres pour lesquels les données les plus récentes ont déjà été téléchargées ne seront pas disponibles.

**Réparation**
: En mode réparation, tous les livres sont disponibles au téléchargement. Si des données ont déjà été téléchargées, elles seront écrasées par les données récemment téléchargées. Utilisez ce mode si vous souhaitez réparer des tests défectueux ou des données incorrectes. Notez que même si les tests sont écrasés, les données relatives aux tentatives des participants pour ces tests seront conservées.';
$string['event_user_goal_set_description'] = 'L\'utilisateur portant l\'id « {$a->userid} » a défini un objectif de lecture du participant pour l\'activité « reader » avec l\'id de module de cours « {$a->cmid} »';
$string['event_user_level_set_description'] = 'L\'utilisateur avec l\'id « {$a->userid} » a défini un niveau de lecture du participant pour l\'activité « reader » avec l\'id du module de cours « {$a->cmid} »';
$string['event_user_level_set_explanation'] = 'Un utilisateur vient de définir le niveau de lecture d\'un participant dans une activité de Reader.';
$string['event_users_exported_description'] = 'L\'utilisateur avec l\'id « {$a->userid} » a exporté les données du participant pour l\'activité « reader » avec l\'id de module de cours « {$a->cmid} »';
$string['event_users_exported_explanation'] = 'Un utilisateur vient d\'exporter les données sur les participants d\'une activité Reader.';
$string['event_users_imported_description'] = 'L\'utilisateur portant l\'id « {$a->userid} » a importé des données de participant pour l\'activité « reader » avec l\'id de module de cours « {$a->cmid} »';
$string['event_users_imported_explanation'] = 'Un utilisateur vient d\'importer des données de participant dans une activité Reader.';
$string['exportstudentrecords'] = 'Exporter les dossiers des participants';
$string['fixmissingquizzesinfo'] = 'La mise à niveau a été suspendue afin que vous puissiez décider si vous souhaitez télécharger et installer les tests du module Reader qui manquent sur ce site Moodle.

Si vous sélectionnez « Oui », les tests manquants seront téléchargés et installés.

Si vous sélectionnez « Non », tous les livres Reader dont le test est manquant seront marqués comme ne contenant aucune donnée.

Notez que même si vous choisissez « Non », le nombre de mots pour chaque participant participant aux activités de Reader ne sera pas affecté par cette opération.

Souhaitez-vous télécharger et installer les tests manquants du module Reader pour les livres sur ce site Moodle ?';
$string['fullreportquiztoreader'] = 'Rapport complet par participant';
$string['ignoredate_help'] = 'La date du début du terme actuel.

Toute tentative de test Reader effectuée avant cette date ne sera pas incluse dans les totaux du rapport pour ce terme.

Cependant, les tentatives précédentes ne sont pas complètement ignorées. Ils seront inclus dans les totaux du rapport pour « Tous les termes ».

De plus, veuillez noter que les participants ne peuvent jamais repasser les tests Reader, y compris ceux qui avaient été rédigés dans des termes précédents, à moins que l\'enseignant supprime la tentative précédente.';
$string['importstudentrecord'] = 'Importer un dossier participant';
$string['levelcheck_help'] = '**Oui**
: Les participants ne seront autorisés à répondre aux tests Reader que pour des livres égaux ou proches de leur niveau de lecture actuel. Le nombre de test que les participants sont autorisés à poser est spécifié dans les paramètres de cette page pour « Tests au niveau actuel/précédent/suivant ».

**Non**
: Les participants seront toujours autorisés à répondre aux questions de Reader pour tous les niveaux de lecture.';
$string['maxquizattemptrate_help'] = 'Le taux maximum auquel les participants peuvent tenter des tests Reader. Si un élève essaie de tenter plus que le nombre spécifié de test pendant la durée spécifiée, l\'action spécifiée sera exécutée.';
$string['maxquizfailurerate_help'] = 'Le taux maximal auquel les participants peuvent échouer aux tests Reader. Si un participant échoue plus que le nombre spécifié de test dans la durée spécifiée, l\'action spécifiée sera exécutée.';
$string['minquizattemptrate_help'] = 'Le taux minimum auquel les participants peuvent tenter des tests Reader. Si un participant ne continue pas à tenter au moins le nombre spécifié de test pendant la durée spécifiée, l\'action spécifiée sera exécutée.';
$string['popup_help'] = 'Si « Oui » est sélectionné,

* Le test ne commencera que si le participant dispose d\'un navigateur Web compatible JavaScript.
* Le test apparaît dans une fenêtre contextuelle plein écran qui couvre toutes les autres fenêtres et ne comporte pas de commandes de navigation.
* Les participants ne sont pas autorisés, dans la mesure du possible, à utiliser des fonctions telles que copier et coller.';
$string['questionscores_help'] = 'Les scores maximum pour chaque question doivent-ils être montrés aux participants lorsqu\'ils tentent un test Reader?

**Oui**
: Affiche les scores maximum pour les questions dans les tests Reader.

**Non**
: Masquer les scores maximum pour les questions dans les tests Reader.';
$string['quizzesmustbeinstalled'] = 'Les tests doivent être installés dans un cours distinct du cours auquel les participants se connecteront lorsqu\'ils répondront à des tests. Ce cours est caché des participants et n’est utilisé que comme zone de stockage pour les tests; il s’appelle normalement «Tous les tests». Le cours que vous avez établi à cet effet devrait être indiqué ci-dessous. Si vous n\'avez pas encore établi de cours, veuillez cliquer sur « Créer un nouveau cours ».';
$string['rateaction_help'] = 'C\'est l\'action qui sera entreprise si la restriction du taux de lecture est violée. Les actions suivantes sont disponibles:

** Retarder les autres tentatives de test **
: le participant ne pourra pas tenter un autre tests Reader jusqu\'à la fin de la période.

** Bloquer d\'autres tentatives de test **
: le participant ne pourra plus tenter de tests Reader jusqu\'à ce qu\'un enseignant supprime le blocage.

** Envoyer un courriel au participant **
: Un courriel sera envoyé au participant pour l\'informer de la violation du taux.

** Envoyer un courriel à l\'enseignant **
: Un courriel sera envoyé à l\'enseignant pour l\'informer de la violation de taux du participant.';
$string['ratetype_help'] = 'Les types de taux de lecture suivants peuvent être spécifiés:

** Taux de tentative minimum du test **
: Le taux minimum auquel les participants peuvent tenter des tests Reader. Si un participant ne continue pas à tenter au moins le nombre spécifié de test pendant la durée spécifiée, l\'action spécifiée sera exécutée.

** Taux maximum de tentatives du test **
: Le taux maximum auquel les participants peuvent tenter des tests Reader. Si un participant essaie de tenter plus que le nombre spécifié de test pendant la durée spécifiée, l\'action spécifiée sera exécutée.

** Taux d\'échec maximum du test **
: Taux maximal auquel les participants peuvent échouer aux tests Reader. Si un participant échoue plus que le nombre spécifié de test dans la durée spécifiée, l\'action spécifiée sera exécutée.';
$string['readonlyfrom_help'] = 'Après cette date et cette heure, les participants peuvent afficher leur page principale de Reader, mais ils ne peuvent plus répondre à des tests via cette activité.';
$string['readonlyuntil_help'] = 'Avant cette date et cette heure, les participants peuvent consulter leur page principale Reader, mais ne peuvent répondre à aucun test via cette activité.';
$string['reportquiztoreader'] = 'Rapport de synthèse par participant';
$string['reportuserdetailed'] = 'Participants (complet)';
$string['reportusersummary'] = 'Participants (résumé)';
$string['returntostudentlist'] = 'Retour à la liste des participants';
$string['safebrowsernotice'] = 'Ce test a été configuré pour que les participants ne puissent le tenter qu\'avec Safe Exam Browser.';
$string['sendemailtostudent'] = 'Envoyer un courriel au participant';
$string['sendmessage'] = 'Envoyer un message aux participants sélectionnés';
$string['setallowpromotion'] = 'Modifier le paramètre de promotion pour les participants sélectionnés';
$string['setbookinstances'] = 'Sélectionnez des tests à mettre à la disposition des participants';
$string['setcurrentlevel'] = 'Changer le niveau actuel pour les participants sélectionnés';
$string['setgoals_description'] = 'Sur cette page, vous pouvez définir les objectifs de lecture pour les participants à des niveaux de lecture spécifiques ou dans des groupes spécifiques. Notez que les paramètres des participants individuels sur les pages du rapport remplaceront ceux de cette page.';
$string['setlevels_description'] = 'Sur cette page, vous pouvez définir les niveaux de lecture pour des groupes de participants. Notez que ces paramètres écraseront ceux des participants individuels sur les pages du rapport.';
$string['setrates_description'] = 'Sur cette page, vous pouvez définir les taux de lecture des participants à des niveaux de lecture spécifiques ou dans des groupes spécifiques.';
$string['setstartlevel'] = 'Changer le niveau de départ pour les participants sélectionnés';
$string['setstoplevel'] = 'Changer le niveau maximum pour les participants sélectionnés';
$string['showreviewlinks_help'] = '**Oui**
: Ajoutez des liens à partir des valeurs des pages de rapport de Reader vers des pages de révision de tests, illustrant exactement la réponse donnée à chaque question lors d’une tentative de test Reader.

**Non**
: N\'ajoutez PAS de liens à partir des valeurs des pages du rapport Reader aux pages de révision du quiz.

Ce paramètre concerne uniquement les enseignants. Cela affecte les participants car ils n\'ont pas accès aux pages de rapport de Reader.';
$string['stoplevel_help'] = 'Les participants ne peuvent pas être promus automatiquement au-delà de ce niveau';
$string['studentmanagement'] = 'Gestion des participants';
$string['studentslevels'] = 'Modifier les niveaux des participants, la politique de promotion et les objectifs';
$string['studentuserid'] = 'ID utilisateur du participant';
$string['studentusername'] = 'Nom d\'utilisateur du participant';
$string['studentview'] = 'Vue des participants';
$string['targetcourse_help'] = 'Sélectionnez le cours dans lequel vous souhaitez télécharger les tests pour les livres sélectionnés. Habituellement, vous devriez télécharger un cours caché utilisé uniquement pour stocker des tests utilisés par le module Reader.

Sélectionnez le type de cours parmi l’une des options suivantes:

**Tout**
: Choisissez parmi une liste de tous les cours sur ce site Moodle.

**Caché**
: Faites votre choix parmi une liste de cours visibles pour vous mais cachés aux participants. Habituellement, vous devriez choisir cette option.

**Visible**
: Choisissez parmi une liste de cours visibles pour vous et les participants inscrits.

**Actuel**
: Des tests reader seront téléchargés dans le cours actuel.

**Nouveau**
: Les tests Reader seront téléchargés dans un nouveau cours. Entrez un nom pour le nouveau cours dans la zone de texte.';
$string['thisblockunavailable'] = 'Ce bloc est actuellement indisponible pour cet participant';
$string['thislevel_help'] = 'Nombre de test au niveau de lecture actuel qu\'un participant doit réussir pour pouvoir passer au niveau de lecture suivant. Notez que seuls les tests passés depuis la dernière promotion comptent pour la promotion suivante.';
$string['totalpointsgoal_help'] = 'Le nombre total de mots/points que les participants sont supposés accumuler dans le terme actuel';
$string['usecourse_help'] = 'Un cours sur ce site Moodle contenant les tests Reader sur cette activité Reader. Ce cours devrait être caché aux participants. Il contient généralement des tests qui ont été téléchargés par le module Reader à partir d\'un référentiel de test Reader externe, par exemple moodlereader.net.';
