<?php

use dao\DynamicSearchRepository;
use request\DynamicSearchReqHandler;
use service\DynamicSearchService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../db/DatabaseConnection.php';
require_once '../request/DynamicSearchReqHandler.php';
require_once '../../service/DynamicSearchService.php';
require_once '../../persistance/repository/DynamicSearchRepository.php';

$reqHandler = new DynamicSearchReqHandler(new DynamicSearchService(new DynamicSearchRepository()));

$method = $_SERVER['REQUEST_METHOD'];
$search = $_GET['search'] ?? null;
$location = $_GET['location'] ?? null;
$service = $_GET['service'] ?? null;
$category = $_GET['category'] ?? null;


$reqHandler->handleRequest($method, $search, $location, $service, $category);