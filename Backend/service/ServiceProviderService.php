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

    private CategoryRepository $categoryDao;

    private ServiceRepository $serviceDao;

    private LocationRepository $locationDao;

    private LocationMapper $locationMapper;

    private CategoryMapper $categoryMapper;

    private ServiceMapper $serviceMapper;

    private ServiceProviderCategoryMapper $serviceProviderCategoryMapper;

    private ServiceProviderServiceMapper $serviceProviderServiceMapper;



    public function __construct(ServiceProviderRepository        $serviceProviderDao, ServiceProviderCategoryRepository $serviceProviderCategoryDao,
                                ServiceProviderServiceRepository $serviceProviderServiceDao, CategoryRepository $categoryDao, ServiceRepository $serviceDao,
                                ServiceProviderMapper            $serviceProviderMapper, LocationRepository $locationDao, LocationMapper $locationMapper,
                                CategoryMapper                   $categoryMapper, ServiceMapper $serviceMapper, ServiceProviderCategoryMapper $serviceProviderCategoryMapper,
                                ServiceProviderServiceMapper     $serviceProviderServiceMapper) {
        $this->serviceProviderDao = $serviceProviderDao;
        $this->serviceProviderCategoryDao = $serviceProviderCategoryDao;
        $this->serviceProviderServiceDao = $serviceProviderServiceDao;
        $this->categoryDao = $categoryDao;
        $this->serviceDao=$serviceDao;
        $this->serviceProviderMapper=$serviceProviderMapper;
        $this->locationDao=$locationDao;
        $this->locationMapper=$locationMapper;
        $this->categoryMapper=$categoryMapper;
        $this->serviceMapper=$serviceMapper;
        $this->serviceProviderCategoryMapper=$serviceProviderCategoryMapper;
        $this->serviceProviderServiceMapper=$serviceProviderServiceMapper;

    }

    private ServiceProviderMapper $serviceProviderMapper;

    public function listServiceProviderWithCategoryAndService(): array
    {
        $serviceProviderDao = $this->serviceProviderDao->listServiceProviders();

        if (empty($serviceProviderDao)) {
            syslog(LOG_INFO, 'No service provider found');
            throw new Exception('No service provider found');
        }

        $serviceProviderDtoList = [];
        foreach ($serviceProviderDao as $service) {
            $serviceProviderDTO = $this->serviceProviderMapper->toDto($service);
            $serviceProviderDtoList[] = $serviceProviderDTO;
        }

        $locationDao = $this->locationDao->listLocations();
        if (empty($locationDao)) {
            syslog(LOG_INFO, 'No location found');
            throw new Exception('No location found');
        }

        $locationDTOList = [];
        foreach ($locationDao as $location) {
            $locationDTO = $this->locationMapper->toDto($location);
            $locationDTOList[] = $locationDTO;
        }

        $categoryDao = $this->categoryDao->listCategories();
        if (empty($categoryDao)) {
            syslog(LOG_INFO, 'No location found');
            throw new Exception('No location found');
        }

        $categoryDTOList = [];
        foreach ($categoryDao as $category) {
            $categoryDTO = $this->categoryMapper->toDto($category);
            $categoryDTOList[] = $categoryDTO;
        }

        $serviceDao = $this->serviceDao->listServices();
        if (empty($serviceDao)) {
            syslog(LOG_INFO, 'No location found');
            throw new Exception('No location found');
        }

        $serviceDTOList = [];
        foreach ($serviceDao as $service) {
            $serviceDTO = $this->serviceMapper->toDto($service);
            $serviceDTOList[] = $serviceDTO;
        }

        $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->listServiceProviderCategories();
        if (empty($serviceProviderCategoryDao)) {
            syslog(LOG_INFO, 'No location found');
            throw new Exception('No location found');
        }

        $serviceProviderCategoryDTOList = [];
        foreach ($serviceProviderCategoryDao as $serviceProviderCategory) {
            $serviceProviderCategoryDTO = $this->serviceProviderCategoryMapper->toDto($serviceProviderCategory);
            $serviceProviderCategoryDTOList[] = $serviceProviderCategoryDTO;
        }

        $serviceProviderServiceDao = $this->serviceProviderServiceDao->listServiceProviderServices();
        if (empty($serviceProviderServiceDao)) {
            syslog(LOG_INFO, 'No location found');
            throw new Exception('No location found');
        }

        $serviceProviderServiceDTOList = [];
        foreach ($serviceProviderServiceDao as $serviceProviderService) {
            $serviceProviderServiceDTO = $this->serviceProviderServiceMapper->toDto($serviceProviderService);
            $serviceProviderServiceDTOList[] = $serviceProviderServiceDTO;
        }

        $locationById = [];
        foreach ($locationDTOList as $location) {
            $locationById[$location->id] = $location->name;
        }

        //new array containing data regarding service provider and location name by id in service provider
        foreach ($serviceProviderDtoList as $serviceProvider) {
            $serviceProvider->locationName = $locationById[$serviceProvider->location] ?? 'Unknown';
        }

        //new array containing data from service_provider, location, service_provider_category and service array
        foreach($serviceProviderDtoList as $serviceProviderDtoListItem){
            foreach ($serviceProviderCategoryDTOList as $serviceProviderCategoryDtoListItem){
                if($serviceProviderDtoListItem["id"] == $serviceProviderCategoryDtoListItem["service_provider_id"]){
                    foreach ($categoryDTOList as $categoryDTOListItem){
                        if($categoryDTOListItem["id"] == $serviceProviderCategoryDtoListItem["category_id"]){
                            $result_array[] = array_merge($serviceProviderDtoListItem, $serviceProviderCategoryDtoListItem, $categoryDTOListItem);
                        }
                    }
                }
            }
        }

        return $result_array;
    }

    public function getServiceProviderWithCategoryAndServiceById($id){
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