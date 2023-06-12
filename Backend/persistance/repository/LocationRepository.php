<?php

namespace dao;

use entity\LocationEntity;
use Exception;
use mapper\LocationMapper;
use PDO;

require_once '../../rest/mapper/LocationMapper.php';
class LocationRepository{

    private LocationMapper $locationMapper;

    public function __construct(LocationMapper $locationMapper) {
        $this->locationMapper = $locationMapper;
    }

    /**
     * Function getLocationById gets location by id attribute in db
     * @param int $id - $id parameter to get location by
     * @return LocationEntity if location is found in db | null if it is not found
     */
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

    /**
     * Function getLocationByName gets location by name attribute in db
     * @param String $name - $name parameter to get location by
     * @return LocationEntity if location is found in db | null if it is not found
     */
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

    /**
     * Function listLocations gets all locations in db
     * @return array if locations are found | null if they were not found
     */
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

    /**
     * Function insertLocation inserts data in location table in db
     * @param LocationEntity $location - data to be inserted
     * @return LocationEntity if location is inserted successfully | null if it is not
     */
    public function insertLocation(LocationEntity $location): ?LocationEntity
    {
        global $db;
        try{
            $statement = $db -> prepare(
                'INSERT INTO location (name) 
            VALUES (:name)');

            $db -> beginTransaction();

            $statement -> execute ([':name'=>$location->getName()]);

            $db->commit();

            $locationId = $db->lastInsertId();
            $location->setId($locationId);

            return $location;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not create location {}', $location->getId(), $e);
			return null;
        }
    }

    /**
     * Function updateLocation updates data in location table in db
     * @param LocationEntity $location - data to be updated
     * @return LocationEntity if location is updated successfully | null if it is not
     */
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

            return $location;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not update location {}', $location->getId(), $e);
			return null;
        }
    }

    /**
     * Function deleteLocation delete data in location table in database by id
     * @param int $id - $id by which location entry is deleted in db
     * @return bool
     */
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
            $db->rollback();
            error_log('could not delete location {}', $id, $e);
			return false;
        }
    }
}
?>