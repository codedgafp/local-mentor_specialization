<?php

defined('MOODLE_INTERNAL') || die();

global $CFG;

// New "about" url
set_theme_mentor_config(
    'about',
    "$CFG->wwwroot/fr/en-savoir-plus"
);

// New "help" url
set_theme_mentor_config(
    'faq',
    "$CFG->wwwroot/fr/aide"
);

function set_theme_mentor_config(string $name, string $url): void
{
    mtrace('Set config ' . $name . ' to ' . $url);

    set_config(
        $name,
        $url,
        'theme_mentor'
    );
}