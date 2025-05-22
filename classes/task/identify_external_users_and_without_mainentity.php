<?php

namespace local_mentor_specialization\task;

use core\task\scheduled_task;
use local_categories_domains\model\domain_name;
use local_categories_domains\repository\categories_domains_repository;
use local_categories_domains\utils\categories_domains_service;
use local_mentor_specialization\database_interface;

class identify_external_users_and_without_mainentity extends scheduled_task {
    public function __construct(
        protected categories_domains_repository $categoriesdomainsrepository = new categories_domains_repository(),
        protected categories_domains_service $categoriesdomainsservice = new categories_domains_service(),
        protected database_interface $databaseinterface = new database_interface()
    ){
    }

    public function get_name(): string
    {
        return get_string('identify_external_users_and_without_mainentity', 'local_mentor_specialization');
    }

    public function execute(): void
    {
        global $DB, $CFG;

        //get domains that are no more whitelisted
        $nonwhitelisted_domains = $this->categoriesdomainsrepository->get_domains_no_more_whitelisted();
        $nonwhitelisted_domains = array_values(array_map(function($domain) {
                    return $domain->domain_name;
                }, $nonwhitelisted_domains));
        // delete domains that are no more whitelisted
        $this->categoriesdomainsrepository->delete_domains($nonwhitelisted_domains);
        
        $whitelistconfig = $CFG->allowemailaddresses;
        $whitelistdomains = array_map('trim', explode(' ', $whitelistconfig));
        $domainsList = array_merge($whitelistdomains, $nonwhitelisted_domains);

        $whitelistedusers = [];

        foreach ($domainsList as $domain) {
            $domainname = new domain_name();
            $domainname->domain_name = $domain;

            $isdomainexist = $this->categoriesdomainsrepository->is_domain_exists($domainname);

            if ($isdomainexist) {
                continue;
            }

            $validusers = $this->categoriesdomainsrepository->get_all_users_by_domain_name($domain, true);

            $whitelistedusers = array_merge($whitelistedusers, $validusers);
        }
        $externalusers = $this->databaseinterface->get_all_external_users();
        $userstocheck = array_merge($whitelistedusers, $externalusers);

        $this->categoriesdomainsservice->link_categories_to_users($userstocheck);
    }
}
