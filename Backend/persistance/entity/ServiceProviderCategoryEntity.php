<?php
include_once('AbstractEntity.php');
include_once('ServiceProviderEntity.php');
include_once('CategoryEntity.php');
class ServiceProviderCategoryEntity extends AbstractEntity{
    private Array $serviceProvider = array(ServiceProviderEntity::class);

    private Array $category = array(CategoryEntity::class);



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