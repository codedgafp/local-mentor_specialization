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
 * Plugin events and observers
 *
 * @package    local_mentor_specialization
 * @copyright  2021 Edunao SAS (contact@edunao.com)
 * @author     adrien <adrien@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$observers = [

        [
                'eventname' => '\core\event\role_assigned',
                'callback' => 'local_mentor_specialization_observer::assign_reflocalnonediteur',
        ],
        [
                'eventname' => '\core\event\role_unassigned',
                'callback' => 'local_mentor_specialization_observer::unassign_reflocalnonediteur',
        ],
        [
                'eventname' => '\core\event\user_deleted',
                'callback' => 'local_mentor_specialization_observer::delete_user',
        ],
        [
                'eventname' => '\core\event\role_assigned',
                'callback' => 'local_mentor_specialization_observer::sync_profile_role_assigned_ldap',
        ],

        [
                'eventname' => '\core\event\role_unassigned',
                'callback' => 'local_mentor_specialization_observer::sync_profile_role_unassigned_ldap',
        ],

        [
                'eventname' => '\core\event\user_loggedin',
                'callback' => 'local_mentor_specialization_observer::sync_profile_role_login_ldap',
                'priority' => 9999,
        ],

        [
                'eventname' => '\core\event\user_created',
                'callback' => 'local_mentor_specialization_observer::remove_required_user_info_data_if_empty',
        ],

        [
                'eventname' => '\core\event\user_updated',
                'callback' => 'local_mentor_specialization_observer::manager_change_user_entities_notification',
        ],
        [
                'eventname' => '\core\event\user_updated',
                'callback' => 'local_mentor_core_observer::sync_user_main_entity'
        ],

        [
                'eventname' => '\core\event\role_assigned',
                'callback' => 'local_mentor_specialization_observer::assign_visiteurbiblio',
        ],

        [
                'eventname' => '\core\event\role_unassigned',
                'callback' => 'local_mentor_specialization_observer::unassigned_visiteurbiblio',
        ],

        [
                'eventname' => '\core\event\role_assigned',
                'callback' => 'local_mentor_specialization_observer::enrol_session_send_mail',
        ],
        [
                'eventname'   => 'local_mentor_specialization\event\collections_form_submitted',
                'callback'    => 'local_mentor_specialization_observer::collections_form_submission_trigger'
        ]
];
