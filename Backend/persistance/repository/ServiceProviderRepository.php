<?php

namespace dao;

use entity\ServiceProviderEntity;
use Exception;
use mapper\ServiceProviderMapper;
use PDO;

require_once '../../rest/mapper/ServiceProviderMapper.php';

class ServiceProviderRepository{
    private ServiceProviderMapper $serviceProviderMapper;

    public function __construct(ServiceProviderMapper $serviceProviderMapper) {
        $this->serviceProviderMapper = $serviceProviderMapper;
    }

    public function getServiceProviderById(int $id): ?ServiceProviderEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM service_provider WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceProviderMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find service provider');
            return null;
        }
    }

    public function getServiceProviderByName(String $name): ?ServiceProviderEntity
    {
        global $db;
        $sql = 'SELECT * FROM service_provider WHERE name = :name';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceProviderMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find service provider');
            return null;
        }
    }

    public function listServiceProviders(): ?array
    {
        global $db;
        $sql = 'SELECT DISTINCT sp.name, sp.email, l.name, sp.address, sp.contact_number, sp.website_url, sp.work_time, sp.remark, sp.longitude, sp.latitude, GROUP_CONCAT(s.name) as "services", GROUP_CONCAT(c.name) as "categories", c.id, sp.id, s.id
                FROM service s
                INNER JOIN service_provider_service sps ON sps.service_id = s.id
                INNER JOIN service_provider sp ON sp.id = sps.service_id
                INNER JOIN location l ON l.id = sp.location
                INNER JOIN service_provider_category spc ON spc.service_provider_id = sp.id
                INNER JOIN category c ON c.id = spc.category_id
                GROUP BY sp.name';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->serviceProviderMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find service');
            return null;
        }
    }

    public function insertServiceProvider($id, serviceProviderEntity $serviceProvider): ?serviceProviderEntity
    {
        global $db;
        try{

            $statement = $db -> prepare ('INSERT INTO service_provider (name,email,contact_number,adress,adress_number,work_time,website_url,remark,longitude,latitude,location,oib) 
            VALUES (:name,:email,:contact_number,:adress,:adress_number,:work_time,:website_url,:remark,:longitude,:latitude,:location,:oib)');

            $db->beginTransaction();

            $statement -> execute ([':name'=>$serviceProvider->getName(), ':email'=>$serviceProvider->getEmail(), ':contact_number'=>$serviceProvider->getContactNumber(), ':adress'=>$serviceProvider->getAdress(),
                ':adress_number'=>$serviceProvider->getAdressNumber(), ':work_time'=>$serviceProvider->getWorkTime(), ':website_url'=>$serviceProvider->getWebsiteUrl(), ':remark'=>$serviceProvider->getRemark(),
                ':longitude'=>$serviceProvider->getLongitude(), ':latitude'=>$serviceProvider->getLatitude(), ':location'=>$serviceProvider->getLocation(), ':oib'=>$serviceProvider->getOib()]);

            $db->commit();

            $serviceProviderId = $db->lastInsertId();
            $serviceProvider->setId($serviceProviderId);

            return $serviceProvider;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not create service provider {}', $service->getId(), $e);
			return null;
        }
    }

    public function updateServiceProvider(serviceProviderEntity $serviceProvider): ?serviceProviderEntity
    {
        global $db;
        try{

            $statement = $db -> prepare ('UPDATE service_provider SET
            name = :name,
            email = :email,
            contact_number = :contactNumber,
            adress = :adress,
            adress_number = :adressNumber,
            work_time = :workTime,
            website_url = :websiteUrl,
            remark = :remark,
            longitude = :longitude,
            latitude = :latitude,
            location = :location,
            oib = :oib
            WHERE id = :id');

            $db->beginTransaction();

            $statement -> execute ([':id'=>$serviceProvider->getId(),':name'=>$serviceProvider->getName(), ':email'=>$serviceProvider->getEmail(), ':contact_number'=>$serviceProvider->getContactNumber(), ':adress'=>$serviceProvider->getAdress(),
                ':adress_number'=>$serviceProvider->getAdressNumber(), ':work_time'=>$serviceProvider->getWorkTime(), ':website_url'=>$serviceProvider->getWebsiteUrl(), ':remark'=>$serviceProvider->getRemark(),
                ':longitude'=>$serviceProvider->getLongitude(), ':latitude'=>$serviceProvider->getLatitude(), ':location'=>$serviceProvider->getLocation(), ':oib'=>$serviceProvider->getOib()]);

            $db->commit();

            return $serviceProvider;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not update service provider {}', $service->getId(), $e);
			return null;
        }
    }

    public function deleteServiceProvider(int $id): bool
    {
        global $db;
        try{

            $statement = $db -> prepare ('DELETE FROM service_provider
            WHERE id = :id ');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$id]);

            $db->commit();
            return true;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not delete user {}', $id, $e);
            return false;
        }
    }
}
?>