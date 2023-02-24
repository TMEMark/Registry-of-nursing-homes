<?php
class ServiceDao{
    private final ServiceMapper $serviceMapper;

    public function __construct(ServiceMapper $serviceMapper) {
        $this->serviceMapper = $serviceMapper;
    }
}
?>