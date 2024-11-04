<?php
defined('MOODLE_INTERNAL') || die();

// Ajoute atto_fullscreen à la config editor_atto

$editorattocurrentvalue = get_config('editor_atto', 'toolbar');

$editorattonewvalue = "$editorattocurrentvalue\nfullscreen = fullscreen";

local_mentor_core_set_moodle_config('toolbar', $editorattonewvalue, 'editor_atto');