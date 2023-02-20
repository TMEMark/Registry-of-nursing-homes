<?php
abstract class AbstractEntity{
    private int $id;

    private int $created;

	private int $lastModified;


	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCreated(): int {
		return $this->created;
	}
	
	/**
	 * @param int $created 
	 * @return self
	 */
	public function setCreated(int $created): self {
		$this->created = $created;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLastModified(): int {
		return $this->lastModified;
	}
	
	/**
	 * @param int $lastModified 
	 * @return self
	 */
	public function setLastModified(int $lastModified): self {
		$this->lastModified = $lastModified;
		return $this;
	}
}
?>