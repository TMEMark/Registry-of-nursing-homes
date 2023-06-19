<?php

namespace mapper;

use dto\ServiceProviderDto;
use entity\ServiceProviderEntity;

require_once '../../persistance/entity/ServiceProviderEntity.php';
require_once '../dto/ServiceProviderDto.php';


class ServiceProviderMapper
{
    public function toEntity($row): ServiceProviderEntity
    {
        $serviceProvider = new ServiceProviderEntity();
        $serviceProvider->setId($row['id']);
        $serviceProvider->setCreated($row['created']);
        $serviceProvider->setLastModified($row['last_modified']);
        $serviceProvider->setName($row['name']);
        $serviceProvider->setEmail($row['email']);
        $serviceProvider->setContactNumber($row['contact_number']);
        $serviceProvider->setAdress($row['address']);
        $serviceProvider->setAdressNumber($row['address_number']);
        $serviceProvider->setWorkTime($row['work_time']);
        $serviceProvider->setWebsiteUrl($row['website_url']);
        $serviceProvider->setRemark($row['remark']);
        $serviceProvider->setLongitude($row['longitude']);
        $serviceProvider->setLatitude($row['latitude']);
        $serviceProvider->setLocation($row['location']);
        $serviceProvider->setOib($row['oib']);

        return $serviceProvider;
    }

    public function toDto(ServiceProviderEntity $serviceProviderEntity): ServiceProviderDto
    {
        $serviceProviderDto = new ServiceProviderDto();
        $serviceProviderDto->setId($serviceProviderEntity->getId());
        $serviceProviderDto->setName($serviceProviderEntity->getName());
        $serviceProviderDto->setEmail($serviceProviderEntity->getEmail());
        $serviceProviderDto->setContactNumber($serviceProviderEntity->getContactNumber());
        $serviceProviderDto->setAdress($serviceProviderEntity->getAdress());
        $serviceProviderDto->setAdressNumber($serviceProviderEntity->getAdressNumber());
        $serviceProviderDto->setWorkTime($serviceProviderEntity->getWorkTime());
        $serviceProviderDto->setWebsiteUrl($serviceProviderEntity->getWebsiteUrl());
        $serviceProviderDto->setRemark($serviceProviderEntity->getRemark());
        $serviceProviderDto->setLongitude($serviceProviderEntity->getLongitude());
        $serviceProviderDto->setLatitude($serviceProviderEntity->getLatitude());
        $serviceProviderDto->setLocation($serviceProviderEntity->getLocation());
        $serviceProviderDto->setOib($serviceProviderEntity->getOib());

        return $serviceProviderDto;
    }

    public function fromStdClass($row): ServiceProviderEntity
    {
        $serviceProvider = new ServiceProviderEntity();
        $serviceProvider->setCreated($row['created']);
        $serviceProvider->setLastModified($row['last_modified']);
        $serviceProvider->setName($row['name']);
        $serviceProvider->setEmail($row['email']);
        $serviceProvider->setContactNumber($row['contact_number']);
        $serviceProvider->setAdress($row['address']);
        $serviceProvider->setAdressNumber($row['address_number']);
        $serviceProvider->setWorkTime($row['work_time']);
        $serviceProvider->setWebsiteUrl($row['website_url']);
        $serviceProvider->setRemark($row['remark']);
        $serviceProvider->setLongitude($row['longitude']);
        $serviceProvider->setLatitude($row['latitude']);
        $serviceProvider->setLocation($row['location']);
        $serviceProvider->setOib($row['oib']);

        return $serviceProvider;
    }
}


?>