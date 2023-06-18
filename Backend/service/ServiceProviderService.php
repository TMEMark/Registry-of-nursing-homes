<?php

namespace service;

use dao\CategoryRepository;
use dao\LocationRepository;
use dao\ServiceRepository;
use dao\ServiceProviderCategoryRepository;
use dao\ServiceProviderRepository;
use dao\ServiceProviderServiceRepository;
use Exception;
use mapper\CategoryMapper;
use mapper\LocationMapper;
use mapper\ServiceMapper;
use mapper\ServiceProviderCategoryMapper;
use mapper\ServiceProviderMapper;
use mapper\ServiceProviderServiceMapper;

class ServiceProviderService{

    private ServiceProviderRepository $serviceProviderDao;

    private ServiceProviderCategoryRepository $serviceProviderCategoryDao;

    private ServiceProviderServiceRepository $serviceProviderServiceDao;




    public function __construct(ServiceProviderRepository        $serviceProviderDao, ServiceProviderCategoryRepository $serviceProviderCategoryDao,
                                ServiceProviderServiceRepository $serviceProviderServiceDao) {
        $this->serviceProviderDao = $serviceProviderDao;
        $this->serviceProviderCategoryDao = $serviceProviderCategoryDao;
        $this->serviceProviderServiceDao = $serviceProviderServiceDao;
    }



    public function listServiceProviderWithCategoryAndService(): array
    {
        $serviceProviderDao = $this->serviceProviderDao->listServiceProviders();

        if (empty($serviceProviderDao)) {
            syslog(LOG_INFO, 'No service provider found');
            throw new Exception('No service provider found');
        }else{
            return $serviceProviderDao;
        }
    }

    public function getServiceProviderWithCategoryAndServiceById($id): \entity\ServiceProviderEntity
    {
        $serviceProviderDao = $this->serviceProviderDao->getServiceProviderById($id);

        if (empty($serviceProviderDao)) {
            syslog(LOG_INFO, 'No service provider found');
            throw new Exception('No service provider found');
        }else{
            return $serviceProviderDao;
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