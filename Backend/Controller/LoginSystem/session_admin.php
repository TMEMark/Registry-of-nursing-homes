<?php
session_start();

$_SESSION['admin'] == true;
if(!isset($_SESSION["logedIn"])){
    header("Location:form_login.php");
    if((isset($_SESSION['admin']) && $_SESSION['admin'] == true)){
        header("location: admin.php");
      }else{
        header("location: pruzatelji.php");
      }
    exit();
}


