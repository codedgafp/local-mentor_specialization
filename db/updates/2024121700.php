<?php
defined('MOODLE_INTERNAL') || die();

global $DB;
$dbman = $DB->get_manager();

// Add last update date field
$trainingtable = new xmldb_table('training');
$lastupdatefield = new xmldb_field('lastupdate', XMLDB_TYPE_INTEGER, '10', null, null, null);
if($dbman->table_exists($trainingtable) && !$dbman->field_exists($trainingtable, $lastupdatefield) ) {
    $dbman->add_field($trainingtable, $lastupdatefield);
}
