<?php

namespace entity;

require_once 'AbstractEntity.php';
class ServiceProviderServiceEntity extends AbstractEntity{
    public int $serviceProvider;

    public int $service;

    /**
     * @return int
     */
    public function getServiceProvider(): int
    {
        return $this->serviceProvider;
    }

    /**
     * @param int $serviceProvider
     */
    public function setServiceProvider(int $serviceProvider): void
    {
        $this->serviceProvider = $serviceProvider;
    }

    /**
     * @return int
     */
    public function getService(): int
    {
        return $this->service;
    }

    /**
     * @param int $service
     */
    public function setService(int $service): void
    {
        $this->service = $service;
    }
}
?>