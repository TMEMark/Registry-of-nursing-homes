<?php
    class LocationReqHandler {
        private LocationService $locationService;

        public function __construct(LocationService $locationService) {
            $this->locationService = $locationService;
        }


        /**
         * @throws Exception
         */
        public function handleRequests() {
            if (isset($_GET['getById']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($this->locationService->getLocationById($_GET['getById']));
            }
            if (isset($_GET['getByName']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($this->locationService->getLocationByName($_GET['getByName']));
            }
            if (isset($_GET['listAll']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($this->locationService->listLocations());
            }
            if (isset($_GET['insert']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $body = file_get_contents("php://input");
                $event = json_decode($body);
                $this->locationService->insertLocation($event);
            }
            if (isset($_GET['update']) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
                $body = file_get_contents("php://input");
                $event = json_decode($body);
                $this->locationService->updateLocation($event);
            }

            if (isset($_GET['delete']) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $this->locationService->deleteLocation($_GET['delete']);
            }
        }
    }
?>