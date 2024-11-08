<?php
namespace local_mentor_specialization\event;

defined('MOODLE_INTERNAL') || die();

class collections_form_submitted extends \core\event\base {
    protected function init() {
        $this->data['objecttable'] = 'local_mentor_specialization';
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_TEACHING;
    }

    public static function get_name() {
        return 'collections_form_submitted';
    }

    public function get_description() {
        return "The user with id '{$this->userid}' submitted the mentor specialization form.";
    }

    public function get_url() {
        return new \moodle_url('/admin/settings.php', ['section' => 'local_mentor_specialization']);
    }
    
}
