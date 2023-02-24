<?php
include('../mapper/LocationMapper.php');
include("../entity/LocationEntity.php");
class LocationDao{

    private final LocationMapper $locationMapper;

    public function __construct(LocationMapper $locationMapper) {
        $this->locationMapper = $locationMapper;
    }
    
    public function getLocationById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM "location" WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->locationMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find location {}', $id, $e);
			return null;
        }
    }

    public function getLocationByName(String $name){
        global $db;
        $sql = 'SELECT * FROM "location" WHERE name = :"name"';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->locationMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find location {}', $name, $e);
			return null;
        }
    }

    public function listLocations(){
        global $db;
        $sql = 'SELECT * FROM "location"';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->locationMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find location', $e);
			return null;
        }
    }

    public function insertLocation(LocationEntity $location){
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $db->beginTransaction();
            $db -> query = 
            'INSERT INTO "location" (id,"name") 
            VALUES (:id,:"name")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':name', $location->getName());
            $statement->closeCursor();

            $db->commit();
            return $location;
        }catch(Exception $e){
            error_log('could not create location {}', $location->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateLocation(LocationEntity $location){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE "location" SET
            "name" = :"name",
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $location->getId());
            $statement->bindValue(':"name"', $location->getName());
            $statement->closeCursor();

            $db->commit();
            return $location;
        }catch(Exception $e){
            error_log('could not update location {}', $location->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteLocation(int $id){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM "location"
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete location {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>