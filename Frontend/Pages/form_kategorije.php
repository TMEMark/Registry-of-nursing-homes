<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "../Components/header.html";
require "../Components/dropdown_menu.html";
require "../Components/header.html";
require "../Components/header_admin.html";
require "../../Backend/select.php";

if(isset($_GET["idKategorija"]) && $_GET["idKategorija"] > 0){
  $queryKategorije = $db->query("select * from kategorije WHERE idKategorija =" . $_GET["idKategorija"]);
  $Kategorije = $queryKategorije ->fetchAll();

  $id_kat = $_GET["idKategorija"];
  $nazivKat = $Kategorije[0]["naziv_kategorije"];
}else{
  $id_kat = "";
  $nazivKat = "";
}

?>

</div>
</nav>

<div class="content">
  <!--Marko je bio tu.-->
    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="mb-4">
              <h3>Dodajte novu kategoriju</h3>
              <p class="mb-4">Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</p>
            </div>
            <form action="../../Backend/Controller/kategorije.php" method="post">
              <input type="hidden" name="id_kat" value="<?php echo $id_kat;?>">

              <div class="form-group">
                <label>Naziv kategorije</label>
                <input name="nazivKat" type="text" class="form-control" value="<?php echo $nazivKat ?>">
              </div>

              <input type="submit" name="submit" value="Unos" class="submit">

              <a href="kategorije.php"><button type="button" class="btn btn-outline-secondary"><img src="../Components/assets/x.svg" alt="poništavanje">Odustani</button></a>

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
  </div>
