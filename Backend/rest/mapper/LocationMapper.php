<?php

namespace mapper;
use dto\LocationDto;
use entity\LocationEntity;

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
}

?>