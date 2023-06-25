<?php

namespace request;

use Exception;
use service\DynamicSearchService;

class DynamicSearchReqHandler
{
    private DynamicSearchService $dynamicSearchService;

    public function __construct(DynamicSearchService $dynamicSearchService) {
        $this->dynamicSearchService = $dynamicSearchService;
    }

    /**
     * @throws Exception
     */
    public function handleRequest($method, $search = null, $location = null, $service = null, $category = null) {
        switch ($method) {
            case 'GET':
                if ($search !== null || $location !== null || $service !== null ||$category !== null) {
                     $this->dynamicSearch($search, $location, $service, $category);
                }else {
                    $this->getAllDataFromDb(); // No parameters, retrieve all data
                }
            break;
        }
    }

    private function dynamicSearch($search, $location, $service, $category): void
    {
        try {
            echo json_encode($this->dynamicSearchService->dynamicSearch($search, $location, $service, $category));
        }catch (Exception $e){
            http_response_code(404);
            return;
        }
    }

    private function getAllDataFromDb(): void
    {
        try {
            echo json_encode($this->dynamicSearchService->getAllDataFromDb());
        }catch (Exception $e){
            http_response_code(404);
            return;
        }
    }
}