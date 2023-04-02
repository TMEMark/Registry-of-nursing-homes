<?php

namespace mapper;


use dto\ServiceDto;
use entity\ServiceEntity;

require_once '../../persistance/entity/ServiceEntity.php';
require_once '../dto/ServiceDto.php';

class ServiceMapper
{
    public function toDto(ServiceEntity $serviceEntity): ServiceDto
    {
        $service = new ServiceDto();
        $service->setId($serviceEntity->getId());
        $service->setName($serviceEntity->getName());

        return $service;
    }

    public function toEntity($row)
    {
        $service = new ServiceEntity();
        $service->setId($row['id']);
        $service->setCreated($row['created']);
        $service->setLastModified($row['last_modified']);
        $service->setName($row['name']);

        return $service;
    }

    public static function fromStdClass($row): ServiceEntity
    {
        print_r($row);
        $service = new ServiceEntity();
        $service->setName($row['name']);

        return $service;
    }

    public function updateMapper($row): ServiceEntity
    {
        $service = new ServiceEntity();
        $service->setId($row['id']);
        $service->setName($row['name']);

        return $service;
    }
}

?>