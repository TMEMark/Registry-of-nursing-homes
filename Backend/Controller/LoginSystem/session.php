<?php
session_start();

if(!isset($_SESSION["logedIn"])){
    header("Location:form_login.php");
    exit;
}

?>