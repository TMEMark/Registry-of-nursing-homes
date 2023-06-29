<?php

        // Check if the user is logged in by checking session variables
        session_start();
        if (!isset($_SESSION["logedIn"])) {
            header("Location:form_login.php");
            exit;
        }
    

?>