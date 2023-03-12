<?php

namespace mapper;
use entity\ServiceProviderServiceEntity;

class ServiceProviderServiceMapper
{
    public function toEntity($row)
    {
        $serviceProviderService = new ServiceProviderServiceEntity();
        $serviceProviderService->setId($row['id']);
        $serviceProviderService->setCreated($row['created']);
        $serviceProviderService->setLastModified($row['last_modified']);
        $serviceProviderService->setServiceProvider($row['service_provider_id']);
        $serviceProviderService->setService($row['service_id']);

        return $serviceProviderService;
    }
}

?>