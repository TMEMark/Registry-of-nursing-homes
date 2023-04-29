<?php

namespace entity;

require_once 'AbstractEntity.php';
class UserEntity extends AbstractEntity{

    private String $firstname;

    private String $lastname;

    private String $username;

    private String $password;

    private int $role;

	/**
	 * @return string
	 */
	public function getFirstname(): string {
		return $this->firstname;
	}
	
	/**
	 * @param string $firstname 
	 * @return self
	 */
	public function setFirstname(string $firstname): self {
		$this->firstname = $firstname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastname(): string {
		return $this->lastname;
	}
	
	/**
	 * @param string $lastname 
	 * @return self
	 */
	public function setLastname(string $lastname): self {
		$this->lastname = $lastname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string {
		return $this->username;
	}
	
	/**
	 * @param string $username 
	 * @return self
	 */
	public function setUsername(string $username): self {
		$this->username = $username;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string {
		return $this->password;
	}
	
	/**
	 * @param string $password 
	 * @return self
	 */
	public function setPassword(string $password): self {
		$this->password = $password;
		return $this;
	}

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
    }


}
?>