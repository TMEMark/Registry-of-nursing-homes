<?php

use request\CategoryReqHandler;
use dao\CategoryRepository;
use mapper\CategoryMapper;
use service\CategoryService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../db/DatabaseConnection.php';
require_once '../request/AdminReqHandler.php';
require_once '../../service/CategoryService.php';
require_once '../../persistance/repository/CategoryRepository.php';
require_once '../mapper/CategoryMapper.php';
require_once '../../service/ServiceService.php';
require_once '../../persistance/repository/ServiceRepository.php';
require_once '../mapper/ServiceMapper.php';
require_once '../../service/ServiceProviderService.php';
require_once '../../persistance/repository/ServiceProviderRepository.php';
require_once '../mapper/ServiceProviderMapper.php';

$reqHandler = new CategoryReqHandler(new CategoryService(new CategoryRepository(new CategoryMapper()), new CategoryMapper));

$entity = $_GET['entity'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

$reqHandler->handleRequest($entity, $method, $id);