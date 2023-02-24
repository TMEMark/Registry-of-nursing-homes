<?php
class LocationMapper {
    public function toEntity($row){
        $location = new LocationEntity();
        $location->setId($row['id']);
        $location->setCreated($row['created']);
        $location->setLastModified($row['last_modified']);
        $location->setName($row['name']);

        return $location;
    }
}
?>