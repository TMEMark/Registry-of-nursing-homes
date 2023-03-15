<?php

namespace dao;

use entity\ServiceEntity;
use Exception;
use mapper\ServiceMapper;
use PDO;

include_once(__DIR__.'../../mapper/ServiceMapper.php');
include(__DIR__."../../entity/ServiceEntity.php");
class ServiceDao{
    private ServiceMapper $serviceMapper;

    public function __construct(ServiceMapper $serviceMapper) {
        $this->serviceMapper = $serviceMapper;
    }

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
			return null;
        }
    }

    public function getServiceByName(String $name): ?ServiceEntity
    {
        global $db;
        $sql = 'SELECT * FROM service WHERE name = :"name"';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find service {}', $name, $e);
			return null;
        }
    }

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

    public function insertService(serviceEntity $service): ?ServiceEntity
    {
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $db->beginTransaction();
            $db -> query = 
            'INSERT INTO "service" (id,"name") 
            VALUES (:id,:"name")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':name', $service->getName());
            $statement->closeCursor();

            $db->commit();
            return $service;
        }catch(Exception $e){
            error_log('could not create service {}', $service->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateService(serviceEntity $service): ?ServiceEntity
    {
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE "service" SET
            "name" = :"name",
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $service->getId());
            $statement->bindValue(':"name"', $service->getName());
            $statement->closeCursor();

            $db->commit();
            return $service;
        }catch(Exception $e){
            error_log('could not update service {}', $service->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteService(int $id): bool
    {
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM "service"
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

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