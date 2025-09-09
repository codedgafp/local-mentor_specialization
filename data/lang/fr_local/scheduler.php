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
 * Strings for component 'scheduler', language 'fr', version '3.9'.
 *
 * @package     scheduler
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addappointment'] = 'Ajouter un autre participant';
$string['addstudenttogroup'] = 'Ajouter un participant au groupe';
$string['appointmentmode_help'] = '<p>Vous pouvez choisir différentes méthodes de prise de rendez-vous. </p>
<p><ul>
<li><strong>« <emph>n</emph> rendez-vous » :</strong> le participant peut choisir autant de rendez-vous qu\'il souhaite, dans la limite du nombre de rendez-vous défini dans l\'activité. Même si l\'enseignant les marque comme « vu », le participant ne sera pas autorisé à choisir un autre rendez-vous. La seule manière de redonner la possibilité au participant de choisir un autre rendez-vous est de supprimer l\'ancien rendez-vous.</li>
<li><strong>« <emph>n</emph> rendez-vous à la fois » :</strong> le participant peut choisir parmi un nombre limité de rendez-vous. Une fois le rendez-vous passé et que l\'enseignant a noté comme ayant « vu » le participant, le participant peut alors choisir un autre rendez-vous. Cependant le participant est limité aux <emph>n</emph> créneaux disponibles (non vu) restants.
</li>
</ul>
</p>';
$string['appointmentnote'] = 'Commentaire d\'entretien (visible pour le participant)';
$string['appointsomeone'] = 'Ajouter un participant';
$string['attendable'] = 'Participants potentiels';
$string['attendablelbl'] = 'Nombre de participants total pouvant être reçus';
$string['attended'] = 'Participants reçus';
$string['attendedlbl'] = 'Nombre de participants total ayant été reçus';
$string['bookingformoptions'] = 'Formulaire de réservation et données fournies par le participant';
$string['bookinginstructions_help'] = 'Ce texte sera affiché aux participants avant de faire une réservation. Il peut, par exemple, indiquer aux participants comment remplir le champ de message facultatif ou les fichiers à télécharger.';
$string['contentformat_help'] = '<p>Il y a trois choix de base pour le format d\'exportation, présentant de façons différentes la manipulation des créneaux de plusieurs rendez-vous.
     <dl>
          <dt>Une ligne par créneau</ dt> :
          <dd>
Le fichier de sortie contient une ligne pour chaque créneau. Si un créneau contient plusieurs
rendez-vous, un marqueur « (multiple) » sera affiché à la place du nom du participant, etc.
         </dd>
          <dt> Une ligne par rendez-vous</dt> :
          <dd>
Le fichier de sortie contient une ligne pour chaque rendez-vous. Si un créneau contient plusieurs
rendez-vous, alors il apparaît plusieurs fois dans la liste (avec ses données répétées).
          </dd>
          <dt>Nominations regroupées par emplacement</dt> :
          <dd>
Tous les rendez-vous d\'un créneau sont regroupés, précédés par une ligne d\'en-tête
indiquant l\'emplacement en question. Cela peut ne pas bien fonctionner avec le format de fichier de sortie CSV, comme le nombre de colonnes non constant.
          </dd>
     </dl>
Vous pouvez vérifier l\'effet de ces options en utilisant le bouton « Prévisualisation ». </ P>';
$string['displayfrom'] = 'Afficher les créneaux de rendez-vous aux participants à partir de';
$string['email_applied_html'] = '<p>Un rendez-vous a été choisi le {$a->date} à {$a->time},<br/>
par le participant <a href="{$a->attendee_url}">{$a->attendee}</a> pour le cours :

<p>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></p>

<p>dans le planning intitulé « <em><a href="{$a->scheduler_url}">{$a->module}</a></em> » sur le site : <a href="{$a->site_url}">{$a->site}</a>.</p>';
$string['email_applied_plain'] = 'Un rendez-vous a été pris le {$a->date} à {$a->time},
par le participant {$a->attendee} pour le cours :

{$a->course_short}: {$a->course}

dans le planning intitulé « {$a->module} » sur le site : {$a->site}.';
$string['email_cancelled_html'] = '<p>Votre rendez-vous le <strong>{$a->date}</strong> à <strong>{$a->time}</strong>,<br/>
avec le participant <strong><a href="{$a->attendee_url}">{$a->attendee}</a></strong> pour le cours :</p>

<p><strong>{$a->course_short} : <a href="{$a->course_url}">{$a->course}</a></strong></p>

<p>dans le planning intitulé « <em><a href="{$a->scheduler_url}">{$a->module}</a>}</em> » sur le site : <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span class="error">a été annulé ou déplacé</span></strong>.</p>';
$string['email_cancelled_plain'] = 'Votre rendez-vous du {$a->date} à {$a->time},
avec le participant {$a->attendee} pour le cours&nbsp;:

{$a->course_short}&nbsp;: {$a->course}

dans le planning de «&nbsp;{$a->module}&nbsp;» sur le site&nbsp;: {$a->site}

a été annulé ou déplacé.';
$string['email_cancelled_subject'] = '{$a->course_short}: Rendez-vous annulé ou déplacé par un participant';
$string['exclusivity_help'] = '<p>Vous pouvez fixer un nombre de places limité pour un créneau horaire donné.</p>
<p>Fixer la limite à 1 (par défaut) limitera le créneau à un seul participant.</p>
<p>Fixer une limite par ex. à 3 autorisera 3 participants à réserver ce créneau.</p>
<p>Si cette option est désactivée, un nombre illimité de participants pourront réserver le créneau ; il ne sera jamais considéré comme « complet ».</p>';
$string['exclusivityoverload'] = 'Le créneau possède {$a} participants inscrits, ce qui est plus que la valeur permise par ce paramètre.';
$string['exclusivitypositive'] = 'Le nombre de participants par créneau doit être de 1 ou plus.';
$string['field-appointmentnote'] = 'Commentaire sur l\'entretien (pour le participant)';
$string['field-maxstudents'] = 'Participants max.';
$string['field-studentemail'] = 'Adresse courriel du participant';
$string['field-studentfirstname'] = 'Prénom du participant';
$string['field-studentfullname'] = 'Nom complet du participant';
$string['field-studentidnumber'] = 'Numéro d\'identification du participant';
$string['field-studentlastname'] = 'Nom de famille du participant';
$string['field-studentnote'] = 'Message par participant';
$string['field-studentusername'] = 'Nom d\'usager du participant';
$string['gradingstrategy_help'] = 'Dans un planning où les participants peuvent avoir plusieurs entretiens, choisissez comment la notation doit être affichée.<br/> Le carnet de notes peut afficher soit <ul><li>la note moyenne ou</li><li>la note maximale</li></ul> que le participant a reçue.';
$string['groupbookings_help'] = 'Permettre aux élèves de réserver un créneau pour tous les membres de leur groupe.
(Notez que ceci est différent du réglage « mode de groupe », qui contrôle la visibilité d\'un créneau par un participant.)';
$string['groupmodeyourgroups'] = 'Mode de groupe : {$a->groupmode}. Seuls les participants de {$a->grouplist} peuvent prendre rendez-vous avec vous.';
$string['groupmodeyourgroupsempty'] = 'Mode de groupe : {$a->groupmode}. Vous n\'êtes pas membre d\'un groupe, donc les participants ne peuvent prendre rendez-vous avec vous.';
$string['guardtime_help'] = 'Le délai d\'annulation empêche le participant de changer son créneau horaire peu avant le début de son rendez-vous.
<p>Si le délai d\'annulation est activé et défini, par exemple, à 2 heures, alors le participant ne pourra plus modifier son rendez-vous 2 heures avant le début de celui-ci.</p>';
$string['howtoaddstudents'] = 'Pour ajouter des participants à un planificateur global, utilisez le réglage des rôles du module.<br/>Vous pouvez également définir par les rôles les personnes qui pourront accueillir vos participants.';
$string['ignoreconflicts_help'] = 'Si cette case est cochée, alors le créneau sera déplacé à la date et l\'heure demandées, même si d\'autres créneaux existent au même moment.
Cela peut provoquer des chevauchements d\'entretiens pour certains enseignants ou participants, et doit donc être utilisé avec précaution.';
$string['markseen'] = 'Après le rendez-vous avec un participant, veuillez le marquer comme « Vu » en cochant la case adéquate dans le tableau ci-dessus.';
$string['maxstudentlistsize'] = 'Taille maximum de la liste des participants';
$string['maxstudentlistsize_desc'] = 'La taille maximum de la liste de participants qui doivent prendre un rendez-vous, affichée dans la vue Enseignant. S\'il y a plus de participants que cela, aucune liste ne sera affichée.';
$string['maxstudentsperslot'] = 'Nombre maximum de participants par créneau';
$string['maxstudentsperslot_desc'] = 'Les créneaux de groupes / les groupes non-exclusif peuvent contenir au plus ce nombre de participant. Notez, en outre, que le paramètre « illimité » peut toujours être défini pour un créneau en particulier.';
$string['missingstudents'] = '{$a} participant(s) doi(ven)t encore prendre rendez-vous';
$string['missingstudentsmany'] = '{$a} participant(s) doi(ven)t encore prendre rendez-vous. La liste n\'est pas affichée à cause de sa taille trop importante.';
$string['modeintro'] = 'Les participants peuvent enregistrer';
$string['modulename_help'] = 'L\'activité rendez-vous vous aide à planifier vos rendez-vous avec vos participants.

Les enseignants définissent des créneaux horaires, puis les participants en choisissent un sur Moodle. À leur tour, les enseignants peuvent exporter la liste des rendez-vous et optionnellement définir une note.

Les rendez-vous par groupe est disponible ; chaque créneau horaire peut accueillir plusieurs participants, et éventuellement il est possible de prendre rendez-vous pour des groupes entiers en même temps.';
$string['noexistingstudents'] = 'Aucun participant disponible pour la prise de rendez-vous';
$string['nostudents'] = 'Aucun participant prévu';
$string['nostudenttobook'] = 'Aucun participant à planifier';
$string['notifications_help'] = 'Lorsque cette option est cochée, les enseignants et les participants reçoivent des notifications lorsque des rendez-vous sont pris ou annulés.';
$string['oneappointmentonly'] = 'Un seul rendez-vous par participant';
$string['oneatatime'] = 'Un rendez-vous à la fois par participant';
$string['privacy:metadata:scheduler_appointment'] = 'Représente un rendez-vous de participant dans un planning';
$string['privacy:metadata:scheduler_appointment:studentid'] = 'le participant qui a pris le rendez-vous';
$string['privacy:metadata:scheduler_appointment:studentnote'] = 'Annotation par participant';
$string['privacy:metadata:scheduler_appointment:studentnoteformat'] = 'Format de l\'annotation du participant';
$string['privacy:metadata:scheduler_slots:exclusivity'] = 'Nombre maximum de participants sur le créneau';
$string['reuseguardtime_help'] = '<p>Ce paramètre définit le temps de garde pour conserver les plages horaires incertaines.</p>
<p>Les plages horaires considérées comme incertaines (non réutilisables) seront automatiquement supprimées lorsqu’un ou une participante changera son rendez-vous, libérant ainsi la plage horaire en entier, ou qu’un enseignant ou une enseignante y annulera tous les rendez-vous. La suppression se produit lorsque la plage horaire commence trop près de la date actuelle.</p>
<p>Le paramètre définit le délai «&nbsp;dès maintenant&nbsp;», pour lequel une plage horaire sera supprimée et rendue inaccessible pour d’éventuels rendez-vous.</p>';
$string['revealteachernotes_desc'] = 'Si cette option est sélectionnée, alors les annotations confidentielles de l\'enseignant (qui ne sont normalement pas visibles par les participants)
seront révélées aux participants dans les demandes d\'exportation de données, c\'est-à-dire via l\'API privay. Vous devez décider en fonction de l\'utilisation individuelle de ce champ
si elle doit être incluse dans les exportations de données sur les participants dans le cadre du RGPD.';
$string['scheduler:editallattended'] = 'Marquez les participants dans tous les rendez-vous comme étant présents / non présents.';
$string['scheduler:seeotherstudentsbooking'] = 'Voir les autres participants ayant réservés sur ce créneau';
$string['scheduler:seeotherstudentsresults'] = 'Voir les résultats des autres participants du créneau';
$string['scheduler:viewfullslots'] = 'Afficher les créneaux même s\'ils ne peuvent plus être choisis (vue participant)';
$string['scheduler:viewslots'] = 'Afficher les créneaux qui peuvent encore être choisis (vue participant)';
$string['schedulestudents'] = 'Planifier par participant';
$string['showemailplain_desc'] = 'Dans la vue enseignant du planning, afficher les adresses e-mails des participants voulant un entretien de façon textuelle, en plus des liens « mailto: ».';
$string['slot_is_just_in_use'] = 'Désolé, ce créneau vient juste d\'être choisi par un autre participant ! Veuillez réessayer.';
$string['staffrolename_help'] = 'L’étiquette pour la personne qui assiste les participantes et participants. Il ne s’agit pas nécessairement d’un « enseignant ».';
$string['student'] = 'Participant';
$string['studentbreakdown'] = 'Par participant';
$string['studentcomments'] = 'Message du participant';
$string['studentdetails'] = 'Détail du participant';
$string['studentmultiselect'] = 'Chaque participant ne peut être sélectionné qu\'une seule fois dans ce créneau';
$string['studentnote'] = 'Message par participant';
$string['students'] = 'Participants';
$string['tab-otherappointments'] = 'Tous les rendez-vous de cet participant';
$string['tab-otherstudents'] = 'Tous les participants dans ce créneau';
$string['uploadmaxfiles_help'] = 'Le nombre maximum de fichiers qu\'un participant peut téléverser dans le formulaire de réservation. Le téléchargement de fichier est facultatif sauf si la case « Fichier à téléverser requis » est cochée. Si cette option est définie sur 0, les participants ne verront pas la boîte de téléchargement de fichier.';
$string['uploadmaxfilesglobal_desc'] = 'Le nombre maximum de fichiers qu\'un participant peut téléverser dans un formulaire de réservation. Cela peut être réduit davantage au niveau des rendez-vous individuels.';
$string['uploadmaxsize_help'] = 'Taille maximale du fichier pour les téléversements par les participants. Cette limite s\'applique par fichier.';
$string['usebookingform_help'] = 'Si activé, le participant visualise un écran de réservation séparé avant de pouvoir réserver un créneau. L\'écran de réservation peut lui demander de saisir des données, de téléverser des fichiers ou de saisir un captcha (voir les options ci-dessous).';
$string['usecaptcha_help'] = 'Si activé, les participants devront résoudre une question de sécurité CAPTCHA avant de procéder à une nouvelle réservation.
Utilisez ce paramètre si vous pensez que les participants utilisent des programmes automatisés pour bloquer les emplacements disponibles.
<p> Aucun captcha ne sera affiché si le participant modifie une réservation existante. </p>';
$string['usenotesstudent'] = 'Annotation d\'entretien, visible pour l\'enseignant et le participant';
$string['usestudentnotes'] = 'Autoriser le participant à écrire un message';
$string['usestudentnotes_help'] = 'Si activé, l\'écran de réservation contiendra une zone de texte dans laquelle les participants peuvent écrire un message. Utilisez les « instructions de réservation » ci-dessus pour informer les participants de l\'information qu\'ils devraient fournir.';
$string['yesoptional'] = 'Oui, facultatif pour le participant';
$string['yesrequired'] = 'Oui, le participant doit écrire un message';
