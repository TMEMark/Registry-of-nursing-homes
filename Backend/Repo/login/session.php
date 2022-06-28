<?php
session_start();

if(!isset($_SESSION["logedIn"])){
    header("Location:login.php");
    exit;
}

?>