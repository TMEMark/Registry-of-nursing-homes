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

            $statement = $db -> prepare ('INSERT INTO service (id,name) 
            VALUES (:id,:name)');

            $db->beginTransaction();

            $statement -> execute ([':id'=>$id, ':name'=>$service->getName()]);

            $db->commit();

            $sql = 'SELECT * FROM service WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceMapper->toEntity($result);
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

            $statement = $db -> prepare (
                'UPDATE service SET
                    name = :name
            WHERE id = :id');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$service->getId(), ':name'=>$service->getName()]);


            $db->commit();

            $sql = 'SELECT * FROM service WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $service->getId());
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceMapper->toEntity($result);
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