<?php

namespace service;

use dao\DynamicSearchRepository;
use Exception;

class DynamicSearchService
{
    private DynamicSearchRepository $dynamicSearchRepository;

    public function __construct(DynamicSearchRepository $dynamicSearchRepository)
    {
        $this->dynamicSearchRepository = $dynamicSearchRepository;
    }

    /**
     * @param $search
     * @param $location
     * @param $service
     * @param $category
     * @return array
     * @throws Exception
     */
    function dynamicSearch($search, $location, $service, $category): array
    {
        $dynamicSearchDao = $this->dynamicSearchRepository->dynamicSearch($search, $location, $service, $category);

        if (empty($dynamicSearchDao)) {
            syslog(LOG_INFO, 'No data found');
            throw new Exception('No data found');
        } else {
            return $dynamicSearchDao;
        }
    }

    function getAllDataFromDb(): array
    {
        $getAllDataFromDbDao = $this->dynamicSearchRepository->getAllDataFromDb();
        if (empty($getAllDataFromDbDao)) {
            syslog(LOG_INFO, 'No data found');
            throw new Exception('No data found');
        } else {
            return $getAllDataFromDbDao;
        }
    }
}