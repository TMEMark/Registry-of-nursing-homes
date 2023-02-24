<?php
class ServiceProviderDao{
    private ServiceProviderMapper $serviceProviderMapper;

    public function __construct(ServiceProviderMapper $serviceProviderMapper) {
        $this->serviceProviderMapper = $serviceProviderMapper;
    }

    
}
?>