<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "Components/header.html";
require "../../Backend/select.php";


if(isset($_GET["idUsluge"]) && $_GET["idUsluge"] > 0){
  $queryUsluge = $db->query("select * from usluge WHERE idUsluge =" . $_GET["idUsluge"]);
  $Usluge = $queryUsluge ->fetchAll();

  $idUsluge = $_GET["idUsluge"];
  $nazivUsluge = $Usluge[0]["naziv_usluge"];
}else{
  $idUsluge = "";
  $nazivUsluge = "";
}

?>

</div>
</nav>

<div class="ilustracija">
  <!--<img src="../Assets/ilustracija2.png" alt="Ilustracija" class="illustr">-->
</div>


    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="mb-4">
              <h3>Dodajte novu uslugu</h3>
            </div>
            <form action="../../Backend/Controller/usluge.php" method="post">

            <input type="hidden" name="id_usl" value="<?php echo $idUsluge;?>">

              <div class="form-group">
                <label>Naziv usluge</label>
                <input name="naziv_usl" type="text" class="form-control" value="<?php echo $nazivUsluge; ?>">
              </div>

              <input type="submit" name="submit" value="Unos" class="submit">

              <a href="usluge.php"><button type="button" class="quitForm"><img src="../Assets/x.svg" alt="poništavanje">Odustani</button></a>

            </form>
            <?php
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              
              if(strpos($fullUrl, "data=empty")){
                echo "<p class='erMsg'> Polje je obavezno. </p>";
              }
            ?>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  
