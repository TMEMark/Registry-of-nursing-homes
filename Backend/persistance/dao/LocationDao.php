<?php

namespace dao;

use entity\LocationEntity;
use Exception;
use mapper\LocationMapper;
use PDO;

require_once '../../rest/mapper/LocationMapper.php';
class LocationDao{

    private LocationMapper $locationMapper;

    public function __construct(LocationMapper $locationMapper) {
        $this->locationMapper = $locationMapper;
    }
    
    public function getLocationById(int $id): ?LocationEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM location WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->locationMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find location {}', $id);
			return null;
        }
    }

    public function getLocationByName(String $name): ?LocationEntity
    {
        global $db;
        $sql = 'SELECT * FROM location WHERE name = :name';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->locationMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find location {}');
			return null;
        }
    }

    public function listLocations(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM location';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->locationMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find location');
			return null;
        }
    }

    public function insertLocation(LocationEntity $location): ?LocationEntity
    {
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{
            $statement = $db -> prepare(
                'INSERT INTO location (id,name) 
            VALUES (:id,:name)');

            $db -> beginTransaction();

            $statement -> execute ([':id'=>$id, ':name'=>$location->getName()]);

            $db->commit();

            $sql = 'SELECT * FROM location WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->locationMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not create location {}', $location->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateLocation(LocationEntity $location): ?LocationEntity
    {
        global $db;
        try{

            $statement = $db -> prepare ('UPDATE location SET
            name = :name
            WHERE id = :id');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$location->getId(), ':name'=>$location->getName()]);

            $db->commit();

            $sql = 'SELECT * FROM location WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $location->getId());
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->locationMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not update location {}', $location->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteLocation(int $id): bool
    {
        global $db;
        try{

            $statement = $db -> prepare ('DELETE FROM location
            WHERE id = :id ');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$id]);

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