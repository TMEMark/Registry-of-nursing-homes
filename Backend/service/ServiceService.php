<?php

namespace service;

use dao\ServiceRepository;
use Exception;
use mapper\ServiceMapper;

class ServiceService{
    private ServiceRepository $serviceDao;

    private ServiceMapper $serviceMapper;


    public function __construct(ServiceRepository $serviceDao, ServiceMapper $serviceMapper) {
        $this->serviceDao = $serviceDao;
        $this->serviceMapper= $serviceMapper;
    }

    public function getServiceById(int $id): \dto\ServiceDto
    {
        syslog(LOG_INFO, 'getting service');
        $serviceDao = $this->serviceMapper->toDto($this->serviceDao->getServiceById($id));
        if(empty($serviceDao)){
            syslog(LOG_INFO, 'no service found');
            throw new Exception('no service found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'service found');
            return $serviceDao;
        }
    }

    public function getServiceByName(String $name): \dto\ServiceDto
    {
        syslog(LOG_INFO, 'getting service');
        $serviceDao = $this->serviceMapper->toDto($this->serviceDao->getServiceByName($name));
        if(empty($serviceDao)){
            syslog(LOG_INFO, 'no service found');
            throw new Exception('no service found with name {}', $name);
        }else{
            syslog(LOG_INFO, 'service found');
            return $serviceDao;
        }
    }

    /**
     * @throws Exception
     */
    public function listServices(): array
    {
        syslog(LOG_INFO, 'getting services');
       $serviceDaoList = $this->serviceDao->listServices();
       $serviceDTOList = [];
       foreach ($serviceDaoList as $service){
           $serviceDTO = $this->serviceMapper->toDto($service);
           $serviceDTOList[] = $serviceDTO;
       }
       if(empty($serviceDTOList)){
        syslog(LOG_ERR, 'could not list services');
        throw new Exception('could not list services');
       }else{
        syslog(LOG_INFO, 'services found');
        return $serviceDTOList;
       }
    }

    public function insertService(array $service): \dto\ServiceDto
    {
        syslog(LOG_INFO, 'creating service');
        $service = $this->serviceMapper->fromStdClass($service);
        $serviceDao = $this->serviceDao->insertService($service);
        if($serviceDao == null){
            syslog(LOG_ERR, 'could not create service');
            throw new Exception('could not create service');
        }else{
            $serviceMap = $this->serviceMapper->toDto($serviceDao);
            syslog(LOG_INFO, 'service created');
            return $serviceMap;
        }
    }

    public function updateService(array $service): \dto\ServiceDto
    {
        syslog(LOG_INFO, 'updating service');
        $service = $this->serviceMapper->updateMapper($service);

        $serviceId = $service->getId();
        $serviceDaoGetById = $this->serviceDao->getServiceById($serviceId);
        syslog(LOG_INFO, 'getting service');

        if(empty($serviceDaoGetById)){
            syslog(LOG_ERR, 'service not found');
            throw new Exception('no service found with id {}', $serviceId);
        }else{
            $serviceDao = $this->serviceMapper->toDto($this->serviceDao->updateService($service));
            if($serviceDao == null){
                syslog(LOG_ERR, 'could not update service');
                throw new Exception('could not update service');
            }else{
                syslog(LOG_INFO, 'service updated successfully');
                return $serviceDao;
            }
        }
    }

    public function deleteService(int $id){
        syslog(LOG_INFO, 'deleting service');
        $serviceDaoDeleted = $this->serviceDao->deleteService($id);
        if($serviceDaoDeleted == false){
            syslog(LOG_ERR, 'could not delete service');
            throw new Exception('could not delete service');
        }else{
            syslog(LOG_INFO, 'service deleted');
        }
    }
}

?>