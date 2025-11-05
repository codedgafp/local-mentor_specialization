<?php

namespace local_mentor_specialization\utils;

defined('MOODLE_INTERNAL') || die();

class mentor_specialization_service
{
    /**
     * Define a new state for a plugin
     * 
     * @param string $plugin Plugin name ('editor_tiny', 'mod_etherpadlite', ...)
     * @param int $state 0 for disable; 1 for enable
     * @return void
     */
    public static function update_plugin_state(string $plugin, int $state): void
    {
        $plugininfo = \core_plugin_manager::instance()->get_plugin_info($plugin);

        if ($plugininfo) {
            [$plugintype, $pluginname] = explode('_', \core_component::normalize_componentname('editor_tiny'), 2);

            $manager = \core_plugin_manager::resolve_plugininfo_class($plugintype);
            $displayname = get_string('pluginname', $plugin);

            if ($manager::enable_plugin($pluginname, $state)) {
                $pluginstate = $state ? 'plugin_enabled' : 'plugin_disabled';
                echo get_string($pluginstate, 'core_admin', $displayname);
            }
        }
    }
}
