<?php

namespace service;

use dao\CategoryDao;
use dao\ServiceDao;
use dao\ServiceProviderCategoryDao;
use dao\ServiceProviderDao;
use dao\ServiceProviderServiceDao;
use mapper\ServiceProviderMapper;

class ServiceProviderService{

    private ServiceProviderDao $serviceProviderDao;

    private ServiceProviderCategoryDao $serviceProviderCategoryDao;

    private ServiceProviderServiceDao $serviceProviderServiceDao;

    private CategoryDao $categoryDao;

    private ServiceDao $serviceDao;

    private ServiceProviderMapper $serviceProviderMapper;

    public function __construct(ServiceProviderDao $serviceProviderDao, ServiceProviderCategoryDao $serviceProviderCategoryDao,
                                ServiceProviderServiceDao $serviceProviderServiceDao, CategoryDao $categoryDao, ServiceDao $serviceDao, ServiceProviderMapper $serviceProviderMapper) {
        $this->serviceProviderDao = $serviceProviderDao;
        $this->serviceProviderCategoryDao = $serviceProviderCategoryDao;
        $this->serviceProviderServiceDao = $serviceProviderServiceDao;
        $this->categoryDao = $categoryDao;
        $this->serviceDao=$serviceDao;
        $this->serviceProviderMapper=$serviceProviderMapper;
    }

    public function listServiceProviderWithCategoryAndService(){
        $serviceProviderDao = $this->serviceProviderDao->listServiceProviders();
        $serviceProviderDtoList = [];
        foreach ($serviceProviderDao as $service) {
            $serviceProviderDTO = $this->serviceProviderMapper->toDto($service);
            $serviceProviderDtoList = $serviceProviderDTO;
        }
    }

    public function getServiceProviderWithCategoryAndServiceById(){
        $serviceProvider = $this->serviceProviderDao->getServiceProviderById();
        $serviceProviderCategory = $this->serviceProviderCategoryDao->getServiceProviderCategoryById();
        $serviceProviderService = $this->serviceProviderServiceDao->getServiceProviderServiceById();

        $array = [];

        array_push($array, $serviceProvider, $serviceProviderCategory, $serviceProviderService);

        if(empty($array)){
            syslog(LOG_INFO, 'could not find service provider');
            return null;
        }else{
            syslog(LOG_INFO, 'service found');
            return $array;
        }
    }

    public function insertServiceProvider(ServiceProviderEntity $provider, ServiceProviderCategoryEntity $category, ServiceProviderServiceEntity $service){
        global $db;
        $id =  abs( crc32( uniqid() ) );
        $db->beginTransaction();

        $serviceProviderDao = $this->serviceProviderDao->insertServiceProvider($id, $provider);

        $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->insertServiceProviderCategory($id, $category);

        $serviceProviderServiceDao = $this->serviceProviderServiceDao->insertServiceProviderService($id, $service);


        if($serviceProviderDao == null || $serviceProviderServiceDao == null || $serviceProviderCategoryDao == null){
            syslog(LOG_INFO, 'could not create service provider');
            throw new Exception('could not craete service provider');
        }else{
            syslog(LOG_INFO, 'service provider created successfully');
            $db->commitTransaction();
            $array = [];
            return array_push($array, $serviceProviderDao, $serviceProviderCategoryDao, $serviceProviderServiceDao);

        }
    }

    public function updateServiceProvider(int $serviceProviderId, serviceProviderEntity $serviceProviderEntity, ServiceProviderCategoryEntity $serviceProviderCategory, ServiceProviderServiceEntity $serviceProviderService){
        global $db;
        $db->beginTransaction();

        $serviceProviderDao = $this->serviceProviderDao->updateServiceProvider($serviceProviderEntity);

        $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->updateServiceProviderCategory($serviceProviderId, $serviceProviderCategory);

        $serviceProviderServiceDao = $this->serviceProviderServiceDao->updateServiceProviderService($serviceProviderId, $serviceProviderService);
        if($serviceProviderDao == null || $serviceProviderServiceDao == null || $serviceProviderCategoryDao == null){
            syslog(LOG_INFO, 'could not update service provider');
            throw new Exception('could not update service provider');
        }else{
            syslog(LOG_INFO, 'service provider updated successfully');
            $db->commitTransaction();
            $array = [];
            return array_push($array, $serviceProviderDao, $serviceProviderCategoryDao, $serviceProviderServiceDao);
        }


    }

    public function deleteServiceProvider(int $id){

        $serviceProviderDao = $this->serviceProviderDao->deleteServiceProvider($id);

        $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->deleteServiceProviderCategory($id);

        $serviceProviderServiceDao = $this->serviceProviderServiceDao->deleteServiceProviderService($id);

        if(!$serviceProviderDao || !$serviceProviderServiceDao || !$serviceProviderCategoryDao){
            syslog(LOG_INFO, 'could not delete service provider');
            throw new Exception('could not delete service provider');
        }else{
            syslog(LOG_INFO, 'service provider deleted');
            return true;
        }
    }

}
?>