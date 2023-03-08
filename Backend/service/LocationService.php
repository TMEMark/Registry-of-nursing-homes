<?php
include_once(__DIR__.'../../persistance/dao/LocationDao.php');
include_once(__DIR__.'../../persistance/entity/LocationEntity.php');
class LocationService{
    private LocationDao $locationDao;

    public function __construct(LocationDao $locationDao) {
        $this->locationDao = $locationDao;
    }

    /**
     * @throws Exception
     */
    public function getLocationById(int $id) {
        syslog(LOG_INFO, 'getting location');
        $locationDao = $this->locationDao->getLocationById($id);
        if(empty($locationDao)){
            syslog(LOG_INFO, 'no location found');
            throw new Exception('no location found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'location found');
            return $locationDao;
        }
    }

    public function getLocationByName(String $name){
        syslog(LOG_INFO, 'getting location');
        $locationDao = $this->locationDao->getLocationByName($name);
        if(empty($locationDao)){
            syslog(LOG_INFO, 'no location found');
            throw new Exception('no location found with name {}', $name);
        }else{
            syslog(LOG_INFO, 'location found');
            return $locationDao;
        }
    }

    public function listLocations(){
        syslog(LOG_INFO, 'getting locations');
       $locationDaoList = $this->locationDao->listLocations();
       if(empty($locationDaoList)){
        syslog(LOG_INFO, 'could not list locations');
        throw new Exception('could not list locations');
       }else{
        syslog(LOG_INFO, 'locations found');
        return $locationDaoList;
       }
    }

    public function insertLocation(LocationEntity $location){
        syslog(LOG_INFO, 'creating location');
        $locationDaoInsert = $this->locationDao->insertLocation($location);
        if($locationDaoInsert == null){
            syslog(LOG_INFO, 'could not create location');
            throw new Exception('could not create location');
        }else{
            syslog(LOG_INFO, 'location created');
            return $locationDaoInsert;
        }
    }

    public function updateLocation(LocationEntity $location){
        syslog(LOG_INFO, 'updating location');
        $locationId = $location->getId();
        $locationDaoGetById = $this->locationDao->getLocationById($locationId);
        syslog(LOG_INFO, 'getting location');
        if(empty($locationDaoGetById)){
            syslog(LOG_INFO, 'location not found');
            throw new Exception('no location found with id {}', $locationId);
        }else{
            $locationDao = $this->locationDao->updateLocation($location);
            if($locationDao == null){
                syslog(LOG_INFO, 'could not update location');
                throw new Exception('could not update location');
            }else{
                syslog(LOG_INFO, 'location updated successfully');
                return $locationDao;
            }
        }
    }

    public function deleteLocation(int $id){
        syslog(LOG_INFO, 'deleting location');
        $locationDaoDeleted = $this->locationDao->deleteLocation($id);
        if($locationDaoDeleted == false){
            syslog(LOG_ERR, 'could not delete location');
            throw new Exception('could not delete location');
        }else{
            syslog(LOG_INFO, 'location deleted');
        }
    }
}

?>