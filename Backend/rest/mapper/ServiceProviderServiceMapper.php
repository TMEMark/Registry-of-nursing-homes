<?php

namespace mapper;
use dto\ServiceProviderServiceDto;
use entity\ServiceProviderServiceEntity;

require_once '../../persistance/entity/ServiceProviderServiceEntity.php';
require_once '../dto/ServiceProviderServiceDto.php';
class ServiceProviderServiceMapper
{
    public function toEntity($row): ServiceProviderServiceEntity
    {
        $serviceProviderService = new ServiceProviderServiceEntity();
        $serviceProviderService->setCreated($row['created']);
        $serviceProviderService->setLastModified($row['last_modified']);
        $serviceProviderService->setServiceProvider($row['service_provider_id']);
        $serviceProviderService->setService($row['service_id']);

        return $serviceProviderService;
    }

    public function toDto(ServiceProviderServiceEntity $serviceProviderServiceEntity): ServiceProviderServiceDto
    {
        $serviceProviderServiceDto = new ServiceProviderServiceDto();
        $serviceProviderServiceDto->setId($serviceProviderServiceEntity->getId());
        $serviceProviderServiceDto->setServiceProvider($serviceProviderServiceEntity->getServiceProvider());
        $serviceProviderServiceDto->setService($serviceProviderServiceEntity->getService());

        return $serviceProviderServiceDto;
    }

    public function fromStdClass($row): ServiceProviderServiceEntity
    {
        $serviceProviderService = new ServiceProviderServiceEntity();
        $serviceProviderService->setService($row['service_id']);

        return $serviceProviderService;
    }
}

?>