<?php

namespace dto;

class ServiceProviderServiceDto extends AbstractDto
{
    public array $serviceProvider = array(ServiceProviderEntity::class);

    public array $service = array(ServiceEntity::class);

    /**
     * @return array
     */
    public function getServiceProvider(): array {
        return $this->serviceProvider;
    }

    /**
     * @param array $serviceProvider
     * @return self
     */
    public function setServiceProvider(array $serviceProvider): self {
        $this->serviceProvider = $serviceProvider;
        return $this;
    }

    /**
     * @return array
     */
    public function getService(): array {
        return $this->service;
    }

    /**
     * @param array $service
     * @return self
     */
    public function setService(array $service): self {
        $this->service = $service;
        return $this;
    }

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}