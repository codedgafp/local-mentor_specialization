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
        $nonwhitelisteddomainsrequest = $this->categoriesdomainsrepository->get_domains_no_more_whitelisted();
        $nonwhitelisteddomainsarray = array_values(array_map(fn($domain): string => $domain->domain_name, $nonwhitelisteddomainsrequest));

        // delete domains that are no more whitelisted
        $this->categoriesdomainsrepository->delete_domains($nonwhitelisteddomainsarray);

        $whitelistconfig = $CFG->allowemailaddresses;
        $whitelistdomains = array_map('trim', explode(' ', $whitelistconfig));
        $domainsList = array_merge($whitelistdomains, $nonwhitelisteddomainsarray);

        $usersdomainnotexist = [];
        foreach ($domainsList as $domain) {
            $domainname = new domain_name();
            $domainname->domain_name = $domain;

            $isdomainexist = $this->categoriesdomainsrepository->is_domain_exists($domainname);

            if (!$isdomainexist) {
                $usersdomainnomoreexist = $this->categoriesdomainsrepository->get_all_users_by_domain_name($domain, true);
                $usersdomainnotexist = array_merge($usersdomainnotexist, $usersdomainnomoreexist);
            }
        }

        $usersnomainentity = $this->categoriesdomainsrepository->get_users_without_main_entity();
        $mergeuserstocheck = array_merge($usersdomainnotexist, $usersnomainentity);

        $externalusers = $this->databaseinterface->get_all_external_users();
        $mergeuserstocheck = array_merge($mergeuserstocheck, $externalusers);

        $checkedemail = [];
        $userstocheck = [];
        foreach ($mergeuserstocheck as $user) {
            if (!in_array($user->email, $checkedemail)) {
                $checkedemail[] = $user->email;
                $userstocheck[] = $user;
            }
        }

        $this->categoriesdomainsservice->link_categories_to_users($userstocheck);
    }
}
