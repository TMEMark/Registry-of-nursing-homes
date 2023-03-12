<?php

namespace mapper;
use entity\LocationEntity;

class LocationMapper
{
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