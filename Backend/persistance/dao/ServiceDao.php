<?php
include_once(__DIR__.'../../mapper/ServiceMapper.php');
include(__DIR__."../../entity/ServiceEntity.php");
class ServiceDao{
    private ServiceMapper $serviceMapper;

    public function __construct(ServiceMapper $serviceMapper) {
        $this->serviceMapper = $serviceMapper;
    }

    public function getServiceById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM "service" WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->serviceMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find service {}', $id, $e);
			return null;
        }
    }

    public function getServiceByName(String $name){
        global $db;
        $sql = 'SELECT * FROM "service" WHERE name = :"name"';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->serviceMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find service {}', $name, $e);
			return null;
        }
    }

    public function listServices(){
        global $db;
        $sql = 'SELECT * FROM "service"';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->serviceMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find service', $e);
			return null;
        }
    }

    public function insertService(serviceEntity $service){
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

    public function updateService(serviceEntity $service){
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

    public function deleteService(int $id){
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