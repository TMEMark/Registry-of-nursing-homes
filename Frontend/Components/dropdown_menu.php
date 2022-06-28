<?php
    //session_start();
?>
<button class="navbar-toggler collapsed d-sm-block d-md-block d-lg-none d-xl-none" data-bs-toggle="collapse" data-bs-target="#dropdown">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="navbar-collapse collapse" id="dropdown">
    <ul class="navbar-nav" >
    <li><a href="../Pages/pruzatelji.php">Pružatelji</a></li>
    <li><a href="../Pages/usluge.php">Usluge</a></li>
    <li><a href="../Pages/kategorije.php">Kategorije</a></li>
    <li><a href="../Pages/admin.php">Administratori</a></li>
    <hr>
    <li><a href="../../Backend/Controller/LoginSystem/logout.php">Odjava</a></li>
    </ul>
</div>
<?php

    if(isset($_SESSION['admin']) == true)
    {
        echo '<a href="../../Backend/Controller/LoginSystem/logout.php" class="d-none d-lg-block" id="logout">Odjava</p> </a>';
    }
    if(isset($_SESSION['admin']) == false)
    {
        echo 'aa';
    }
    
?>
</div>    
</nav>

