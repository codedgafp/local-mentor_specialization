<?php

defined('MOODLE_INTERNAL') || die();

global $CFG, $DB;

$systemcontext = context_system::instance();

foreach(glob("$CFG->dirroot/local/mentor_specialization/data/roles/*.xml") as $filedest) {
    $rolename = basename($filedest, ".xml");

    if (!$role = $DB->get_record('role', ['shortname' => $rolename], 'id'))
        continue;

    $xml = file_get_contents($filedest);
    $xmlparse = core_role_preset::parse_preset($xml);

    $_GET['shortname']      = $xmlparse['shortname'];
    $_GET['name']           = $xmlparse['name'];
    $_GET['description']    = $xmlparse['description'];
    $_GET['permissions']    = $xmlparse['permissions'];
    $_GET['archetype']      = $xmlparse['archetype'];
    $_GET['contextlevels']  = $xmlparse['contextlevels'];
    $_GET['allowassign']    = array_filter($xmlparse['allowassign'], fn($id) => $id !== -1);
    $_GET['allowoverride']  = array_filter($xmlparse['allowoverride'], fn($id) => $id !== -1);
    $_GET['allowswitch']    = array_filter($xmlparse['allowswitch'], fn($id) => $id !== -1);
    $_GET['allowview']      = array_filter($xmlparse['allowview'], fn($id) => $id !== -1);

    $definitiontable = new core_role_define_role_table_basic($systemcontext, $role->id);

    $definitiontable->read_submitted_permissions();

    if ($definitiontable->is_submission_valid()) {
        $definitiontable->save_changes();
    }
}
