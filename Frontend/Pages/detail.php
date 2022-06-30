<?php
require "../Components/header.html";
require "../../Backend/select.php";

$query = $db->query ( 
"SELECT * FROM lokacija l 
INNER JOIN pruzatelji p ON l.idLokacije =  p.lokacija
WHERE idPruz =" . $_GET["id"]);
$results = $query -> fetchAll();
?>

    </div>
      </nav>


    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="mb-4">
              <h3><?php echo $selectPruzUslKat[0]["naziv_pruzatelja"]; ?></h3>
              <p class="mb-4">Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</p>
            </div>

                <div class="container">
                    <p><b>ADRESA:</b> <?php echo $results[0]["adresa"]; ?> </p> 
                    <p><b>ŽUPANIJA:</b> <?php echo $results[0]["naziv_lokacije"]; ?> </p>
                    <p><b>KONTAKT:</b> <?php echo $results[0]["kontakt"]; ?> </p>
                    <p><b>MAIL:</b> <?php echo $results[0]["email"]; ?> </p>
                    <p><b>RADNO VRIJEME:</b> <?php echo $results[0]["radno_vrijeme"]; ?> </p>
                    <p><b>WEB:</b> <?php echo $results[0]["URL_stranice"]; ?> </p>
                    <p><b>NAPOMENA:</b> <?php echo $results[0]["napomena"]; ?> </p>
                    <p><b>USLUGE:</b> <!--<?php echo $results[0]["naziv_usluge"]; ?> </p>-->
                    <p><b>KATEGORIJE:</b> <!--<?php echo $results[0]["naziv_kategorije"]; ?> </p>-->
                </div>

           


            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

      

<?php
include("../Components/footer.html");
?>