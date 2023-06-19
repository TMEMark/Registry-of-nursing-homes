<?php

namespace dto;

require_once 'AbstractDto.php';
class ServiceProviderServiceDto extends AbstractDto
{
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

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}