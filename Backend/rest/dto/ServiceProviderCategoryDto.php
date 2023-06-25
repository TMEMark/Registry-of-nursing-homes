<?php

namespace dto;

require_once 'AbstractDto.php';
class ServiceProviderCategoryDto extends AbstractDto
{
    private int $serviceProvider;

    private int $category;

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
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}