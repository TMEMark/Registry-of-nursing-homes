<?php
include('../mapper/ServiceProviderCategoryMapper.php');
include("../entity/ServiceProviderCategoryEntity.php");
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

    public function listServiceProviderCategorys(){
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

    public function insertServiceProviderCategory(ServiceProviderCategoryEntity $serviceProviderCategory){
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $db->beginTransaction();
            $db -> query = 
            'INSERT INTO "service_provider_category" (id,service_provider_id,"category_id") 
            VALUES (:id,:"service_provider",:"category")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':"service_provider"', $serviceProviderCategory->getServiceProvider());
            $statement->bindValue(':"category"', $serviceProviderCategory->getCategory());
            $statement->closeCursor();

            $db->commit();
            return $serviceProviderCategory;
        }catch(Exception $e){
            error_log('could not create serviceProviderCategory {}', $serviceProviderCategory->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateServiceProviderCategory(ServiceProviderCategoryEntity $serviceProviderCategory){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE "service_provider_category" SET
            "service_provider_id" = :"service_provider",
            "category_id" = :"category",
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $serviceProviderCategory->getId());
            $statement->bindValue(':"service_provider"', $serviceProviderCategory->getServiceProvider());
            $statement->bindValue(':"category"', $serviceProviderCategory->getCategory());
            $statement->closeCursor();

            $db->commit();
            return $serviceProviderCategory;
        }catch(Exception $e){
            error_log('could not update serviceProviderCategory {}', $serviceProviderCategory->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteServiceProviderCategory(int $id){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM "service_provider_category"
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete serviceProviderCategory {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>