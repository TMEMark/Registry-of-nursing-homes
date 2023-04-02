<?php

namespace mapper;
use dto\LocationDto;
use entity\LocationEntity;

require_once '../../persistance/entity/LocationEntity.php';
require_once '../dto/LocationDto.php';

class LocationMapper
{

    public function toDto(LocationEntity $locationEntity): LocationDto
    {
        $location = new LocationDto();
        $location->setId($locationEntity->getId());
        $location->setName($locationEntity->getName());

        return $location;
    }

    public function toEntity($row): LocationEntity
    {
        $location = new LocationEntity();
        $location->setId($row['id']);
        $location->setCreated($row['created']);
        $location->setLastModified($row['last_modified']);
        $location->setName($row['name']);

        return $location;
    }

    public static function fromStdClass($row): LocationEntity
    {
        print_r($row);
        $location = new LocationEntity();
        $location->setName($row['name']);

        return $location;
    }

    public function updateMapper($row): LocationEntity
    {
        $location = new LocationEntity();
        $location->setId($row['id']);
        $location->setName($row['name']);

        return $location;
    }
}

?>