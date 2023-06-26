<?php

namespace mapper;


use dto\ServiceProviderCategoryDto;
use entity\ServiceProviderCategoryEntity;

require_once '../../persistance/entity/ServiceProviderCategoryEntity.php';
require_once '../dto/ServiceProviderCategoryDto.php';
class ServiceProviderCategoryMapper
{
    public function toEntity($row): ServiceProviderCategoryEntity
    {
        $serviceProviderCategory = new ServiceProviderCategoryEntity();
        $serviceProviderCategory->setCreated($row['created']);
        $serviceProviderCategory->setLastModified($row['last_modified']);
        $serviceProviderCategory->setServiceProvider($row['service_provider_id']);
        $serviceProviderCategory->setCategory($row['category_id']);

        return $serviceProviderCategory;
    }

    public function toDto(ServiceProviderCategoryEntity $serviceProviderCategoryEntity): ServiceProviderCategoryDto
    {
        $serviceProviderCategoryDto = new ServiceProviderCategoryDto();
        $serviceProviderCategoryDto->setId($serviceProviderCategoryEntity->getId());
        $serviceProviderCategoryDto->setServiceProvider($serviceProviderCategoryEntity->getServiceProvider());
        $serviceProviderCategoryDto->setCategory($serviceProviderCategoryEntity->getCategory());

        return $serviceProviderCategoryDto;
    }

    public function fromStdClass($row): ServiceProviderCategoryEntity
    {
        $serviceProviderCategory = new ServiceProviderCategoryEntity();
        $serviceProviderCategory->setCategory($row['category_id']);

        return $serviceProviderCategory;
    }

}

?>