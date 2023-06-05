<?php

namespace dao;

use entity\ServiceProviderServiceEntity;
use Exception;
use mapper\ServiceProviderServiceMapper;
use PDO;

require_once '../../rest/mapper/ServiceProviderServiceMapper.php';

class ServiceProviderServiceDao{

    private ServiceProviderServiceMapper $serviceProviderServiceMapper;

    public function __construct(ServiceProviderServiceMapper $serviceProviderServiceMapper) {
        $this->serviceProviderServiceMapper = $serviceProviderServiceMapper;
    }

    public function getServiceProviderServiceById(int $id): ?ServiceProviderServiceEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM service_provider_service WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceProviderServiceMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find serviceProviderService {}', $id, $e);
            return null;
        }
    }

    public function listServiceProviderServices(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM service_provider_service';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->serviceProviderServiceMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find serviceProviderService', $e);
            return null;
        }
    }

    public function insertServiceProviderService($serviceProviderId, ServiceProviderServiceEntity $serviceProviderService): ?ServiceProviderServiceEntity
    {
        global $db;
        try{
            $statement = $db -> prepare('INSERT INTO service_provider_service (service_provider_id,service_id) 
            VALUES (:service_provider,:service)');


            $db -> beginTransaction();

            $statement -> execute ([':service_provider'=>$serviceProviderId, ':service'=>$serviceProviderService->getService()]);

            $db->commit();

            $serviceProviderServiceId = $db->lastInsertId();
            $serviceProviderService->setId($serviceProviderServiceId);

            return $serviceProviderService;
        }catch(Exception $e){
            $db->rollBack();
            error_log('could not create serviceProviderService {}', $serviceProviderService->getId(), $e);
			return null;
        }
    }

    public function updateServiceProviderService(int $serviceProviderId, ServiceProviderServiceEntity $serviceProviderService): ?ServiceProviderServiceEntity
    {
        global $db;
        try{
            $statement = $db -> prepare('UPDATE service_provider_service SET
            service_provider_id = :service_provider,
            service_id = :service,
            WHERE service_provider_id = :service_provider');

            $db->beginTransaction();

            $statement -> execute ([':service_provider'=>$serviceProviderId, ':service'=>$serviceProviderService->getService()]);

            $db->commit();
            return $serviceProviderService;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not update serviceProviderService {}', $serviceProviderService->getId(), $e);
			return null;
        }
    }

    public function deleteServiceProviderService(int $serviceProviderId): bool
    {
        global $db;
        try{
            $statement = $db -> prepare ('DELETE FROM service_provider_service
            WHERE service_provider_id = :serviceProviderId ');

            $db->beginTransaction();
            $statement -> execute ([':serviceProviderId'=>$serviceProviderId]);

            $db->commit();
            return true;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not delete user {}', $serviceProviderId, $e);
            return false;
        }
    }
}
?>