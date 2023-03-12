<?php

namespace service;

include_once(__DIR__.'../../persistance/dao/ServiceDao.php');
include_once(__DIR__.'../../persistance/entity/ServiceEntity.php');
class ServiceService{
    private ServiceDao $serviceDao;

    public function __construct(ServiceDao $serviceDao) {
        $this->serviceDao = $serviceDao;
    }

    public function getServiceById(int $id) {
        syslog(LOG_INFO, 'getting service');
        $serviceDao = $this->serviceDao->getServiceById($id);
        if(empty($serviceDao)){
            syslog(LOG_INFO, 'no service found');
            throw new Exception('no service found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'service found');
            return $serviceDao;
        }
    }

    public function getServiceByName(String $name){
        syslog(LOG_INFO, 'getting service');
        $serviceDao = $this->serviceDao->getServiceByName($name);
        if(empty($serviceDao)){
            syslog(LOG_INFO, 'no service found');
            throw new Exception('no service found with name {}', $name);
        }else{
            syslog(LOG_INFO, 'service found');
            return $serviceDao;
        }
    }

    public function listServices(){
        syslog(LOG_INFO, 'getting services');
       $serviceDaoList = $this->serviceDao->listServices();
       if(empty($serviceDaoList)){
        syslog(LOG_INFO, 'could not list services');
        throw new Exception('could not list services');
       }else{
        syslog(LOG_INFO, 'services found');
        return $serviceDaoList;
       }
    }

    public function insertService(ServiceEntity $service){
        syslog(LOG_INFO, 'creating service');
        $serviceDaoInsert = $this->serviceDao->insertService($service);
        if($serviceDaoInsert == null){
            syslog(LOG_INFO, 'could not create service');
            throw new Exception('could not create service');
        }else{
            syslog(LOG_INFO, 'service created');
            return $serviceDaoInsert;
        }
    }

    public function updateService(ServiceEntity $service){
        syslog(LOG_INFO, 'updating service');
        $serviceId = $service->getId();
        $serviceDaoGetById = $this->serviceDao->getServiceById($serviceId);
        syslog(LOG_INFO, 'getting service');
        if(empty($serviceDaoGetById)){
            syslog(LOG_INFO, 'service not found');
            throw new Exception('no service found with id {}', $serviceId);
        }else{
            $serviceDao = $this->serviceDao->updateService($service);
            if($serviceDao == null){
                syslog(LOG_INFO, 'could not update service');
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