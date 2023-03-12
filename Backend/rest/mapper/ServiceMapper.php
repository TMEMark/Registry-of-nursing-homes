<?php

namespace mapper;


use entity\ServiceEntity;

class ServiceMapper
{
    public function toEntity($row)
    {
        $service = new ServiceEntity();
        $service->setId($row['id']);
        $service->setCreated($row['created']);
        $service->setLastModified($row['last_modified']);
        $service->setName($row['name']);

        return $service;
    }
}

?>