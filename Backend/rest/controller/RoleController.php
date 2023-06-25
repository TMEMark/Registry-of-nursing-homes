<?php


use dao\RoleRepository;
use mapper\RoleMapper;
use request\RoleReqHandler;
use service\RoleService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/repository/RoleRepository.php';
require_once '../mapper/RoleMapper.php';
require_once '../request/RoleReqHandler.php';
require_once '../../db/DatabaseConnection.php';
require_once '../../service/RoleService.php';

$reqHandler = new RoleReqHandler(new RoleService(new RoleRepository(new RoleMapper()), new RoleMapper()));

$method = $_SERVER['REQUEST_METHOD'];

$reqHandler->handleRequest($method);