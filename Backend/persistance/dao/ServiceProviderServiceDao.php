<?php
include_once(__DIR__.'../../mapper/ServiceProviderServiceMapper.php');
include_once(__DIR__."../../entity/ServiceProviderServiceEntity.php");
class ServiceProviderServiceDao{

    private ServiceProviderServiceMapper $serviceProviderServiceMapper;

    public function __construct(ServiceProviderServiceMapper $serviceProviderServiceMapper) {
        $this->serviceProviderServiceMapper = $serviceProviderServiceMapper;
    }

    public function getServiceProviderServiceById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM "service_provider_service" WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->serviceProviderServiceMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find serviceProviderService {}', $id, $e);
			return null;
        }
    }

    public function listServiceProviderServices(){
        global $db;
        $sql = 'SELECT * FROM "service_provider_service"';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->serviceProviderServiceMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find serviceProviderService', $e);
			return null;
        }
    }

    public function insertServiceProviderService($id, ServiceProviderServiceEntity $serviceProviderService){
        global $db;
        try{
            $idService =  abs( crc32( uniqid() ) );
            $db -> query = 
            'INSERT INTO "service_provider_service" (id,service_provider_id,"service_id") 
            VALUES (:id,:"service_provider",:"service")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $idService);
            $statement->bindValue(':"service_provider"', $id);
            $statement->bindValue(':"service"', $serviceProviderService->getService());
            $statement->execute();
            $statement->closeCursor();

            return $serviceProviderService;
        }catch(Exception $e){
            error_log('could not create serviceProviderService {}', $serviceProviderService->getId(), $e);
			return null;
        }
    }

    public function updateServiceProviderService(ServiceProviderServiceEntity $serviceProviderService){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE "service_provider_service" SET
            "service_provider_id" = :"service_provider",
            "service_id" = :"service",
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $serviceProviderService->getId());
            $statement->bindValue(':"service_provider"', $serviceProviderService->getServiceProvider());
            $statement->bindValue(':"service"', $serviceProviderService->getService());
            $statement->closeCursor();

            $db->commit();
            return $serviceProviderService;
        }catch(Exception $e){
            error_log('could not update serviceProviderService {}', $serviceProviderService->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteServiceProviderService(int $id){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM "service_provider_service"
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete serviceProviderService {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>