<?php
class ServiceDao{
    private ServiceMapper $serviceMapper;

    public function __construct(ServiceMapper $serviceMapper) {
        $this->serviceMapper = $serviceMapper;
    }
}
?>