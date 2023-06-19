<?php

namespace entity;

require_once 'AbstractEntity.php';
class ServiceProviderCategoryEntity extends AbstractEntity{
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

}
?>