<?php

namespace dao;

use entity\ServiceEntity;
use Exception;
use mapper\ServiceMapper;
use PDO;

require_once '../../rest/mapper/ServiceMapper.php';
class ServiceDao{
    private ServiceMapper $serviceMapper;

    public function __construct(ServiceMapper $serviceMapper) {
        $this->serviceMapper = $serviceMapper;
    }

    /**
     * Function getServiceById gets service by id attribute in db
     * @param int $id $id parameter to get service by
     * @return ServiceEntity if service is found in db | null if it is not found
     */
    public function getServiceById(int $id): ?ServiceEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM service WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find service');
			return null;
        }
    }

    /**
     * Function getServiceByName gets service by name attribute in db
     * @param String $name - $name parameter to get service by
     * @return ServiceEntity if service is found in db | null if it is not found
     */
    public function getServiceByName(String $name): ?ServiceEntity
    {
        global $db;
        $sql = 'SELECT * FROM service WHERE name = :name';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find service');
			return null;
        }
    }

    /**
     * Function listServices gets all services in db
     * @return array if services are found | null if they were not found
     */
    public function listServices(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM service';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->serviceMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find service');
			return null;
        }
    }

    /**
     * Function insertService inserts data into service table in database
     * @param ServiceEntity $service - data to be inserted
     * @return ServiceEntity if service is inserted successfully | null if it is not
     */
    public function insertService(ServiceEntity $service): ?ServiceEntity
    {
        global $db;
        try{

            $statement = $db -> prepare ('INSERT INTO service (name) 
            VALUES (:name)');

            $db->beginTransaction();

            $statement -> execute ([':name'=>$service->getName()]);

            $db->commit();

            $serviceId = $db->lastInsertId();
            $service->setId($serviceId);

            return $service;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not create service {}', $service->getId(), $e);
			return null;
        }
    }

    /**
     * Function updateService updates data in service table in database by id
     * @param ServiceEntity $service - data to be updated
     * @return ServiceEntity if service is updated successfully | null if it is not
     */
    public function updateService(serviceEntity $service): ?ServiceEntity
    {
        global $db;
        try{

            $statement = $db -> prepare (
                'UPDATE service SET
                    name = :name
            WHERE id = :id');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$service->getId(), ':name'=>$service->getName()]);

            $db->commit();

            return $service;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not update service {}', $service->getId(), $e);
			return null;
        }
    }

    /**
     * Function deleteService delete data in service table in database by id
     * @param int $id - $id by which service entry is deleted in db
     * @return bool
     */
    public function deleteService(int $id): bool
    {
        global $db;
        try{
            $statement = $db -> prepare ('DELETE FROM service
            WHERE id = :id ');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$id]);

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete service {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>