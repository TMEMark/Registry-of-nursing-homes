<?php
require "../../Database/pdo.php";
require "../../Repo/login/login.php";
$username = $_POST['username'];
$passwordUI = $_POST['password'];

$login  = login($username);

if(empty($username) || empty($passwordUI)){
    header("Location:../../../Frontend/Pages/form_login.php?login=empty");
}elseif(password_verify($passwordUI, $login["lozinka"]) === true){
    session_start();
    $_SESSION["logedIn"] = true;
    $_SESSION["user"] = $username;
    header("Location:../../../Frontend/Pages/pruzatelji.php");
}else{
    header("Location:../../../Frontend/Pages/form_login.php?data=wrong");
}

