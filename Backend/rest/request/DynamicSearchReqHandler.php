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

    public function handleRequest($method, $search = null, $location = null, $service = null, $category = null) {
        switch ($method) {
            case 'GET':
                if ($search !== null || $location !== null || $service !== null ||$category !== null) {
                     $this->dynamicSearch($search, $location, $service, $category);
                }
            break;
        }
    }

    private function dynamicSearch($search, $location, $service, $category) {
        try {
            return json_encode($this->dynamicSearchService->dynamicSearch($search, $location, $service, $category));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }
}