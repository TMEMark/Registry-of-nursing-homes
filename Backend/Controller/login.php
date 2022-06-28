<?php
require "../Database/pdo.php";
require "../Repo/login/login.php";
$username = $_POST['username'];
$password = $_POST['password'];



if(login($username,$password) > 0){
    session_start();
    $_SESSION["logedIn"] = true;
    header("Location:../../Frontend/Pages/pruzatelji.php");
}else{
    header("Location:../../Frontend/Pages/form_login.php");
    echo "Pogrešno korisničko ime i/ili loznika.";
}