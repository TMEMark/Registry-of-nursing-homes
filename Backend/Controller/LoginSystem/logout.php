<?php
session_start();
session_unset();
session_destroy();
header("Location:../../../Frontend/Pages/index.php");
?>  