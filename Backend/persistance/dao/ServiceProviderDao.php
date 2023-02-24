<?php
class ServiceProviderDao{
    private final ServiceProviderMapper $serviceProviderMapper;

    public function __construct(ServiceProviderMapper $serviceProviderMapper) {
        $this->serviceProviderMapper = $serviceProviderMapper;
    }

    
}
?>