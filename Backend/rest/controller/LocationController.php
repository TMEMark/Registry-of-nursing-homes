<?php

use dao\LocationRepository;
use mapper\LocationMapper;
use request\LocationReqHandler;
use service\LocationService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/repository/LocationRepository.php';
require_once '../../service/LocationService.php';
require_once '../../db/DatabaseConnection.php';
require_once '../request/LocationReqHandler.php';
require_once '../mapper/LocationMapper.php';

$reqHandler = new LocationReqHandler(new LocationService(new LocationRepository(new LocationMapper()), new LocationMapper()));

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;

$reqHandler->handleRequest($method, $id, $name);