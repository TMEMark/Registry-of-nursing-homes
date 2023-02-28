<?php
class ServiceProviderCategoryMapper {
    public function toEntity($row){
        $serviceProviderCategory = new ServiceProviderCategoryEntity();
        $serviceProviderCategory->setId($row['id']);
        $serviceProviderCategory->setCreated($row['created']);
        $serviceProviderCategory->setLastModified($row['last_modified']);
        $serviceProviderCategory->setServiceProvider($row['service_provider_id']);
        $serviceProviderCategory->setCategory($row['category_id']);

        return $serviceProviderCategory;
    }
}
?>