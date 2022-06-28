<?php
require '../Database/pdo.php';
require '../Repo/Read/index.php';

$user = $_SESSION['user'];
$idAdmin = $user['idAdmin'];
$getUserRole = getAdminRole($idAdmin);
if($getUserRole == 'admin'){
    header("Location:../../Frontend/Pages/index.php");
}else{
    header("Location:../../Frontend/Pages/pruzatelji.php");
}