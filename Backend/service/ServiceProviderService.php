<?php

namespace service;

use dao\ServiceProviderCategoryRepository;
use dao\ServiceProviderRepository;
use dao\ServiceProviderServiceRepository;
use Exception;
use mapper\ServiceProviderCategoryMapper;
use mapper\ServiceProviderMapper;
use mapper\ServiceProviderServiceMapper;

class ServiceProviderService{

    private ServiceProviderRepository $serviceProviderDao;

    private ServiceProviderCategoryRepository $serviceProviderCategoryDao;

    private ServiceProviderServiceRepository $serviceProviderServiceDao;

    private ServiceProviderMapper $serviceProviderMapper;

    private ServiceProviderServiceMapper $serviceProviderServiceMapper;

    private ServiceProviderCategoryMapper $serviceProviderCategoryMapper;




    public function __construct(ServiceProviderRepository        $serviceProviderDao, ServiceProviderCategoryRepository $serviceProviderCategoryDao,
                                ServiceProviderServiceRepository $serviceProviderServiceDao, ServiceProviderMapper $serviceProviderMapper,
                                ServiceProviderServiceMapper $serviceProviderServiceMapper, ServiceProviderCategoryMapper $serviceProviderCategoryMapper) {
        $this->serviceProviderDao = $serviceProviderDao;
        $this->serviceProviderCategoryDao = $serviceProviderCategoryDao;
        $this->serviceProviderServiceDao = $serviceProviderServiceDao;
        $this->serviceProviderMapper = $serviceProviderMapper;
        $this->serviceProviderServiceMapper = $serviceProviderServiceMapper;
        $this->serviceProviderCategoryMapper = $serviceProviderCategoryMapper;
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

    public function getServiceProviderWithCategoryAndServiceById($id): array
    {
        $serviceProviderDao = $this->serviceProviderDao->getServiceProviderById($id);

        if (empty($serviceProviderDao)) {
            syslog(LOG_INFO, 'No service provider found');
            throw new Exception('No service provider found');
        }else{
            return $serviceProviderDao;
        }
    }

    /**
     * @throws Exception
     */
    public function insertServiceProvider(array $data): bool
    {
        $providerData = $this->serviceProviderMapper->fromStdClass($data);
        $serviceProviderDao = $this->serviceProviderDao->insertServiceProvider($providerData);
        if($serviceProviderDao==null){
            syslog(LOG_INFO, 'could not create service provider');
            throw new Exception('could not create service provider ee');
        } else {
            $id = $serviceProviderDao->getId();
            $categoryData = $this->serviceProviderCategoryMapper->fromStdClass($data);
            $serviceData = $this->serviceProviderServiceMapper->fromStdClass($data);

            print_r($id);
            global $db;

            $db->beginTransaction();

            try {
                $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->insertServiceProviderCategory($id, $categoryData, $db);

                $serviceProviderServiceDao = $this->serviceProviderServiceDao->insertServiceProviderService($id, $serviceData, $db);

                if($serviceProviderCategoryDao == null|| $serviceProviderServiceDao == null){
                    syslog(LOG_INFO, 'could not create service provider cause category or service could not be inserted');
                    throw new Exception('could not create service provider cause category or service could not be inserted');
                }

                $db->commit();
                return true;
            } catch (Exception $e) {
                $db->rollback();
                error_log('Failed to insert data: ' . $e->getMessage());
                return false;
            }

        }
    }

    /**
     * @throws Exception
     */
    public function updateServiceProvider($data): bool
    {
        $providerData = $this->serviceProviderMapper->updateMapper($data);
        $serviceProviderDao = $this->serviceProviderDao->updateServiceProvider($providerData);
        if($serviceProviderDao==null){
            syslog(LOG_INFO, 'could not update service provider hehe');
            throw new Exception('could not update service provider');
        } else {
            $id = $providerData->getId();
            $categoryData = $this->serviceProviderCategoryMapper->fromStdClass($data);
            $serviceData = $this->serviceProviderServiceMapper->fromStdClass($data);

            print_r($id);
            global $db;

            $db->beginTransaction();

            try {
                $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->updateServiceProviderCategory($id, $categoryData, $db);

                $serviceProviderServiceDao = $this->serviceProviderServiceDao->updateServiceProviderService($id, $serviceData, $db);

                if($serviceProviderCategoryDao == null|| $serviceProviderServiceDao == null){
                    syslog(LOG_INFO, 'could not update service provider');
                    throw new Exception('could not update service provider');
                }

                $db->commit();
                return true;
            } catch (Exception $e) {
                $db->rollback();
                error_log('Failed to update data: ' . $e->getMessage());
                return false;
            }

        }
    }

    public function deleteServiceProvider(int $id): bool
    {

        global $db;

        $db->beginTransaction();

        $serviceProviderDao = $this->serviceProviderDao->deleteServiceProvider($id);

        $serviceProviderCategoryDao = $this->serviceProviderCategoryDao->deleteServiceProviderCategory($id);

        $serviceProviderServiceDao = $this->serviceProviderServiceDao->deleteServiceProviderService($id);

        $db->commit();


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