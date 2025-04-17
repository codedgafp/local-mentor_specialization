<?php

namespace local_mentor_specialization\task;

use core\task\scheduled_task;
use core\task\manager;
use local_categories_domains\repository\categories_domains_repository;
use local_categories_domains\utils\categories_domains_service;

class update_user_mainentity extends scheduled_task {
    public function __construct(
        protected categories_domains_repository $categoriesdomainsrepository = new categories_domains_repository(),
        protected categories_domains_service $categoriesdomainsservice = new categories_domains_service()
    ){
    }

    public function get_name()
    {
        return get_string('update_user_mainentity', 'local_mentor_specialization');
    }

    public function execute()
    {
        $task = manager::get_scheduled_task(update_user_mainentity::class);
        $nextscheduledtime = $task->get_next_scheduled_time();
        $lastruntime = $task->get_last_run_time();

        $domainstoupdate = array_map(
            [$this, 'get_users_to_update'],
            $this->categoriesdomainsrepository->get_all_created_or_updated_domains($nextscheduledtime, $lastruntime)
        );

        foreach ($domainstoupdate as $userstoupdate) {
            $this->categoriesdomainsservice->link_categories_to_users($userstoupdate);
        }
    }

    private function get_users_to_update(\stdClass $domain): array
    {
        return $this->categoriesdomainsrepository->get_all_users_by_domain_name($domain->domain_name);
    }
}
