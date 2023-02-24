<?php
class ServiceProviderMapper {
    public function toEntity($row){
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
}
?>