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
 * Strings for component 'enrol_authorize', language 'fr', version '3.9'.
 *
 * @package     enrol_authorize
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminneworder'] = 'Cher administrateur,

Vous avez reçu une nouvelle commande en attente :

    No de commande : {$a->orderid}
    No de transaction : {$a->transid}
    Utilisateur : {$a->user}
    Cours : {$a->course}
    Montant : {$a->amount}

    SAISIE PROGRAMMÉE ACTIVE ? {$a->acstatus}

Si la saisie programmée est activée, il est prévu que les infos de carte de
crédit seront saisies le {$a->captureon} et que le participant sera inscrit au
cours. Dans le cas contraire, ces données arriveront à échéance le
{$a->expireon} et ne pourront plus être saisies après cette date.

Vous pouvez aussi accepter ou refuser le paiement afin d\'inscrire
immédiatement le participant en cliquant sur le lien ci-dessous.
{$a->url}';
$string['captureyes'] = 'Les données de la carte de crédit vont être saisies et le participant sera inscrit au cours. Voulez-vous continuer ?';
$string['pendingecheckemail'] = 'Cher administrateur,

Il y a actuellement {$a->count} eChecks en attente. Vous devez déposer un fichier CSV afin d\'inscrire les participants.

Veuillez cliquer sur le lien ci-dessous et lire le fichier d\'aide sur la page affichée :
{$a->url}';
$string['unenrolstudent'] = 'Désinscrire le participant ?';
