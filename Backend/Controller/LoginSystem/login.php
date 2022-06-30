<?php
require "../../Database/pdo.php";
require "../../Repo/login/login.php";
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) || empty($password)){
    header("Location:../../../Frontend/Pages/form_login.php?login=empty");
}elseif(login($username,$password) > 0){
    session_start();
    $_SESSION["logedIn"] = true;
    $_SESSION["user"] = $username;
    header("Location:../../../Frontend/Pages/pruzatelji.php");
}else{
    header("Location:../../../Frontend/Pages/form_login.php?data=wrong");
}

