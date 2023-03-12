<?php

namespace entity;

abstract class AbstractEntity{
    private int $id;

    private String $created;

	private String $lastModified;

    /**
     * @return String
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param String $created
     */
    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    /**
     * @return String
     */
    public function getLastModified(): string
    {
        return $this->lastModified;
    }

    /**
     * @param String $lastModified
     */
    public function setLastModified(string $lastModified): void
    {
        $this->lastModified = $lastModified;
    }


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
}
?>