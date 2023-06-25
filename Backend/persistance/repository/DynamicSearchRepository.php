<?php

namespace dao;

use Exception;
use PDO;

class DynamicSearchRepository
{
    function dynamicSearch($search, $location, $service, $category)
    {
        global $db;

        $query = "SELECT DISTINCT sp.name, sp.email, l.name as 'location', sp.address, sp.contact_number, sp.website_url, sp.work_time, sp.remark, sp.longitude, sp.latitude, GROUP_CONCAT(s.name) as 'services', GROUP_CONCAT(c.name) as 'categories', c.id, sp.id, s.id
        FROM service s
        INNER JOIN service_provider_service sps ON sps.service_id = s.id
        INNER JOIN service_provider sp ON sp.id = sps.service_provider_id
        INNER JOIN location l ON l.id = sp.location
        INNER JOIN service_provider_category spc ON spc.service_provider_id = sp.id
        INNER JOIN category c ON c.id = spc.category_id";

        $conditions = [];
        $parameters = [];

        if (isset($search) && strlen($search) > 0) {
            $conditions[] = "(sp.name LIKE ? OR sp.email LIKE ? OR l.name LIKE ? OR sp.address LIKE ? OR sp.contact_number LIKE ? OR sp.website_url LIKE ? OR sp.remark LIKE ? OR s.name LIKE ? OR c.name LIKE ?)";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
            $parameters[] = "%$search%";
        }

        if (isset($location) && $location != "all") {
            $conditions[] = "l.id = ?";
            $parameters[] = $location;
        }

        if (isset($service) && $service != "all") {
            $conditions[] = "s.id = ?";
            $parameters[] = $service;
        }

        if (isset($category) && $category != "all") {
            $conditions[] = "c.id = ?";
            $parameters[] = $category;
        }

        if (empty($conditions)) {
            $query .= " WHERE 1";
        } else {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $query .= " GROUP BY sp.name";

        $statement = $db->prepare($query);
        $statement->execute($parameters);
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    function getAllDataFromDb()
    {
        global $db;

        $query = "SELECT DISTINCT sp.name, sp.email, l.name as 'location', sp.address, sp.contact_number, sp.website_url, sp.work_time, sp.remark, sp.longitude, sp.latitude, GROUP_CONCAT(s.name) as 'services', GROUP_CONCAT(c.name) as 'categories', c.id, sp.id, s.id
        FROM service s
        INNER JOIN service_provider_service sps ON sps.service_id = s.id
        INNER JOIN service_provider sp ON sp.id = sps.service_provider_id
        INNER JOIN location l ON l.id = sp.location
        INNER JOIN service_provider_category spc ON spc.service_provider_id = sp.id
        INNER JOIN category c ON c.id = spc.category_id
        GROUP BY sp.name";

        try{
            $statement = $db->prepare($query);
            if ($statement->execute()) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        }catch(Exception $e){
            error_log('could not find service');
            return null;
        }
    }
}