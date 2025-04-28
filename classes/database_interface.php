<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Database Interface
 *
 * @package    local_mentor_specialization
 * @copyright  2020 Edunao SAS (contact@edunao.com)
 * @author     adrien jamot <adrien@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mentor_specialization;


defined('MOODLE_INTERNAL') || die();

use local_mentor_core\session;
use local_mentor_core\training;

require_once($CFG->dirroot . '/local/mentor_core/classes/database_interface.php');
require_once($CFG->dirroot . '/local/mentor_specialization/lib.php');
require_once($CFG->dirroot . '/local/mentor_specialization/classes/models/mentor_profile.php');
require_once($CFG->dirroot . '/local/mentor_specialization/classes/utils/taskUtils.php');


class database_interface extends \local_mentor_core\database_interface {

    private $skills;

    /**
     * Create a singleton of the class
     *
     * @return database_interface
     */
    public static function get_instance() {

        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Get category options from category_options table
     *
     * @param int $categoryid
     * @return \stdClass[]
     * @throws \dml_exception
     */
    public function get_category_options($categoryid) {
        return $this->db->get_records('category_options', ['categoryid' => $categoryid]);
    }

    /**
     * Get category option from category_options table
     *
     * @param int $categoryid
     * @param string $optionname
     * @return \stdClass|false
     * @throws \dml_exception
     */
    public function get_category_option($categoryid, $optionname) {
        return $this->db->get_record('category_options', ['categoryid' => $categoryid, 'name' => $optionname]);
    }


    /**
     * Get the value of a category option
     *
     * @param int $entityid
     * @param string $optionname
     * @return string|false
     * @throws \moodle_exception
     */
    public function get_category_option_value($categoryid, $optionname) {
        global $DB;
        $option = $DB->get_record_sql("SELECT * FROM {category_options} WHERE name = ? AND categoryid = ?", [$optionname, $categoryid]);
        if ($option) {
            return $option->value == '1';
        }
        return false;
    }



    /**
     * Update the entity regions
     *
     * @param int $entityid
     * @param int|array $regionsid
     * @return bool
     * @throws \dml_exception
     */
    public function update_entity_regions($entityid, $regionsid) {

        if (is_array($regionsid)) {
            $regionsid = implode(',', $regionsid);
        }

        // Update category options.
        if ($categoryoptions = $this->get_category_option($entityid, 'regionid')) {
            $categoryoptions->value = $regionsid;
            $this->db->update_record('category_options', $categoryoptions);
        } else {
            // Create category options.
            $categoryoptions = new \stdClass();
            $categoryoptions->categoryid = $entityid;
            $categoryoptions->name = 'regionid';
            $categoryoptions->value = $regionsid;
            $this->db->insert_record('category_options', $categoryoptions);
        }
        return true;
    }

    /**
     * Update the visibility of an entity
     *
     * @param int $entityid
     * @param int $hidden 1 for an hidden entity
     * @return bool
     * @throws \dml_exception
     */
    public function update_entity_visibility($entityid, $hidden) {

        if ($categoryoptions = $this->db->get_record('category_options', ['categoryid' => $entityid, 'name' => 'hidden'])) {
            // Update visibility.
            $categoryoptions->value = $hidden;
            $this->db->update_record('category_options', $categoryoptions);
        } else {
            // Create category options.
            $categoryoptions = new \stdClass();
            $categoryoptions->categoryid = $entityid;
            $categoryoptions->name = 'hidden';
            $categoryoptions->value = $hidden;
            $this->db->insert_record('category_options', $categoryoptions);
        }
        return true;
    }



    /**
     * Update entity sirh list
     *
     * @param int $entityid
     * @param string|array $sirhlist
     * @return bool
     * @throws \dml_exception
     */
    public function update_entity_sirh_list($entityid, $sirhlist) {

        if (is_array($sirhlist)) {
            $sirhlist = implode(',', $sirhlist);
        }

        // Update category options.
        if ($categoryoptions = $this->get_category_option($entityid, 'sirhlist')) {
            $categoryoptions->value = $sirhlist;
            $this->db->update_record('category_options', $categoryoptions);
        } else {
            // Create category options.
            $categoryoptions = new \stdClass();
            $categoryoptions->categoryid = $entityid;
            $categoryoptions->name = 'sirhlist';
            $categoryoptions->value = $sirhlist;
            $this->db->insert_record('category_options', $categoryoptions);
        }
        return true;
    }

    /**
     * Update entity sirh list
     *
     * @param int $entityid
     * @param string $canbemainentity
     * @throws \dml_exception
     */
    public function update_can_be_main_entity($entityid, $canbemainentity) {

        // Update category options.
        if ($categoryoptions = $this->get_category_option($entityid, 'canbemainentity')) {
            $categoryoptions->value = $canbemainentity;
            $this->db->update_record('category_options', $categoryoptions);
        } else {
            // Create category options.
            $categoryoptions = new \stdClass();
            $categoryoptions->categoryid = $entityid;
            $categoryoptions->name = 'canbemainentity';
            $categoryoptions->value = $canbemainentity;
            $this->db->insert_record('category_options', $categoryoptions);
        }
    }



    /**
     * Get cohort by region
     *
     * @param int $regionid
     * @return \stdClass[]
     * @throws \dml_exception
     */
    public function get_cohorts_by_region($regionid) {
        global $CFG;

        // Find id in regions list.
        if ($CFG->dbtype == 'pgsql') {
            $compare = "'" . $regionid . "' = ANY (string_to_array(uo.value,','))";
        } else {
            $compare = "find_in_set('" . $regionid . "',uo.value) <> 0";
        }

        return $this->db->get_records_sql("
            SELECT co.id
            FROM {category_options} uo
            JOIN {course_categories} cca ON cca.id = uo.categoryid
            JOIN {context} cnt ON cnt.instanceid = cca.id
            JOIN {cohort} co ON co.contextid = cnt.id
            WHERE
                uo.name = :name
                AND
                " . $compare
            , ['name' => 'regionid']);
    }

    /**
     * Get all regions sorted by name ASC
     *
     * @return \stdClass[]
     * @throws \dml_exception
     */
    public function get_all_regions() {
        return $this->db->get_records('regions', null, 'name ASC');
    }

    /**
     * Get all users by regions id
     *
     * @param array $regionsid
     * @return \stdClass[]
     * @throws \dml_exception
     */
    public function get_users_by_regions($regionsid) {

        // Region id is empty ?
        if (empty($regionsid)) {
            return [];
        }

        $or = '(';

        $params = ['fieldname' => 'region'];

        $i = 1;
        foreach ($regionsid as $regionid) {
            $or .= 'r.id = :regionid' . $i . ' OR ';

            $params['regionid' . $i] = $regionid;
            $i++;
        }

        $or = substr($or, 0, -4);

        $or .= ')';

        return $this->db->get_records_sql('
            SELECT u.*
            FROM {user} u
            JOIN {user_info_data} uid ON u.id = uid.userid
            JOIN {user_info_field} uif ON uif.id = uid.fieldid
            JOIN {regions} r ON r.name = uid.data
            WHERE
                uif.shortname = :fieldname
                AND
                ' . $or
            , $params);
    }

    /**
     * Get all skills of the platform
     *
     * @return array idnumber => shortname
     * @throws \dml_exception
     */
    public function get_skills() {

        // Load all competencies from database.
        if (empty($this->skills)) {
            // Get all competencies without domain.
            $competencies = $this->db->get_records_sql('
                SELECT *
                FROM {competency} c
                WHERE c.parentid != 0
                ORDER BY c.parentid, c.sortorder
            ');

            $this->skills = [];

            // Index competencies by idnumber.
            foreach ($competencies as $competency) {
                $this->skills[$competency->idnumber] = $competency->shortname;
            }
        }

        return $this->skills;
    }

    /***************************** SESSIONS ******************************/

    /**
     * Get all sessions by entity id
     *
     * @param \stdClass $data
     * @return \stdClass[]
     * @throws \coding_exception
     * @throws \dml_exception
     */
    public function get_sessions_by_entity_id($data) {

        // Get the session data + the number of participants of the session.
        $request = "SELECT DISTINCT s.id,
                    s.maxparticipants,
                    co.fullname AS trainingfullname,
                    co.shortname,
                    co.fullname as sessionname,
                    co.id AS courseid,
                    co3.id AS course3id,
                    s.status AS statusshortname,
                    s.sessionstartdate AS timecreated,
                    s.sessionnumber,
                    cc4.name,
                    s.trainingid,
                    s.opento,
                    t.courseshortname,
                    cc4.name AS entityparendname,
                    STRING_AGG(DISTINCT  cl.fullname, ';') AS collectionstr,  -- Utilisation de STRING_AGG pour concaténer les valeurs de collectionstr
                    cc.id AS entityId
                FROM {session} s
                INNER JOIN {training} t ON s.trainingid = t.id
                LEFT JOIN (
                    SELECT DISTINCT shortname, TRIM(fullname) AS fullname  -- Apply DISTINCT at this level
                    FROM {collection}
                ) cl ON cl.shortname = ANY (string_to_array(t.collection, ','))
                INNER JOIN {course} co ON co.shortname = s.courseshortname
                INNER JOIN {course} co2 ON co2.shortname = t.courseshortname
                INNER JOIN {course_categories} cc ON cc.id = co.category
                INNER JOIN {context} con ON con.instanceid = co.id
                INNER JOIN {course} co3 ON co3.shortname = s.courseshortname
                LEFT JOIN {course_categories} cc3 ON cc3.id = co3.category
                LEFT JOIN {course_categories} cc4 ON cc4.id = cc3.parent
                LEFT JOIN {course_categories} cc5 ON cc5.id = cc4.parent
                INNER JOIN {context} con2 ON con2.instanceid = co3.id
                WHERE (cc.parent = :entityid OR cc5.parent = :entityid2)
                AND (con.contextlevel = :contextlevel OR con2.contextlevel = :contextlevel2)";

        $params = [
            'entityid' => $data->entityid,
            'entityid2' => $data->entityid,
            'contextlevel' => CONTEXT_COURSE,
            'contextlevel2' => CONTEXT_COURSE,
        ];

        // Filters.
        $request .= $this->generate_sessions_by_entity_id_filter($data, $params);

        // Generate research part request.
        $request .= $this->generate_sessions_by_entity_id_search($data, $params);

        $request .= ' GROUP BY
            s.id,
            cc4.name,
            s.sessionnumber,
            con.id,
            con2.id,
            co.fullname,
            co.shortname,
            co.id,
            co3.id,
            s.sessionstartdate,
            t.courseshortname,
            cc.id ';

        // Sort order.
        if ($data->order) {
            switch ($data->order['column']) {
                case 0:
                    $request .= " ORDER BY cc4.name " . $data->order['dir'];
                    break;
                case 1:
                    $request .= " ORDER BY t.fullname " . $data->order['dir'];
                    break;
                case 2:
                    $request .= " ORDER BY co.fullname " . $data->order['dir'];
                    break;
                case 3:
                    $request .= " ORDER BY co.shortname " . $data->order['dir'];
                    break;
                case 4:
                    $request .= " ORDER BY sessionnumber " . $data->order['dir'];
                    break;
                case 5:
                    $request .= " ORDER BY s.sessionstartdate " . $data->order['dir'];
                    break;
                case 6:
                    $request .= " ORDER BY 2 " . $data->order['dir'];
                    break;
                default:
                    break;
            }
        }

        $sessiondata = $this->db->get_records_sql(
            $request,
            $params,
            $data->start,
            $data->length
        );

        // numberparticipant
        foreach ($sessiondata as $id => $data) {
            $contextsql = $this->db->get_records(
                "context",
                ["instanceid" => $data->courseid],
                '',
                'id'
            );
            $contextids = array_keys($contextsql);

            $context2sql = $this->db->get_records(
                "context",
                ["instanceid" => $data->course3id],
                '',
                'id'
            );
            $context2ids = array_keys($context2sql);

            $countrasusers = "SELECT count(DISTINCT(ra.userid))
                            FROM {role_assignments} ra
                            INNER JOIN {role} r ON ra.roleid = r.id
                            WHERE (
                                ra.contextid IN (" . implode(',', $contextids) . ")
                                OR ra.contextid IN (" . implode(',', $context2ids) . ")
                            )
                            AND (r.shortname = :participant OR r.shortname = :participantnonediteur)
                            ";

            $crausersparams = [
                'participant' => 'participant',
                'participantnonediteur' => 'participantnonediteur',
            ];

            $crausersrequest = $this->db->get_record_sql(
                $countrasusers,
                $crausersparams
            );

            $sessiondata[$id] = (object) array_merge( (array)$sessiondata[$id], ["numberparticipants" => $crausersrequest->count] );
        }

        return $sessiondata;
    }
    /**
     * Count session by entity id
     *
     * @param \stdClass $data
     * @return int
     * @throws \dml_exception
     */
    public function count_sessions_by_entity_id($data) {

        // Get the session data + the number of participants of the session.
        $request = '
                SELECT count(DISTINCT(s.id))
                FROM {session} s
                JOIN {training} t ON s.trainingid = t.id
                JOIN {course} co ON co.shortname = s.courseshortname
                JOIN {course} co2 ON co2.shortname = t.courseshortname
                JOIN {course_categories} cc ON cc.id = co.category
                JOIN {context} con ON con.instanceid = co.id
                JOIN {course} co3 ON co3.shortname = s.courseshortname
                LEFT JOIN {course_categories} cc3 ON cc3.id = co3.category
                LEFT JOIN {course_categories} cc4 ON cc4.id = cc3.parent
                LEFT JOIN {course_categories} cc5 ON cc5.id = cc4.parent
                JOIN {context} con2 ON con2.instanceid = co3.id
                WHERE
                    (cc.parent = :entityid OR cc5.parent = :entityid2)
                    AND (con.contextlevel = :contextlevel OR con2.contextlevel = :contextlevel2)';

        $params = [
            'participant' => 'participant',
            'participantnonediteur' => 'participantnonediteur',
            'entityid' => $data->entityid,
            'entityid2' => $data->entityid,
            'contextlevel' => CONTEXT_COURSE,
            'contextlevel2' => CONTEXT_COURSE,
        ];

        // Filters.
        $request .= $this->generate_sessions_by_entity_id_filter($data, $params);

        // Generate research part request.
        $request .= $this->generate_sessions_by_entity_id_search($data, $params);

        return $this->db->count_records_sql(
            $request,
            $params
        );
    }

    /**
     * Generate sessions by entity id filter part request.
     *
     * @param \stdClass $data
     * @param array $params
     * @return string
     */
    public function generate_sessions_by_entity_id_filter($data, &$params) {
        $request = '';

        // Filters.
        if (isset($data->filters) && !empty($data->filters)) {
            // Sub-entities filter.
            if (isset($data->filters['subentity']) && !empty($data->filters['subentity'])) {
                $request .= ' AND (';
                foreach ($data->filters['subentity'] as $key => $subentityid) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= ' cc4.id = :subentityid' . $key;
                    $params['subentityid' . $key] = $subentityid;
                }
                $request .= ' ) ';
            }

            // Collections filter.
            if (isset($data->filters['collection']) && !empty($data->filters['collection'])) {
                $request .= ' AND (';
                foreach ($data->filters['collection'] as $key => $collection) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= $this->db->sql_like('t.collection', ':collection' . $key, false, false);
                    $params['collection' . $key] = '%' . $this->db->sql_like_escape($collection) . '%';
                }
                $request .= ' ) ';
            }

            // Status filter.
            if (isset($data->filters['status']) && !empty($data->filters['status'])) {
                $request .= ' AND (';
                foreach ($data->filters['status'] as $key => $status) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= ' s.status = :status' . $key;
                    $params['status' . $key] = $status;
                }
                $request .= ' ) ';
            }

            // Status 'Open' to  filter.
            if (isset($data->filters['opento']) && !empty($data->filters['opento'])) {
                $request .= ' AND (';
                foreach ($data->filters['opento'] as $key => $opento) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= ' s.opento = :opento' . $key;
                    $params['opento' . $key] = $opento;
                }
                $request .= ' ) ';
            }

            // Date filter.
            if (isset($data->filters['startdate']) && !empty($data->filters['startdate'])) {
                $request .= ' AND s.sessionstartdate > :startdate ';
                $params['startdate'] = $data->filters['startdate'];
            }
            if (isset($data->filters['enddate']) && !empty($data->filters['enddate'])) {
                $request .= ' AND s.sessionstartdate < :enddate ';
                $params['enddate'] = $data->filters['enddate'];
            }
        }

        return $request;
    }

    /**
     * Generate sessions by entity id search part request.
     *
     * @param \stdClass $data
     * @param array $params
     * @return string
     * @throws \coding_exception
     */
    public function generate_sessions_by_entity_id_search($data, &$params) {
        $request = '';

        // Generate research part request.
        if ($data->search && $data->search['value'] && mb_strlen(trim($data->search['value'])) > 1) {
            // Condition is closed after status and collection checks.
            $request .= ' AND ( ';

            // Do not execute strict search by default.
            $strictsearch = false;

            // Search exact value if '"' or '&#34;' have been submitted.
            if (
                mb_substr($data->search['value'], -5) === '&#34;' &&
                mb_substr($data->search['value'], 0, 5) === '&#34;' &&
                mb_strlen(trim($data->search['value'])) > 5
            ) {
                // Activate strict search.
                $strictsearch = true;

                // Get real search value.
                $searchvalue = trim(mb_substr($data->search['value'], 5, -5));
                $searchvalue = str_replace("&#39;", "'", $searchvalue);

                // Get part of query with params.
                list($querypartsql, $querypartparams) = $this->generate_session_sql_search_exact_expression(trim($searchvalue));

                // Assign response.
                $params = array_merge($params, $querypartparams);
                $request .= $querypartsql;
            } else if ( // Without serializer to front controller.
                mb_substr($data->search['value'], -1) === '"' &&
                mb_substr($data->search['value'], 0, 1) === '"' &&
                mb_strlen(trim($data->search['value'])) > 5
            ) {
                // Activate strict search.
                $strictsearch = true;

                // Get real search value.
                $searchvalue = trim(mb_substr($data->search['value'], 1, -1));
                $searchvalue = str_replace("\"", "'", $searchvalue);

                // Get part of query with params.
                list($querypartsql, $querypartparams) = $this->generate_session_sql_search_exact_expression(trim($searchvalue));

                // Assign response.
                $params = array_merge($params, $querypartparams);
                $request .= $querypartsql;
            } else {
                $searchvalue = $data->search['value'];
                $searchvalue = str_replace("&#39;", "\'", $searchvalue);
                $listsearchvalue = explode(" ", $searchvalue);

                $firstloop = true;

                foreach ($listsearchvalue as $key => $partsearchvalue) {
                    if (!$partsearchvalue) {
                        continue;
                    }

                    if ($firstloop) {
                        $request .= ' ( ';
                        $firstloop = false;
                    } else {
                        $request .= ' AND ( ';
                    }
                    $request .= $this->db->sql_like('co2.fullname', ':trainingname' . $key, false, false);
                    $params['trainingname' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                    $request .= ' OR ' .
                                $this->db->sql_like('s.courseshortname', ':courseshortname' . $key, false,
                                    false);
                    $params['courseshortname' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                    $request .= ' OR ' .
                                $this->db->sql_like('cc4.name', ':entityname' . $key, false,
                                    false) .
                                ' ) ';
                    $params['entityname' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                }
            }

            // Get part of query with params for status.
            list($querystatuspartsql, $querystatuspartparams) = $this->generate_session_sql_search_by_status($searchvalue,
                $strictsearch);
            // Assign response.
            $params = array_merge($params, $querystatuspartparams);
            $request .= $querystatuspartsql;

            // Get part of query with params for collection.
            list($querycollectionpartsql, $querycollectionpartparams)
                = $this->generate_session_sql_search_by_collection($searchvalue,
                $strictsearch);
            // Assign response.
            $params = array_merge($params, $querycollectionpartparams);
            $request .= $querycollectionpartsql;

            // Closes 'AND' parenthese.
            $request .= ' ) ';
        }

        return $request;
    }

    /**
     * Generate piece of SQL request for exact collection search
     *
     * @param string $searchvalue
     * @param bool $strictsearch
     * @return array
     * @throws \coding_exception
     */
    public function generate_session_sql_search_by_collection($searchvalue, $strictsearch = false) {

        $searchvalue = str_replace("\'", "'", $searchvalue);

        $request = '';
        $params = [];

        // Get list collection and there string.
        $listcollection = local_mentor_specialization_get_collections();
        $listcollectionsearch = [];

        // Search if "searchvalue" is in string collection.
        $listcollectionsearchtmp = [];
        foreach ($listcollection as $keycollection => $collectionstring) {
            if ((!$strictsearch && strpos(strtolower($collectionstring), strtolower($searchvalue)) !== false)
                || ($strictsearch && strtolower($collectionstring) === strtolower($searchvalue))
            ) {
                $listcollectionsearchtmp[$keycollection] = strtolower($collectionstring);
            }
        }

        if (empty($listcollectionsearch)) {
            $listcollectionsearch = $listcollectionsearchtmp;
        } else {
            $listcollectionsearch = array_intersect($listcollectionsearchtmp, $listcollectionsearch);
        }

        // If search collection is true, add conditional request.
        if (!empty($listcollectionsearch)) {
            foreach ($listcollectionsearch as $key => $collectionstring) {
                $request .= ' OR ';
                $request .= $this->db->sql_like('t.collection', ':collection' . $key, false, false);
                $params['collection' . $key] = '%' . $this->db->sql_like_escape($key) . '%';
            }
        }

        return [$request, $params];
    }

    /**
     * Generate piece of SQL request for exact status search
     *
     * @param string $searchvalue
     * @param bool $strictsearch
     * @return array
     * @throws \coding_exception
     */
    public function generate_session_sql_search_by_status($searchvalue, $strictsearch = false) {
        $request = '';
        $params = [];

        // Get list status and there string.
        $liststatus = \local_mentor_core\session_api::get_status_list();
        $lisstatusstring = array_map(function($status) {
            return strtolower(get_string($status, 'local_mentor_core'));
        }, $liststatus);
        $liststatussearch = [];

        // Search if "searchvalue" is in string status.
        $liststatussearchtmp = [];
        foreach ($lisstatusstring as $keystatus => $statusstring) {
            if ((!$strictsearch && strpos(str_replace("é", "e", $statusstring), str_replace("é", "e", strtolower($searchvalue)))
                                   !== false)
                || ($strictsearch && $statusstring === strtolower($searchvalue))
            ) {
                $liststatussearchtmp[$keystatus] = $statusstring;
            }
        }
        if (empty($liststatussearch)) {
            $liststatussearch = $liststatussearchtmp;
        } else {
            $liststatussearch = array_intersect($liststatussearchtmp, $liststatussearch);
        }

        // If search status is true, add conditional request.
        if (!empty($liststatussearch)) {
            foreach ($liststatussearch as $key => $statusstring) {
                $request .= ' OR ';
                $request .= 's.status = :status' . $key;
                $params['status' . $key] = $key;
            }
        }

        return [$request, $params];
    }

    /**
     * Generate piece of SQL request for exact expression search
     *
     * @param string $expression
     * @return array
     */
    public function generate_session_sql_search_exact_expression($expression) {
        $request = '';
        $params = [];

        if (mb_strlen($expression) === 0) {
            return [$request, $params];
        }

        $request .= $this->db->sql_equal('t.courseshortname', ':trainingname', false, false);
        $params['trainingname'] = $expression;
        $request .= ' OR ' .
                    $this->db->sql_equal('s.courseshortname', ':courseshortname', false,
                        false);
        $params['courseshortname'] = $expression;
        $request .= ' OR ' .
                    $this->db->sql_equal('cc4.name', ':entityname', false,
                        false);
        $params['entityname'] = $expression;

        return [$request, $params];
    }

    /**
     * Convert a course role to another in a course
     *
     * @param int $courseid
     * @param string $fromroleshortname
     * @param string $endroleshortname
     * @return bool success or not
     * @throws \dml_exception
     */
    public function convert_course_role($courseid, $fromroleshortname, $endroleshortname) {
        // Get the start role.
        if (!$fromrole = $this->db->get_record('role', ['shortname' => $fromroleshortname])) {
            return false;
        }

        // Get the end role.
        if (!$endrole = $this->db->get_record('role', ['shortname' => $endroleshortname])) {
            return false;
        }

        // Update enrolment methods.
        try {
            $test2 = $this->db->execute('
                UPDATE {enrol}
                SET roleid = :newroleid
                WHERE courseid = :courseid AND roleid = :oldroleid',
                [
                    'newroleid' => $endrole->id,
                    'courseid' => $courseid,
                    'oldroleid' => $fromrole->id,
                ]
            );
        } catch (\dml_exception $e) {
            \core\notification::error("ERROR : Update enrolment methods!!!\n" . $e->getMessage());
            return false;
        }

        $context = \context_course::instance($courseid);

        // Update role assignments.
        try {
            $test = $this->db->execute('
                UPDATE {role_assignments}
                SET roleid = :newroleid
                WHERE contextid = :contextid AND roleid = :oldroleid',
                [
                    'newroleid' => $endrole->id,
                    'contextid' => $context->id,
                    'oldroleid' => $fromrole->id,
                ]
            );
        } catch (\dml_exception $e) {
            \core\notification::error("ERROR : Update role assignments!!!\n" . $e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Disable all course mods by modname
     *
     * @param int $courseid
     * @param string $modname
     * @throws \dml_exception
     */
    public function disable_course_mods($courseid, $modname) {
        // Fetch all modules.
        $mods = $this->db->get_records_sql('
            SELECT cm.id
            FROM {course_modules} cm
            JOIN {modules} m ON cm.module = m.id
            WHERE
                m.name = :modname
                AND
                cm.course = :courseid
        ', ['modname' => $modname, 'courseid' => $courseid]);

        // Hide all modules.
        foreach ($mods as $mod) {
            $mod->visible = 0;
            $this->db->update_record('course_modules', $mod);
        }
    }

    /**
     * Check if user is participant
     *
     * @param int $userid
     * @param int $contextid
     * @return bool
     * @throws \dml_exception
     */
    public function is_participant($userid, $contextid) {
        $sql = "SELECT ra.*
                FROM {role_assignments} ra
                JOIN {role} r ON r.id = ra.roleid
                WHERE ra.userid = :userid AND ra.contextid = :contextid
                    AND (r.shortname = :participant OR r.shortname = :participantnonediteur)";

        return $this->db->record_exists_sql($sql, [
            'userid' => $userid,
            'contextid' => $contextid,
            'participant' => \local_mentor_specialization\mentor_profile::ROLE_PARTICIPANT,
            'participantnonediteur' => \local_mentor_specialization\mentor_profile::ROLE_PARTICIPANTNONEDITEUR,
        ]);
    }

    /**
     * Get course participants
     *
     * @param int $contextid
     * @return array
     * @throws \dml_exception
     */
    public function get_course_participants($contextid) {
        $sql = '
            SELECT DISTINCT(u.id), u.*
            FROM {user} u
            JOIN {role_assignments} ra ON ra.userid = u.id
            JOIN {role} r ON r.id = ra.roleid
            WHERE
                ra.contextid = :contextid
                AND (r.shortname = :participant OR r.shortname = :participantnonediteur)
        ';

        return $this->db->get_records_sql($sql, [
            'contextid' => $contextid,
            'participant' => \local_mentor_specialization\mentor_profile::ROLE_PARTICIPANT,
            'participantnonediteur' => \local_mentor_specialization\mentor_profile::ROLE_PARTICIPANTNONEDITEUR,
        ]);
    }

    /**
     * Get all trainings by entity id
     *
     * @param int|\stdClass $data
     * @param boolean $onlymainentity - default true
     * @return \stdClass[]
     * @throws \dml_exception
     */
    public function get_trainings_by_entity_id($data, $onlymainentity = true) {

        // Return just trainings into main entity.
        if ($onlymainentity) {
            return parent::get_trainings_by_entity_id(is_object($data) ? $data->entityid : $data);
        }

        $withfilter = true;
        if (!is_object($data)) {
            $withfilter = false;
            $entityid = $data;
        } else {
            $entityid = $data->entityid;
        }

        $entity = \local_mentor_core\entity_api::get_entity($entityid);

        $where = '';

        // The sub-entity's "Local training contact" does not see
        // the training with a draft and archive status if trainings are in the main entity.
        if (
            $entity->is_main_entity() &&
            !has_capability('local/trainings:create', $entity->get_context())
        ) {
            $where = ' AND ((t.status != \'' . \local_mentor_core\training::STATUS_DRAFT . '\'' .
                     ' AND t.status != \'' . \local_mentor_core\training::STATUS_ARCHIVED . '\'' .
                     ' AND (cc3.parent = 0 OR cc4.parent = 0))' .
                     ' OR (cc3.parent <> 0 OR cc4.parent <> 0))';
        }

        // Initialize request.
        $request = "SELECT
                    t.id,
                    t.idsirh,
                    t.status,
                    t.courseshortname as courseshortname ,                   
                    co.fullname as name,
                    STRING_AGG(DISTINCT  cl.fullname, ';') AS collectionstr,
                    COUNT(DISTINCT s.id) as sessions,
                    cc.parent as entityId,
                    t.traininggoal
                FROM
                    {training} t
                LEFT JOIN (
                        SELECT DISTINCT shortname, TRIM(fullname) AS fullname 
                        FROM {collection}
                    ) cl ON cl.shortname = ANY (string_to_array(t.collection, ',')) 
                LEFT JOIN
                    {session} s ON s.trainingid = t.id  
                JOIN
                    {course} co ON co.shortname = t.courseshortname
                LEFT JOIN
                    {course_categories} cc ON cc.id = co.category
                LEFT JOIN
                    {course} co2 ON co2.shortname = t.courseshortname
                LEFT JOIN
                    {course_categories} cc2 ON cc2.id = co2.category
                LEFT JOIN
                    {course_categories} cc3 ON cc3.id = cc2.parent
                LEFT JOIN
                    {course_categories} cc4 ON cc4.id = cc3.parent
                JOIN
                    {course} co3 ON co3.shortname = t.courseshortname
                WHERE
                    (cc.parent = :entityid OR cc4.parent = :entityid2)" .
                   $where;
                  
        // Get resultat request without condition and filter.
        if (!$withfilter) {
              $request .= " GROUP BY
                t.id,
                co.fullname,
                cc.parent";
            return $this->db->get_records_sql($request,
                [
                    'entityid' => $entityid,
                    'entityid2' => $entityid,
                ]
            );
        }

        // Intitialize params to request.
        $params = [
            'entityid' => $entityid,
            'entityid2' => $entityid,
        ];
        
        // Filters.
        $request .= $this->generate_trainings_by_entity_id_filter($data, $params);

        // Generate reseach part request.
        $request .= $this->generate_trainings_by_entity_id_search($data, $params);

        $request .= " GROUP BY
                t.id,
                co.fullname,
                cc.parent ";

        // Sort order.
        if ($data->order && isset($data->order['column'])) {
            switch ($data->order['column']) {
                case 0: // Sub-entity name.
                    $request .= ",cc3.name ORDER BY cc3.name " . $data->order['dir'];
                    break;
                case 1: // Collection.
                    $request .= " ORDER BY t.collection " . $data->order['dir'];
                    break;
                case 2: // Training shortname.
                    $request .= " , co3.fullname ORDER BY co3.fullname " . $data->order['dir'];
                    break;
                case 4: // Id SIRH.
                    $request .= " ORDER BY t.idsirh " . $data->order['dir'];
                    break;
                default: // Default : sort by id.
                    $request .= " ORDER BY t.id DESC";
                    break;
            }
        } else {
            // Default : sort by id.
            $request .= " ORDER BY t.id DESC";
        }
        // Execute request with conditions and filters.
        return $this->db->get_records_sql(
            $request,
            $params,
            $data->start,
            $data->length
        );
    }

    /**
     * Count all trainings by entity id
     *
     * @param int|\stdClass $data
     * @param boolean $onlymainentity - default true
     * @return int
     * @throws \dml_exception
     */
    public function count_trainings_by_entity_id($data, $onlymainentity = true) {

        // Return just trainings into main entity.
        if ($onlymainentity) {
            return parent::count_trainings_by_entity_id(is_object($data) ? $data->entityid : $data);
        }

        $withfilter = true;
        if (!is_object($data)) {
            $withfilter = false;
            $entityid = $data;
        } else {
            $entityid = $data->entityid;
        }

        $entity = \local_mentor_core\entity_api::get_entity($entityid);

        $where = '';

        // The sub-entity's "Local training contact" does not see
        // the training with a draft and archive status if trainings are in the main entity.
        if (
            $entity->is_main_entity() &&
            !has_capability('local/trainings:create', $entity->get_context())
        ) {
            $where = ' AND ((t.status != \'' . \local_mentor_core\training::STATUS_DRAFT . '\'' .
                     ' AND t.status != \'' . \local_mentor_core\training::STATUS_ARCHIVED . '\'' .
                     ' AND (cc3.parent = 0 OR cc4.parent = 0))' .
                     ' OR (cc3.parent <> 0 OR cc4.parent <> 0))';
        }

        // Initialize request.
        $request = 'SELECT
                    count(DISTINCT t.id)
                FROM
                    {training} t
                JOIN
                    {course} co ON co.shortname = t.courseshortname
                LEFT JOIN
                    {course_categories} cc ON cc.id = co.category
                LEFT JOIN
                    {course} co2 ON co2.shortname = t.courseshortname
                LEFT JOIN
                    {course_categories} cc2 ON cc2.id = co2.category
                LEFT JOIN
                    {course_categories} cc3 ON cc3.id = cc2.parent
                LEFT JOIN
                    {course_categories} cc4 ON cc4.id = cc3.parent
                WHERE
                    (cc.parent = :entityid OR cc4.parent = :entityid2)' .
                   $where;

        // Get resultat request without condition and filter.
        if (!$withfilter) {
            return $this->db->count_records_sql($request,
                [
                    'entityid' => $entityid,
                    'entityid2' => $entityid,
                ]
            );
        }

        // Intitialize params to request.
        $params = [
            'entityid' => $entityid,
            'entityid2' => $entityid,
        ];

        // Filters.
        $request .= $this->generate_trainings_by_entity_id_filter($data, $params);

        // Generate reseach part request.
        $request .= $this->generate_trainings_by_entity_id_search($data, $params);

        // Execute request with conditions and filters.
        return $this->db->count_records_sql(
            $request,
            $params
        );
    }

    /**
     * Generate trainings by entity id filter part request.
     *
     * @param \stdClass $data
     * @param array $params
     * @return string
     */
    public function generate_trainings_by_entity_id_filter($data, &$params) {
        $request = '';

        if (isset($data->filters) && !empty($data->filters)) {
            // Sub-entities filter.
            if (isset($data->filters['subentity']) && !empty($data->filters['subentity'])) {
                $request .= ' AND (';
                foreach ($data->filters['subentity'] as $key => $subentityid) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= ' cc3.id = :subentityid' . $key;
                    $params['subentityid' . $key] = $subentityid;
                }
                $request .= ' ) ';
            }

            // Collections filter.
            if (isset($data->filters['collection']) && !empty($data->filters['collection'])) {
                $request .= ' AND (';
                foreach ($data->filters['collection'] as $key => $collection) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= $this->db->sql_like('t.collection', ':collection' . $key, false, false);
                    $params['collection' . $key] = '%' . $this->db->sql_like_escape($collection) . '%';
                }
                $request .= ' ) ';
            }

            // Status filter.
            if (isset($data->filters['status']) && !empty($data->filters['status'])) {
                $request .= ' AND (';
                foreach ($data->filters['status'] as $key => $status) {
                    if ($key) {
                        $request .= ' OR ';
                    }
                    $request .= ' t.status = :status' . $key;
                    $params['status' . $key] = $status;
                }
                $request .= ' ) ';
            }
        }

        return $request;
    }

    /**
     * Generate trainings by entity id search part request.
     *
     * @param \stdClass $data
     * @param array $params
     * @return string
     * @throws \coding_exception
     * @throws \dml_exception
     */
    public function generate_trainings_by_entity_id_search($data, &$params) {
        $request = '';

        if (isset($data->search) && $data->search && $data->search['value'] && mb_strlen(trim($data->search['value'])) > 1) {
            // Condition is closed after status and collection checks.
            $request .= ' AND ( ';

            // Do not execute strict search by default.
            $strictsearch = false;

            // Get list status and there string.
            $liststatus = \local_mentor_core\training_api::get_status_list();
            $lisstatusstring = array_map(function($status) {
                return strtolower(get_string($status, 'local_mentor_specialization'));
            }, $liststatus);

            // Get list collection and there string.
            $listcollection = local_mentor_specialization_get_collections();

            // Search exact value if '"' have been submitted.
            if (mb_substr(trim($data->search['value']), -5) === '&#34;'
                && mb_substr(trim($data->search['value']), 0, 5) === '&#34;'
                && mb_strlen(trim($data->search['value'])) > 5) {

                // Activate strict search.
                $strictsearch = true;

                // Get real search value.

                $searchvalue = trim(mb_substr(trim($data->search['value']), 5, -5));
                $searchvalue = str_replace("&#39;", "'", $searchvalue);

                $searchvaluestatus = $this->get_status_search_value_trainings($lisstatusstring, $searchvalue, true);

                $searchvaluecollection = $this->get_collection_search_value_trainings($listcollection, $searchvalue, true);

                // Get part of query with params.
                list($querypartsql, $querypartparams) = $this->generate_training_sql_search_exact_expression($searchvalue,
                    $searchvaluestatus);

                // Assign response.
                $params = array_merge($params, $querypartparams);
                $request .= $querypartsql;
            } else if (
                mb_substr($data->search['value'], -1) === '"' &&
                mb_substr($data->search['value'], 0, 1) === '"' &&
                mb_strlen(trim($data->search['value'])) > 5
            ) {
                // Without serializer to front controller.

                // Activate strict search.
                $strictsearch = true;

                // Get real search value.

                $searchvalue = trim(mb_substr(trim($data->search['value']), 1, -1));
                $searchvalue = str_replace("\"", "'", $searchvalue);

                $searchvaluestatus = $this->get_status_search_value_trainings($lisstatusstring, $searchvalue, true);

                $searchvaluecollection = $this->get_collection_search_value_trainings($listcollection, $searchvalue, true);

                // Get part of query with params.
                list($querypartsql, $querypartparams) = $this->generate_training_sql_search_exact_expression($searchvalue,
                    $searchvaluestatus);

                // Assign response.
                $params = array_merge($params, $querypartparams);
                $request .= $querypartsql;
            } else { // Without serializer to front controller.
                $strreplace = str_replace("&#39;", "\'", $data->search['value']);
                $listsearchvalue = explode(" ", $strreplace);

                $firstloop = true;
                foreach ($listsearchvalue as $key => $partsearchvalue) {
                    if (!$partsearchvalue) {
                        continue;
                    }

                    $searchvaluestatus = $this->get_status_search_value_trainings($lisstatusstring, $partsearchvalue);

                    $searchvaluecollection = $this->get_collection_search_value_trainings($listcollection, $partsearchvalue);

                    if ($firstloop) {
                        $request .= ' ( ';
                        $firstloop = false;
                    } else {
                        $request .= ' AND ( ';
                    }

                    $request .= $this->db->sql_like('cc3.name', ':subentityname' . $key, false,
                        false);
                    $params['subentityname' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                    $request .= ' OR ';
                    $request .= $this->db->sql_like('t.courseshortname', ':trainingname' . $key, false,
                        false);
                    $params['trainingname' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                    $request .= ' OR ';
                    $request .= $this->db->sql_like('co.fullname', ':trainingnameco' . $key, false,
                        false);
                    $params['trainingnameco' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                    $request .= ' OR ';
                    $request .= $this->db->sql_like('co2.fullname', ':trainingnameco2' . $key, false,
                        false);
                    $params['trainingnameco2' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                    $request .= ' OR ';
                    $request .= $this->db->sql_like('t.idsirh', ':idsirh' . $key, false,
                            false) .
                                ' ) ';
                    $params['idsirh' . $key] = '%' . $this->db->sql_like_escape($partsearchvalue) . '%';
                }
            }

            // Get part of query with params for status.
            list($querystatuspartsql, $querystatuspartparams)
                = $this->generate_training_sql_search_by_status($searchvaluestatus,
                $strictsearch);
            // Assign response.
            $params = array_merge($params, $querystatuspartparams);
            $request .= $querystatuspartsql;

            // Get part of query with params for collection.
            list($querycollectionpartsql, $querycollectionpartparams)
                = $this->generate_training_sql_search_by_collection($searchvaluecollection, $strictsearch);
            // Assign response.
            $params = array_merge($params, $querycollectionpartparams);
            $request .= $querycollectionpartsql;

            // Closes 'AND' parenthese.
            $request .= ' ) ';
        }

        return $request;
    }

    /**
     * Get status depending on search
     *
     * @param string[] $lisstatusstring
     * @param string $partsearchvalue
     * @param bool $strictsearch
     * @return array|int|string
     */
    public function get_status_search_value_trainings($lisstatusstring, $partsearchvalue, $strictsearch = false) {
        $liststatussearch = [];

        // Search if "searchvalue" is in string status.
        $liststatussearchtmp = [];

        foreach ($lisstatusstring as $keystatus => $statusstring) {
            if (!$strictsearch && strpos($statusstring, strtolower($partsearchvalue)) !== false) {
                $liststatussearchtmp[$keystatus] = $statusstring;
            } else if ($strictsearch && strtolower($statusstring) === strtolower($partsearchvalue)) {
                return $keystatus;
            }
        }

        if (empty($liststatussearch)) {
            $liststatussearch = $liststatussearchtmp;
        } else {
            $liststatussearch = array_intersect($liststatussearchtmp, $liststatussearch);
        }

        return $liststatussearch;
    }

    /**
     * Get collection depending on search
     *
     * @param array $listcollection
     * @param string $partsearchvalue
     * @param bool $strictsearch
     * @return array|int|string
     */
    public function get_collection_search_value_trainings($listcollection, $partsearchvalue, $strictsearch = false) {
        $partsearchvalue = str_replace("\'", "'", $partsearchvalue);

        $listcollectionsearch = [];

        // Search if "searchvalue" is in string collection.
        $listcollectionsearchtmp = [];

        foreach ($listcollection as $keycollection => $collectionstring) {
            if (!$strictsearch && strpos(strtolower($collectionstring), strtolower($partsearchvalue)) !== false) {
                $listcollectionsearchtmp[$keycollection] = $collectionstring;
            } else if ($strictsearch && strtolower($collectionstring) === strtolower($partsearchvalue)) {
                return $keycollection;
            }
        }

        if (empty($listcollectionsearch)) {
            $listcollectionsearch = $listcollectionsearchtmp;
        } else {
            $listcollectionsearch = array_intersect($listcollectionsearchtmp, $listcollectionsearch);
        }

        return $listcollectionsearch;
    }

    /**
     * Generate piece of SQL request for exact expression search
     *
     * @param string $expression
     * @return array
     */
    public function generate_training_sql_search_exact_expression($expression) {
        $request = '';
        $params = [];

        if (mb_strlen($expression) === 0) {
            return [$request, $params];
        }

        $request .= $this->db->sql_equal('cc3.name', ':subentityname', false,
            false);
        $params['subentityname'] = $this->db->sql_like_escape($expression);
        $request .= ' OR ';
        $request .= $this->db->sql_equal('t.courseshortname', ':trainingname', false,
            false);
        $params['trainingname'] = $this->db->sql_like_escape($expression);
        $request .= ' OR ';
        $request .= $this->db->sql_equal('co.fullname', ':trainingnameco', false,
            false);
        $params['trainingnameco'] = $this->db->sql_like_escape($expression);
        $request .= ' OR ';
        $request .= $this->db->sql_equal('co2.fullname', ':trainingnameco2', false,
            false);
        $params['trainingnameco2'] = $this->db->sql_like_escape($expression);
        $request .= ' OR ';
        $request .= $this->db->sql_equal('t.idsirh', ':idsirh', false,
            false);
        $params['idsirh'] = $this->db->sql_like_escape($expression);

        return [$request, $params];
    }

    /**
     * Generate SQL query for training status search
     *
     * @param string $searchvalue
     * @param bool $strictsearch
     * @return array
     */
    public function generate_training_sql_search_by_status($searchvalue, $strictsearch = false) {
        $request = '';
        $params = [];

        // If search status is true, add conditional request.
        if (!empty($searchvalue)) {
            $cptstatussearch = 0;
            if ($strictsearch) {
                $request .= ' OR ';
                $request .= 't.status = :statussearch';
                $params['statussearch'] = (is_array($searchvalue)) ? key($searchvalue) : $searchvalue;
            } else {
                foreach ($searchvalue as $key => $statusstring) {
                    $request .= ' OR ';
                    $request .= 't.status = :statussearch' . $cptstatussearch;
                    $params['statussearch' . $cptstatussearch] = $key;
                    $cptstatussearch++;
                }
            }
        }

        return [$request, $params];
    }

    /**
     * Generate SQL query for sql collection search
     *
     * @param string $searchvalue
     * @param bool $strictsearch
     * @return array
     */
    public function generate_training_sql_search_by_collection($searchvalue, $strictsearch = false) {
        $request = '';
        $params = [];

        // If search collection is true, add conditional request.
        if (!empty($searchvalue)) {
            if ($strictsearch) {
                $request .= ' OR ';
                $request .= $this->db->sql_like('t.collection', ':collectionsearch');
                $params['collectionsearch'] = '%' . $this->db->sql_like_escape($searchvalue) . '%';
            } else {
                foreach ($searchvalue as $key => $collectionstring) {
                    $request .= ' OR ';
                    $request .= $this->db->sql_like('t.collection', ':collectionsearch' . $key, false,
                        false);
                    $params['collectionsearch' . $key] = '%' . $this->db->sql_like_escape($key) . '%';
                }
            }
        }

        return [$request, $params];
    }

    /**
     * Get the max sessionnumber from training sessions
     *
     * @param int $trainingid
     * @return int
     * @throws \dml_exception
     */
    public function get_max_training_session_index($trainingid) {
        $result = $this->db->get_record_sql('
            SELECT MAX(sessionnumber) as max
            FROM {session}
            WHERE trainingid = :trainingid
        ', ['trainingid' => $trainingid]);

        return $result ? $result->max : 0;
    }

    /**
     * Get sirh instances for a given course
     *
     * @param int $courseid
     * @return array
     * @throws \dml_exception
     */
    public function get_sirh_instances($courseid) {
        return $this->db->get_records('enrol', ['courseid' => $courseid, 'enrol' => 'sirh']);
    }

    /**
     * Get library training
     *
     * @return \stdClass[]
     * @throws \dml_exception
     */
    public function get_library_trainings() {
        return $this->db->get_records_sql('
                SELECT
                    t.*
                FROM
                    {training} t
                JOIN
                    {course} co ON co.shortname = t.courseshortname
                JOIN
                    {course_categories} cc ON cc.id = co.category
                JOIN
                    {library} l ON l.trainingid = t.id
                WHERE
                    cc.parent = :entityid
                ORDER BY
                    l.timemodified DESC, co.fullname ASC',
            ['entityid' => \local_mentor_core\library_api::get_library_id()]
        );
    }

    /**
     * Remove the entity as the main entity from all users.
     *
     * @param int $entityid
     * @return void
     * @throws \dml_exception
     * @throws \moodle_exception
     */
    public function remove_main_entity_to_all_user($entityid) {
        $entity = \core_course_category::get($entityid);
        $userinfofield = $this->db->get_record('user_info_field', ['shortname' => 'mainentity']);
        $this->db->delete_records_select(
            'user_info_data',
            'fieldid = :fieldid AND ' . $this->db->sql_compare_text('data') . ' = ' . $this->db->sql_compare_text(':data'),
            ['fieldid' => $userinfofield->id, 'data' => $entity->name]
        );
    }

    /**
     * Get all hidden entities.
     *
     * @return array
     * @throws \dml_exception
     */
    public function get_hidden_entities() {
        return $this->db->get_records_sql('
            SELECT c.*
            FROM {course_categories} c
            JOIN {category_options} co ON co.categoryid = c.id
            WHERE c.parent = 0
                AND co.name = \'hidden\'
                AND co.value = \'1\'
        ');
    }

    /**
     * Get last sync SIRH to timestamp by session id.
     *
     * @param int $sessionid
     * @return int|null
     */
    public function get_last_sync_sirh_by_session_id($sessionid) {
        return $this->db->get_field('session', 'lastsyncsirh', ['id' => $sessionid]);
    }

    public function get_user_notification($notificationid, $userid, $type){
        global $DB;
        $sql = "SELECT * FROM {user_collection_notification} 
        WHERE collection_id = :collection_id 
        AND user_id = :user_id 
        AND " . $DB->sql_compare_text('type') . " = " . $DB->sql_compare_text(':type');
        $params = [
            'collection_id' => $notificationid,
            'user_id' => $userid,
            'type' => $type
        ];
        return $DB->get_record_sql($sql, $params, IGNORE_MISSING);
    }
    
    /**
     * Delete a record of user collection notification 
     *
     * @return bool
     */
    public function delete_user_notification($notificationid){
        global $DB;
        return $DB->delete_records('user_collection_notification', ['id'=> $notificationid]);
    }

    /**
     * Insert into database a user collection notification record
     *
     * @return void
     */
    public function insert_user_notification($usercollectionobject){
        global $DB;
        $DB->insert_record('user_collection_notification', $usercollectionobject, false, false);
    }

    /**
     * Get user collections notifications
     *
     * @return array
     */
    public function get_user_collection_notifications($type) {
        global $USER, $DB;
        
        $sql = "SELECT * FROM {user_collection_notification} 
        WHERE user_id = :user_id 
        AND " . $DB->sql_compare_text('type') . " = " . $DB->sql_compare_text(':type') . "
        ORDER BY id ASC";
        
        $params = ['user_id' => $USER->id, 'type' => $type];

        return $DB->get_records_sql($sql, $params, 0, 0);
    }

    /**
     * Get all mentor collection 
     *
     * @return array
     */
    public function get_mentor_collections() {
        global $DB;
        return $DB->get_records('collection', [], 'fullname ASC', '*', 0, 0);
    }

    /**
     * fetch users (subscribers) with collection, region, and entities data
     * @return array
     */
    public function get_subscribers_of_new_catalog_sessions($limit, $offset = 0): array
    {
        global $DB;

        $task = \core\task\manager::get_scheduled_task('\local_mentor_specialization\task\email_catalog_updates');
        $tasktimeinterval = make_task_time_interval($task);

        $sql = "SELECT
                DISTINCT on (u.id, t.id)
                ROW_NUMBER() over (ORDER BY u.id ASC ) AS ligne,
                u.id userid,
                t.id trainingid,
                c.fullname AS coursefullname,
                u.*
                FROM
                    {course} c
                JOIN
                    {session} s ON c.shortname = s.courseshortname AND s.status IN (:statusopentocurrentme, :statusinprogress) AND (s.timecreated IS NOT NULL AND s.timecreated > :tasktimeinterval)
                JOIN
                    {course_categories} ccs_main_entity ON ccs_main_entity.id = c.category AND ccs_main_entity.name = 'Sessions' AND ccs_main_entity.visible = 1
                JOIN
                    {course_categories} ccs_main_entity_name ON ccs_main_entity.parent = ccs_main_entity_name.id
                JOIN
                    {training} t ON t.id = s.trainingid
                LEFT JOIN
                    {category_options} co ON co.categoryid = ccs_main_entity.parent AND co.name = 'regionid'
                LEFT JOIN
                    {session_sharing} ss ON ss.sessionid = s.id
                -- Users subscribers CATALOG
                LEFT JOIN
                    (SELECT DISTINCT ucn.user_id as user_id, shortname FROM {collection} c
                        JOIN {user_collection_notification} ucn ON (c.id = ucn.collection_id AND ucn.type = :custnotifcatalogpagetype)
                        JOIN {user} u ON u.id = ucn.user_id
                    ) AS users_collection ON users_collection.shortname = ANY (string_to_array(t.collection, ','))
                -- Users Admins & RFCs
                LEFT JOIN
                    (SELECT
                        u.id as user_id FROM {user} u
                    JOIN
                        {role_assignments} ra ON ra.userid = u.id
                    JOIN
                        {role} role ON role.id = ra.roleid AND (role.shortname = :custnotifadmin OR role.shortname = :custnotifrfc)
                    JOIN
                        {context} con ON con.id = ra.contextid AND con.contextlevel = 40
                    ) AS admins_rfcs on admins_rfcs.user_id IS NOT NULL
                -- Users combined
                JOIN
                    {user} u ON (admins_rfcs.user_id = u.id OR users_collection.user_id = u.id)
                -- Users info
                LEFT JOIN
                    (SELECT u.id as user_id, ccu_main_entity.parent AS user_mainentity_id, uid_second_entities.data AS user_secondaryentities_ids, r.id AS user_region FROM {user} u
                        -- main entity
                        LEFT JOIN
                            {user_info_data} uid_mainentity ON uid_mainentity.userid = u.id 
                        LEFT JOIN
                            {user_info_field} uif_mainentity ON uid_mainentity.fieldid = uif_mainentity.id AND uif_mainentity.shortname = 'mainentity'
                        LEFT JOIN
                            {course_categories} ccu_main_entity ON ccu_main_entity.name = uid_mainentity.data
                        -- secondary entities
                        LEFT JOIN
                            {user_info_data} uid_second_entities ON uid_second_entities.userid = u.id
                        JOIN
                            {user_info_field} uif_second_entities ON uif_second_entities.id = uid_second_entities.fieldid AND uif_second_entities.shortname = 'secondaryentities'
                        LEFT JOIN
                            {course_categories} ccu_second_entity ON ccu_second_entity.name = ANY (string_to_array(uid_second_entities.data, ','))
                        -- region
                        LEFT JOIN
                            {user_info_data} uid_region ON uid_region.userid = u.id
                        JOIN
                            {user_info_field} uif_region ON uif_region.id = uid_region.fieldid AND uif_region.shortname = 'region'
                        JOIN
                            {regions} r ON r.name = uid_region.data
                    ) AS user_info ON user_info.user_id = u.id
                WHERE
                    -- sessions rules
                    s.opento = :statusopentoall
                    OR (s.opento = :statusopentocurrentme2 AND user_info.user_mainentity_id = ccs_main_entity.parent)
                    OR (s.opento = :statusopentocurrententity AND (user_info.user_mainentity_id = ccs_main_entity.parent OR ccs_main_entity_name.name = ANY (string_to_array(user_secondaryentities_ids, ',')) OR CAST(user_region AS VARCHAR) = ANY (string_to_array(co.value , ','))))
                    OR (s.opento = :statusopentootherentity AND (user_info.user_mainentity_id = ccs_main_entity.parent OR user_info.user_mainentity_id = ss.coursecategoryid))
                GROUP BY u.id, t.id, c.id
                ";

        $params = [
            "statusopentocurrentme" => session::OPEN_TO_CURRENT_MAIN_ENTITY,
            "statusopentocurrentme2" => session::OPEN_TO_CURRENT_MAIN_ENTITY,
            "statusinprogress" => session::STATUS_IN_PROGRESS,
            "statusopentoall" => session::OPEN_TO_ALL,
            "statusopentocurrententity" => session::OPEN_TO_CURRENT_ENTITY,
            "statusopentootherentity" => session::OPEN_TO_OTHER_ENTITY,
            "custnotifcatalogpagetype" => custom_notifications_service::$CATALOG_PAGE_TYPE,
            "custnotifadmin" => custom_notifications_service::$ADMIN,
            "custnotifrfc" => custom_notifications_service::$RFC,
            "tasktimeinterval" => $tasktimeinterval,
        ];
        $users = [];

        try {
            $users = $DB->get_records_sql($sql, $params, $offset, $limit);
            
            if (!empty($users)) {
                $users = $this->get_users_catalog_no_external($users);
            }
        } catch (\dml_exception $e) {
            mtrace('Error sql getting collections subscribers: ' . $e->getMessage());
        }
        return $users;
    }

    /**
     * Return a list of users without the role external
     * @param mixed $users
     */
    public function get_users_catalog_no_external(array $users): array
    {
        global $DB;

        [$select, $params] = $DB->get_in_or_equal(
            array_map(fn($user): string => $user->userid, $users),
            SQL_PARAMS_NAMED,
            'user'
        );
        
        $sql = "SELECT ra.userid
                FROM {role_assignments} ra
                INNER JOIN {role} r ON r.id = ra.roleid AND r.shortname = :custnotifexternaluser
                AND ra.userid $select
                ";
        $params['custnotifexternaluser'] = custom_notifications_service::$EXTERNALUSER;

        $externalsusers = array_map(fn($user): string => $user->userid, $DB->get_records_sql($sql, $params));

        return array_filter(
            $users,
            fn($user): bool => !in_array($user->userid, $externalsusers)
        );
    }

    /**
     * fetch users (subscribers) to notify with new published trainings 
     * @return array
     */
    public function get_subscribers_of_new_library_courses(): array
    {
        global $DB;

        $task = \core\task\manager::get_scheduled_task('\local_mentor_specialization\task\email_library_publish');
        $tasktimeinterval = make_task_time_interval($task);

        $sql = "SELECT 
                ROW_NUMBER() over (ORDER BY u.id ASC) AS ligne,
                u.id AS userid,
                l.trainingid,
                c.fullname AS coursefullname,
                u.email,
                cc2.name AS course_category_name_first_level, 
                cc4.name AS course_category_name_last_level 
                FROM {training} t  
                JOIN  {library} l ON t.id = l.originaltrainingid
                JOIN {course} c ON c.shortname = t.courseshortname
                JOIN {course_categories} cc ON cc.id = c.category
                JOIN {course_categories} cc2 ON cc.parent = cc2.id
                LEFT JOIN {course_categories}  cc3 ON cc3.id = cc2.parent
                LEFT JOIN {course_categories}  cc4 ON cc4.id = cc3.parent
                    -- Users subscribers LIBRARY
                LEFT JOIN
                    (SELECT DISTINCT ucn.user_id, shortname
                    FROM  {collection} c
                    JOIN  {user_collection_notification} ucn ON ( c.id = ucn.collection_id AND ucn.type =  '".custom_notifications_service::$LIBRARY_PAGE_TYPE."')
                            ) AS users_collection ON users_collection.shortname = ANY (string_to_array(t.collection, ',')
                    )
                    -- Users Admins & RFCs
                    JOIN {user} u on u.id IS NOT NULL
                    JOIN {role_assignments} ra ON ra.userid = u.id
                    JOIN {role} role ON role.id = ra.roleid
                    JOIN {context} con ON con.id = ra.contextid
                    WHERE
                    t.status = '".training::STATUS_ELABORATION_COMPLETED."'
                    AND l.timecreated > $tasktimeinterval
                    AND (
                        (
                            con.contextlevel = 40
                            AND
                            (    
                                -- admin dedié
                                role.shortname = '".custom_notifications_service::$ADMIN."'
                                -- RFC
                                OR
                                role.shortname = '".custom_notifications_service::$RFC."'
                            )
                        )
                            -- subscriber
                            OR
                            (
                            users_collection.shortname = ANY (string_to_array(t.collection, ','))
                            AND users_collection.user_id = u.id
                            )
                        )

                    GROUP BY u.id, l.originaltrainingid, c.id, cc4.name,cc2.name,l.trainingid";
        $users = [];
        try {
            $users = $DB->get_records_sql($sql, []);
        } catch (\dml_exception $e) {
            mtrace('Error sql getting collections subscribers: ' . $e->getMessage());
        }
        return $users;
    }

    /* fetch users (subscribers) of library, with training data
     * @return array
     */
    public function get_subscribers_of_updated_library_courses(): array
    {
        global $DB;

        $task = \core\task\manager::get_scheduled_task('\local_mentor_specialization\task\email_library_updates');
        $tasktimeinterval = make_task_time_interval($task);

        $sql = "SELECT 
                DISTINCT on (u.id, t.id)
                ROW_NUMBER() over (ORDER BY u.id ASC ) AS ligne,
                l.trainingid as trainingid, 
                cc2.name AS course_category_name_first_level, 
                cc4.name AS course_category_name_last_level, 
                c.fullname as course_name,
                 t.collection coursecollections, 
                 u.*
                    FROM {library} l
                    JOIN {training} t ON t.id = l.originaltrainingid
                    JOIN {course} c ON c.shortname = t.courseshortname
                    JOIN {course_categories} cc ON cc.id = c.category
                    JOIN {course_categories} cc2 ON cc.parent = cc2.id
                    LEFT JOIN {course_categories}  cc3 ON cc3.id = cc2.parent
                    LEFT JOIN {course_categories}  cc4 ON cc4.id = cc3.parent
                    -- Users subscribers LIBRARY
                    LEFT JOIN
                        (SELECT distinct ucn.user_id, shortname from {collection} c
                            JOIN {user_collection_notification} ucn on (c.id = ucn.collection_id AND ucn.type = '".custom_notifications_service::$LIBRARY_PAGE_TYPE."')
                        ) AS userscollection ON userscollection.shortname = ANY (string_to_array(t.collection, ','))
                    -- Users Admins & RFCs
                    JOIN
                        {user} u on u.id IS NOT NULL
                    JOIN {role_assignments} ra
                        ON ra.userid = u.id
                    JOIN {role} r 
                        ON r.id = ra.roleid
                    JOIN {context} ctx 
                        ON ctx.id = ra.contextid
                    WHERE
                    ctx.contextlevel = 40
                    AND (r.shortname IN ('".custom_notifications_service::$ADMIN."', '".custom_notifications_service::$RFC."') OR (r.shortname = '".custom_notifications_service::$LIBRARYVISITOR."' AND userscollection.shortname = ANY (string_to_array(t.collection, ',')) AND userscollection.user_id = u.id ))
                    AND l.timemodified > $tasktimeinterval
                    AND to_timestamp(l.timemodified) > to_timestamp(l.timecreated)
                    ;";
        $users = [];
        try {
            $users = $DB->get_records_sql($sql);
        } catch (\dml_exception $e) {
            mtrace('Error sql getting collections subscribers: ' . $e->getMessage());
        }
        return $users;
    }

    /**
     * Get archived sessions whithin a periode of time
     * @return array
     */
    public function get_archived_sessions($interval, $limit, $offset = 0){
        global $DB;
        $status = session::STATUS_ARCHIVED;
        $sessions = [];
        $task = \core\task\manager::get_scheduled_task('\local_mentor_specialization\task\notify_delete_archived_sessions');
        $tasktimeinterval = $task->get_next_scheduled_time() - $task->get_last_run_time();

        try {
            $sessions = $DB->get_records_sql("
            SELECT
                s.id as id,
                c.id as courseid,
                s.courseshortname as name,
                s.trainingid as trainingid
            FROM
                {session} s
            JOIN
                {course} c ON c.shortname = s.courseshortname
            WHERE
                s.status = :status AND
                to_timestamp(s.sessionenddate)
                    BETWEEN    (CURRENT_TIMESTAMP AT TIME ZONE 'UTC' - INTERVAL '". $interval ."')
                    AND (CURRENT_TIMESTAMP AT TIME ZONE 'UTC' - INTERVAL '". $interval ."' +  INTERVAL '".$tasktimeinterval."')  "
                   ,
        ['status' => $status, ], $offset, $limit);

        } catch (\dml_exception $e) {
            mtrace('Error sql getting archived sessions: ' . $e->getMessage());
        }
        return $sessions;
    }

    /**
     * Delete archived sessions whithin an interval of time
     * @return void
     */
    public function delete_archived_sessions($interval){
       
        $status = session::STATUS_ARCHIVED;
        try {
            $this->db->delete_records_select(
                'session',
                "status = :status 
                AND to_timestamp(sessionenddate) <= (CURRENT_TIMESTAMP - INTERVAL '" .$interval. "')", 
                ['status' => $status]
            );
        } catch (\dml_exception $e) {
            mtrace('Error sql deletting archived sessions: ' . $e->getMessage());
        }
    }


    /**
     * get enrolments users to a specific course having specific roles (tuteur, formateur, concepteur, participantnonediteur)
     * 
     * @param int $courseid
     * @return array
     */
    public function get_session_enrolled_users(int $courseid) {
        $sql = '
            SELECT DISTINCT(ue.id), u.*
            FROM {user_enrolments} ue
            INNER JOIN {enrol} e ON e.id = ue.enrolid
            INNER JOIN {user} u ON ue.userid = u.id
            JOIN {role_assignments} ra ON ra.userid = u.id
            JOIN {role} r ON r.id = ra.roleid
            JOIN {context} ctx ON ctx.id = ra.contextid
            WHERE e.courseid = :courseid
                AND ctx.contextlevel = :contextlevel
                AND (r.shortname = :tuteur
                    OR r.shortname = :formateur 
                    OR r.shortname = :concepteur 
                    OR r.shortname = :participantnonediteur)  ';


        return $this->db->get_records_sql($sql, [
            'courseid' => $courseid,
            'contextlevel' =>  CONTEXT_COURSE,
            'tuteur' => \local_mentor_specialization\mentor_profile::ROLE_TUTEUR,
            'formateur' => \local_mentor_specialization\mentor_profile::ROLE_FORMATEUR,
            'concepteur' => \local_mentor_specialization\mentor_profile::ROLE_CONCEPTEUR,
            'participantnonediteur' => \local_mentor_specialization\mentor_profile::ROLE_PARTICIPANTNONEDITEUR,
        ]);
    }

}
