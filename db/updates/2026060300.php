<?php

defined('MOODLE_INTERNAL') || die();

global $CFG, $DB;

$systemcontext = context_system::instance();
$transaction = $DB->start_delegated_transaction();
$errors = [];

foreach(glob("$CFG->dirroot/local/mentor_specialization/data/roles/*.xml") as $filedest) {
    $rolename = basename($filedest, ".xml");

    if (!$role = $DB->get_record('role', ['shortname' => $rolename], 'id'))
        continue;

    $xml = file_get_contents($filedest);
    if ($xml === false) {
        $errors[] = "Impossible de lire le fichier : $filedest";
        continue;
    }

    $xmlparse = core_role_preset::parse_preset($xml);

    try {
        $DB->delete_records('role_capabilities', ['roleid' => $role->id, 'contextid' => $systemcontext->id]);

        foreach ($xmlparse['permissions'] as $capability => $permission) {
            if ($permission == CAP_INHERIT) continue;

            if (!get_capability_info($capability)) {
                continue;
            }

            assign_capability($capability, $permission, $role->id, $systemcontext->id, true);
        }

        $DB->delete_records('role_context_levels', ['roleid' => $role->id]);

        foreach ($xmlparse['contextlevels'] as $level) {
            $DB->insert_record('role_context_levels', (object)[
                'roleid'       => $role->id,
                'contextlevel' => $level,
            ]);
        }

        $systemcontext->mark_dirty();

        echo "Rôle '{$rolename}' mis à jour avec succès.\n";
    } catch (\dml_exception $e) {
        $errors[] = $e;
        echo "Erreur sur le rôle '{$rolename}' : " . $e->getMessage() . "\n";
    }
}

if (empty($errors)) {
    $transaction->allow_commit();
} else {
    $transaction->rollBack(new \Exception('Errors, rollback.'));
}
