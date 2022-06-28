<?php
require "../Database/pdo.php";
require "../Repo/CUD/administratori.php";
require "../Repo/Read/index.php";



//if statements that call functions 

if (isset($_POST['id_admin']) && $_POST['id_admin'] == ""){
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $lozinka = $_POST['lozinka'];
    if(empty($ime) || empty($prezime) || empty($username) || empty($lozinka)){
        header("Location:../../Frontend/Pages/form_admin.php?data=empty");
    }elseif(checkUsernameExists($username)){
        header("Location:../../Frontend/Pages/form_admin.php?username=exists");
    }else{
        insertAdministrator ($ime, $prezime, $username, $role ,$lozinka);
    header("Location:../../Frontend/Pages/admin.php");
    }
    
}

if(isset($_POST['id_admin']) && $_POST['id_admin'] > 0){
    $idAdmin = $_POST['id_admin'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $lozinka = $_POST['lozinka'];
    if(empty($ime) || empty($prezime) || empty($username) || empty($role) || empty($lozinka)){
        header("Location:../../Frontend/Pages/form_admin.php?data=empty");
    }else{
    updateAdministrator ($idAdmin, $ime, $prezime, $username, $role, $lozinka);
    header("Location:../../Frontend/Pages/admin.php");
    }
}
if(isset($_GET['delete'])){
    $idDeleteAdmin = $_GET['delete'];
    deleteAdministrator($idDeleteAdmin);
    header("Location:../../Frontend/Pages/admin.php");
}
?>