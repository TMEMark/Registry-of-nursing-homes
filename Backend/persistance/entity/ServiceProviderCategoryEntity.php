<?php

namespace entity;

require_once 'AbstractEntity.php';
class ServiceProviderCategoryEntity extends AbstractEntity{
    private array $serviceProvider = array(ServiceProviderEntity::class);

    private array $category = array(CategoryEntity::class);



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
}
?>