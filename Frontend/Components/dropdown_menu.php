<?php
    //session_start();
?>
<button class="navbar-toggler collapsed d-sm-block d-md-block d-lg-block d-xl-none" data-bs-toggle="collapse" data-bs-target="#dropdown">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="navbar-collapse collapse" id="dropdown">
    <ul class="navbar-nav" >
    <li><a href="../Pages/pruzatelji.php">Pružatelji</a></li>
    <li><a href="../Pages/usluge.php">Usluge</a></li>
    <li><a href="../Pages/kategorije.php">Kategorije</a></li>
    <li><a href="../Pages/admin.php">Administratori</a></li>
    <hr>
    <li>
    <?php

    if(isset($_SESSION['logedIn']) == 1)
    {
        echo '<a href="../../Backend/Controller/LoginSystem/logout.php" class="d-none d-lg-block" id="logout" style="
        color: white;
        text-decoration: none;
    ">Odjava</p> </a>';
    }
    if(isset($_SESSION['logedIn']) == 0)
    {
        echo '<a href="http://localhost/Registry-of-nursing-homes/Frontend/Pages/form_login.php" id="login" style="
        color: white;
        text-decoration: none;
    ">Prijava</p></a>';;
    }
    
?>    
    </ul>
</div>

</div>    
</nav>

