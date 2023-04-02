<?php

namespace entity;

require_once 'AbstractEntity.php';
class ServiceEntity extends AbstractEntity{
    private String $name;

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
}
?>