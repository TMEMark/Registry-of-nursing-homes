<?php

namespace dao;

use entity\ServiceProviderCategoryEntity;
use Exception;
use mapper\ServiceProviderCategoryMapper;
use PDO;

require_once '../../rest/mapper/ServiceProviderCategoryMapper.php';
class ServiceProviderCategoryRepository{

    private ServiceProviderCategoryMapper $serviceProviderCategoryMapper;

    public function __construct(ServiceProviderCategoryMapper $serviceProviderCategoryMapper) {
        $this->serviceProviderCategoryMapper = $serviceProviderCategoryMapper;
    }

    /**
     * @param int $id
     * @return ServiceProviderCategoryEntity|null
     */
    public function getServiceProviderCategoryById(int $id): ?ServiceProviderCategoryEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM service_provider_category WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->serviceProviderCategoryMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find serviceProviderCategory {}', $id, $e);
			return null;
        }
    }

    public function listServiceProviderCategories(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM service_provider_category';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->serviceProviderCategoryMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find serviceProviderCategory', $e);
			return null;
        }
    }

    public function insertServiceProviderCategory($id, ServiceProviderCategoryEntity $serviceProviderCategory, $db): ?ServiceProviderCategoryEntity
    {
        try {
            $statement = $db->prepare('INSERT INTO service_provider_category (service_provider_id, category_id) VALUES (:service_provider, :category)');
            $statement->execute(['service_provider' => $id, 'category' => $serviceProviderCategory->getCategory()]);

            $serviceProviderCategoryId = $db->lastInsertId();
            $serviceProviderCategory->setId($serviceProviderCategoryId);

            return $serviceProviderCategory;
        } catch (Exception $e) {
            error_log('Could not create serviceProviderCategory ' . $serviceProviderCategory->getId() . ': ' . $e->getMessage());
            return null;
        }
    }

    public function updateServiceProviderCategory(int $id, ServiceProviderCategoryEntity $serviceProviderCategory, $db): ?ServiceProviderCategoryEntity
    {
        try{
            $statement = $db -> prepare('UPDATE service_provider_category SET
            category_id = :category
            WHERE service_provider_id = :service_provider_id');

            $statement -> execute ([':service_provider_id'=>$id, ':category'=>$serviceProviderCategory->getCategory()]);

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
            $statement = $db -> prepare ('DELETE FROM service_provider_category
            WHERE service_provider_id = :serviceProviderId ');

            $statement -> execute ([':serviceProviderId'=>$serviceProviderId]);

            return true;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not delete user {}', $serviceProviderId, $e);
            return false;
        }
    }
}
?>