<?php
class ServiceProviderServiceMapper {
    public function toEntity($row){
        $serviceProviderService = new ServiceProviderServiceEntity();
        $serviceProviderService->setId($row['id']);
        $serviceProviderService->setCreated($row['created']);
        $serviceProviderService->setLastModified($row['last_modified']);
        $serviceProviderService->setServiceProvider($row['service_provider']);
        $serviceProviderService->setService($row['service']);

        return $serviceProviderService;
    }
}
?>