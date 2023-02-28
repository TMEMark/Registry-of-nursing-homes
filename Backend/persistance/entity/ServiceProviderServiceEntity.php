<?php
include_once('ServiceProviderEntity.php');
include_once('ServiceEntity.php');
include_once('AbstractEntity.php');
class ServiceProviderServiceEntity extends AbstractEntity{
    private Array $serviceProvider = array(ServiceProviderEntity::class);
    
    private Array $service = array(ServiceEntity::class);

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
}
?>