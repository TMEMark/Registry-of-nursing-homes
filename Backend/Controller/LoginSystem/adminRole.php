<?php
include "../../Database/pdo.php";
include "../../Repo/Read/index.php";

$user = $_SESSION['user'];
$idAdmin = $user['idAdmin'];
$getUserRole = getAdminRole($idAdmin);
if($getUserRole == 'admin'){
    header("Location:../../../Frontend/Pages/admin.php");
}else{
    header("Location:../../../Frontend/Pages/pruzatelji.php");
}