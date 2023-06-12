<?php

use dao\CategoryRepository;
use dao\LocationRepository;
use dao\ServiceRepository;
use dao\ServiceProviderCategoryRepository;
use dao\ServiceProviderRepository;
use dao\ServiceProviderServiceRepository;
use mapper\CategoryMapper;
use mapper\LocationMapper;
use mapper\ServiceMapper;
use mapper\ServiceProviderCategoryMapper;
use mapper\ServiceProviderMapper;
use mapper\ServiceProviderServiceMapper;
use request\ServiceProviderReqHandler;
use service\ServiceProviderService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/repository/ServiceRepository.php';
require_once '../../persistance/repository/CategoryRepository.php';
require_once '../../persistance/repository/LocationRepository.php';
require_once '../../persistance/repository/ServiceProviderRepository.php';
require_once '../../persistance/repository/ServiceProviderCategoryRepository.php';
require_once '../../persistance/repository/ServiceProviderServiceRepository.php';
require_once '../mapper/ServiceMapper.php';
require_once '../mapper/CategoryMapper.php';
require_once '../mapper/ServiceProviderMapper.php';
require_once '../mapper/ServiceProviderCategoryMapper.php';
require_once '../mapper/ServiceProviderServiceMapper.php';
require_once '../request/ServiceProviderReqHandler.php';
require_once '../../db/DatabaseConnection.php';
require_once '../../service/ServiceProviderService.php';

$reqHandler = new ServiceProviderReqHandler(new ServiceProviderService(new ServiceProviderRepository(new ServiceProviderMapper()),
    new ServiceProviderCategoryRepository(new ServiceProviderCategoryMapper()), new ServiceProviderServiceRepository(new ServiceProviderServiceMapper()),
    new CategoryRepository(new CategoryMapper()), new ServiceRepository(new ServiceMapper()), new ServiceProviderMapper(), new LocationRepository(new LocationMapper()), new LocationMapper()));

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;

$reqHandler->handleRequest($method, $id, $name);