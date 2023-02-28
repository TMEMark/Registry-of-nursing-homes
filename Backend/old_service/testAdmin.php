<?php
include '../Database/pdo.php';
include 'getAdminData.php';

$result = chechIfUserExists($conn,1);

while($row  = $result->fetch_assoc()){
    echo $row;
}