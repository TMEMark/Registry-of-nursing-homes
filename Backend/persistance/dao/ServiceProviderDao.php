<?php

namespace dao;

use entity\ServiceProviderEntity;
use mapper\ServiceProviderMapper;

include_once(__DIR__.'../../mapper/ServiceProviderMapper.php');
include_once(__DIR__."../../entity/ServiceProviderEntity.php");
class ServiceProviderDao{
    private ServiceProviderMapper $serviceProviderMapper;

    public function __construct(ServiceProviderMapper $serviceProviderMapper) {
        $this->serviceProviderMapper = $serviceProviderMapper;
    }

    public function getServiceProviderById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM "service_provider" WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->serviceProviderMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find service provider {}', $id, $e);
			return null;
        }
    }

    public function getServiceProviderByName(String $name){
        global $db;
        $sql = 'SELECT * FROM "service_provider" WHERE name = :"name"';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->serviceProviderMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find service provider {}', $name, $e);
			return null;
        }
    }

    public function listServiceProviders(){
        global $db;
        $sql = 'SELECT * FROM "service_provider"';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->serviceProviderMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find service provider', $e);
			return null;
        }
    }

    public function insertServiceProvider($id, serviceProviderEntity $service): ?serviceProviderEntity
    {
        global $db;
        try{
            $db -> query = 
            'INSERT INTO "service_provider" (id,"name","email",contact_number,adress,adress_number,work_time,website_url,remark,longitude,latitude,"location",oib) 
            VALUES (:id,:"name",:"email",:contact_number,:adress,:adress_number,:work_time,:website_url,:remark,:longitude,:latitude,:"location",:oib)';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':name', $service->getName());
            $statement->bindValue(':email', $service->getEmail());
            $statement->bindValue(':contact_number', $service->getContactNumber());
            $statement->bindValue(':adress', $service->getAdress());
            $statement->bindValue(':adress_number', $service->getAdressNumber());
            $statement->bindValue(':work_time', $service->getWorkTime());
            $statement->bindValue(':website_url', $service->getWebsiteUrl());
            $statement->bindValue(':remark', $service->getRemark());
            $statement->bindValue(':longitude', $service->getLongitude());
            $statement->bindValue(':latitude', $service->getLatitude());
            $statement->bindValue(':location', $service->getLocation());
            $statement->bindValue(':oib', $service->getOib());
            $statement->execute();
            $statement->closeCursor();

            return $service;
        }catch(Exception $e){
            error_log('could not create service provider {}', $service->getId(), $e);
			return null;
        }
    }

    public function updateServiceProvider(serviceProviderEntity $service): ?serviceProviderEntity
    {
        global $db;
        try{
            $db -> query =
            'UPDATE "service_provider" SET
            "name" = :"name",
            "email" = :"email",
            contact_number = :contactNumber,
            adress = :adress,
            adress_number = :adressNumber,
            work_time = :workTime,
            website_url = :websiteUrl,
            remark = :remark,
            longitude = :longitude,
            latitude = :latitude,
            "location" = :"location",
            oib = :oib
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $service->getId());
            $statement->bindValue(':name', $service->getName());
            $statement->bindValue(':email', $service->getEmail());
            $statement->bindValue(':contact_number', $service->getContactNumber());
            $statement->bindValue(':adress', $service->getAdress());
            $statement->bindValue(':adress_number', $service->getAdressNumber());
            $statement->bindValue(':work_time', $service->getWorkTime());
            $statement->bindValue(':website_url', $service->getWebsiteUrl());
            $statement->bindValue(':remark', $service->getRemark());
            $statement->bindValue(':longitude', $service->getLongitude());
            $statement->bindValue(':latitude', $service->getLatitude());
            $statement->bindValue(':location', $service->getLocation());
            $statement->bindValue(':oib', $service->getOib());
            $statement->execute();
            $statement->closeCursor();

            return $service;
        }catch(Exception $e){
            error_log('could not update service provider {}', $service->getId(), $e);
			return null;
        }
    }

    public function deleteServiceProvider(int $id): bool
    {
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM "service_provider"
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete service provider {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>