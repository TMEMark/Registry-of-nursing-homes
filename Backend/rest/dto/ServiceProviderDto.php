<?php

namespace dto;

require_once 'AbstractDto.php';
class ServiceProviderDto extends AbstractDto
{
    private String $name;

    private String $email;

    private String $contactNumber;

    private String $adress;

    private int $adressNumber;

    private String $workTime;

    private String $websiteUrl;

    private String $remark;

    private String $longitude;

    private String $latitude;

    public int $location;

    private String $oib;

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

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactNumber(): string {
        return $this->contactNumber;
    }

    /**
     * @param string $contactNumber
     * @return self
     */
    public function setContactNumber(string $contactNumber): self {
        $this->contactNumber = $contactNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdress(): string {
        return $this->adress;
    }

    /**
     * @param string $adress
     * @return self
     */
    public function setAdress(string $adress): self {
        $this->adress = $adress;
        return $this;
    }

    /**
     * @return int
     */
    public function getAdressNumber(): int {
        return $this->adressNumber;
    }

    /**
     * @param int $adressNumber
     * @return self
     */
    public function setAdressNumber(int $adressNumber): self {
        $this->adressNumber = $adressNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkTime(): string {
        return $this->workTime;
    }

    /**
     * @param string $workTime
     * @return self
     */
    public function setWorkTime(string $workTime): self {
        $this->workTime = $workTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl(): string {
        return $this->websiteUrl;
    }

    /**
     * @param string $websiteUrl
     * @return self
     */
    public function setWebsiteUrl(string $websiteUrl): self {
        $this->websiteUrl = $websiteUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemark(): string {
        return $this->remark;
    }

    /**
     * @param string $remark
     * @return self
     */
    public function setRemark(string $remark): self {
        $this->remark = $remark;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude(): string {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return self
     */
    public function setLongitude(string $longitude): self {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude(): string {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return self
     */
    public function setLatitude(string $latitude): self {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return String
     */
    public function getOib(): string
    {
        return $this->oib;
    }

    /**
     * @param String $oib
     */
    public function setOib(string $oib): void
    {
        $this->oib = $oib;
    }


    /**
     * @return int
     */
    public function getLocation(): int
    {
        return $this->location;
    }

    /**
     * @param int $location
     */
    public function setLocation(int $location): void
    {
        $this->location = $location;
    }


    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}