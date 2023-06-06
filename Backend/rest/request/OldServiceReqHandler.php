<?php

namespace rest\request;

use service\ServiceService;

class OldServiceReqHandler
{
    private ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }


    /**
     * @throws Exception
     */
    public function handleRequests()
    {
        if (isset($_GET['getById']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->serviceService->getServiceById($_GET['getById']));
        }
        if (isset($_GET['getByName']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->serviceService->getServiceByName($_GET['getByName']));
        }
        if (isset($_GET['listAll']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->serviceService->listServices());
        }
        if (isset($_GET['insert']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $body = file_get_contents("php://input");
            $event = json_decode($body, true);
            $this->serviceService->insertService($event);
        }
        if (isset($_GET['update']) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
            $body = file_get_contents("php://input");
            $event = json_decode($body, true);
            $this->serviceService->updateService($event);
        }

        if (isset($_GET['delete']) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->serviceService->deleteService($_GET['delete']);
        }
    }
}

?>