<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local language pack from http://dgafp.local
 *
 * @package    mod
 * @subpackage customcert
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['customcert:view'] = 'Afficher l\'attestation';
$string['getcustomcert'] = 'Afficher l\'attestation';
$string['emailstudentbody'] = '<p>Veuillez trouver ci-joint une attestation de participation pour la formation Mentor « {$a->coursefullname} ».</p><p>Bravo pour votre engagement, <br>A très vite sur Mentor !</p><p>Note : Vous pouvez retrouver l\'ensemble de vos attestations de participation sur <a href="https://mentor.gouv.fr/mod/customcert/my_certificates.php">cette page</a>.</p>';
$string['emailstudentbodyplaintext'] = '<p>Veuillez trouver ci-joint une attestation de participation pour la formation Mentor « {$a->coursefullname} ».</p><p>Bravo pour votre engagement, <br>A très vite sur Mentor !</p><p>Note : Vous pouvez retrouver l\'ensemble de vos attestations de participation sur cette page : https://mentor.gouv.fr/mod/customcert/my_certificates.php</p>';
$string['emailstudentcertificatelinktext'] = 'Visualiser l\'attestation en ligne';
$string['emailstudentgreeting'] = 'Bonjour {$a},';
$string['emailstudentsubject'] = 'Votre attestation de participation Mentor pour la formation « {$a->coursefullname} »';
$string['mycertificates'] = 'Mes attestations de participation';
$string['mycertificatesdescription'] = 'Vous trouverez ici les attestations qui vous ont été délivrées par courriel ou que vous avez téléchargées.';
$string['downloadallissuedcertificates'] = 'Télécharger toutes les attestations émises';
$string['emailnonstudentbody'] = '<p>Vous recevez ce message car vous êtes référent dans la formation Mentor « {$a->coursefullname} ».<br>Veuillez trouver ci-joint l\'attestation de participant de « {$a->userfullname} ».</p><p>Note : Si vous ne souhaitez pas recevoir les attestations individuelles de cette session, il convient de modifier les paramètres de l\'attestation dans la session.</p>';
$string['emailnonstudentbodyplaintext'] = '<p>Vous recevez ce message car vous êtes référent dans la formation Mentor « {$a->coursefullname} ».<br>Veuillez trouver ci-joint l\'attestation de participant de « {$a->userfullname} ».</p><p>Note : Si vous ne souhaitez pas recevoir les attestations individuelles de cette session, il convient de modifier les paramètres de l\'attestation dans la session.</p>';
$string['emailnonstudentcertificatelinktext'] = 'Visualiser le rapport des attestations de cette session.';
$string['emailnonstudentgreeting'] = 'Bonjour,';
$string['emailnonstudentsubject'] = 'Une attestation de participation a été obtenue dans la formation Mentor « {$a->coursefullname} »';
