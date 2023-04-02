<?php

namespace service;

use dao\LocationDao;
use Exception;
use mapper\LocationMapper;

class LocationService{
    private LocationDao $locationDao;

    private LocationMapper $locationMapper;

    public function __construct(LocationDao $locationDao, LocationMapper $locationMapper) {
        $this->locationDao = $locationDao;
        $this->locationMapper = $locationMapper;
    }

    /**
     * @throws Exception
     */
    public function getLocationById(int $id): \dto\LocationDto
    {
        syslog(LOG_INFO, 'getting location');
        $locationDao = $this->locationMapper->toDto($this->locationDao->getLocationById($id));
        if(empty($locationDao)){
            syslog(LOG_INFO, 'no location found');
            throw new Exception('no location found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'location found');
            return $locationDao;
        }
    }

    public function getLocationByName(String $name): \dto\LocationDto
    {
        syslog(LOG_INFO, 'getting location');
        $locationDao = $this->locationMapper->toDto($this->locationDao->getLocationByName($name));
        if(empty($locationDao)){
            syslog(LOG_INFO, 'no location found');
            throw new Exception('no location found with name {}', $name);
        }else{
            syslog(LOG_INFO, 'location found');
            return $locationDao;
        }
    }

    public function listLocations(): array
    {
       syslog(LOG_INFO, 'getting locations');
       $locationDaoList = $this->locationDao->listLocations();
       $locationDTOList = [];
        foreach ($locationDaoList as $location) {
            $locationDTO = $this->locationMapper->toDto($location);
            $locationDTOList[] = $locationDTO;
        }
       if(empty($locationDTOList)){
        syslog(LOG_INFO, 'could not list locations');
        throw new Exception('could not list locations');
       }else{
        syslog(LOG_INFO, 'locations found');
        return $locationDTOList;
       }
    }

    public function insertLocation(array $location){
        syslog(LOG_INFO, 'creating location');
        $location = $this->locationMapper->fromStdClass($location);
        $locationInsert = $this->locationMapper->toDto($this->locationDao->insertLocation($location));
        if($locationInsert == null){
            syslog(LOG_INFO, 'could not create location');
            throw new Exception('could not create location');
        }else{
            syslog(LOG_INFO, 'location created');
            return $locationInsert;
        }
    }

    public function updateLocation(array $location){
        syslog(LOG_INFO, 'updating location');
        $location = $this->locationMapper->updateMapper($location);

        $locationId = $location->getId();
        $locationDaoGetById = $this->locationDao->getLocationById($locationId);
        syslog(LOG_INFO, 'getting location');

        if(empty($locationDaoGetById)){
            syslog(LOG_ERR, 'location not found');
            throw new Exception('no location found with id {}', $locationId);
        }else{
            $locationDao = $this->locationMapper->toDto($this->locationDao->updateLocation($location));
            if($locationDao == null){
                syslog(LOG_ERR, 'could not update location');
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