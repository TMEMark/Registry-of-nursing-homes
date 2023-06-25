<?php

namespace entity;

require_once 'AbstractEntity.php';
class CategoryEntity extends AbstractEntity implements \JsonSerializable {
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

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function __toString()
    {
        return $this->name;
    }
}
?>