<?php
include_once(__DIR__.'../../mapper/ServiceProviderCategoryMapper.php');
include_once(__DIR__."../../entity/ServiceProviderCategoryEntity.php");
class ServiceProviderCategoryDao{

    private ServiceProviderCategoryMapper $serviceProviderCategoryMapper;

    public function __construct(ServiceProviderCategoryMapper $serviceProviderCategoryMapper) {
        $this->serviceProviderCategoryMapper = $serviceProviderCategoryMapper;
    }

    public function getServiceProviderCategoryById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM "service_provider_category" WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->serviceProviderCategoryMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find serviceProviderCategory {}', $id, $e);
			return null;
        }
    }

    public function listServiceProviderCategories(){
        global $db;
        $sql = 'SELECT * FROM "service_provider_category"';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->serviceProviderCategoryMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find serviceProviderCategory', $e);
			return null;
        }
    }

    public function insertServiceProviderCategory($id, ServiceProviderCategoryEntity $serviceProviderCategory): ?ServiceProviderCategoryEntity
    {
        global $db;
        try{
            $idServiceCat =  abs( crc32( uniqid() ) );
            $db -> query = 
            'INSERT INTO "service_provider_category" (id,service_provider_id,"category_id") 
            VALUES (:id,:"service_provider",:"category")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $idServiceCat);
            $statement->bindValue(':"service_provider"', $id);
            $statement->bindValue(':"category"', $serviceProviderCategory->getCategory());
            $statement->execute();
            $statement->closeCursor();

            return $serviceProviderCategory;
        }catch(Exception $e){
            error_log('could not create serviceProviderCategory {}', $serviceProviderCategory->getId(), $e);
			return null;
        }
    }

    public function updateServiceProviderCategory(int $serviceProviderId, ServiceProviderCategoryEntity $serviceProviderCategory): ?ServiceProviderCategoryEntity
    {
        global $db;
        try{
            $db -> query =
            'UPDATE "service_provider_category" SET
            "service_provider_id" = :"service_provider_id",
            "category_id" = :"category",
            WHERE service_provider_id = :service_provider_id';
            $statement = $db->prepare($db);
            $statement->bindValue(':service_provider_id', $serviceProviderId);
            $statement->bindValue(':"service_provider"', $serviceProviderCategory->getServiceProvider());
            $statement->bindValue(':"category"', $serviceProviderCategory->getCategory());
            $statement->execute();
            $statement->closeCursor();

            return $serviceProviderCategory;
        }catch(Exception $e){
            error_log('could not update serviceProviderCategory {}', $serviceProviderCategory->getId(), $e);
			return null;
        }
    }

    public function deleteServiceProviderCategory(int $serviceProviderId): bool
    {
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM "service_provider_category"
            WHERE service_provider_id = :service_provider_id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':service_provider_id', $serviceProviderId);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete serviceProviderCategory {}', $serviceProviderId, $e);
            $db->rollback();
			return false;
        }
    }
}
?>