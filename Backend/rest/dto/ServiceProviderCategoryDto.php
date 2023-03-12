<?php

namespace dto;

class ServiceProviderCategoryDto extends AbstractDto
{
    private array $serviceProvider = array(ServiceProviderDto::class);

    private array $category = array(CategoryDto::class);



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
    public function getCategory(): array {
        return $this->category;
    }

    /**
     * @param array $category
     * @return self
     */
    public function setCategory(array $category): self {
        $this->category = $category;
        return $this;
    }

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}