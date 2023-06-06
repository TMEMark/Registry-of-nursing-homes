<?php

use dao\ServiceDao;
use mapper\ServiceMapper;
use rest\request\TestReqHandler;
use service\ServiceService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/dao/ServiceDao.php';
require_once '../mapper/ServiceMapper.php';
require_once '../request/TestReqHandler.php';
require_once '../../db/DatabaseConnection.php';
require_once '../../service/ServiceService.php';

$reqHandler = new TestReqHandler(new ServiceService(new ServiceDao(new ServiceMapper()), new ServiceMapper()));

// Assuming you have the request method, id, and name from the actual request
$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;

// Handle the request
$reqHandler->handleRequest($method, $id, $name);