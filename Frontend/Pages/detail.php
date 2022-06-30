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

      
    <div class="container-detail">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row">
            <div>
              <div class="mb-4">
              <h3 style="margin-top:160px; margin-left:50px"><?php echo $selectPruzUslKat[0]["naziv_pruzatelja"]; ?></h3>
              <p class="mb-4" style="margin-top:30px; margin-left:50px">Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</p>
            </div>

                <div class="container" style="float:left">
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
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d88999.78297627486!2d15.967846399999997!3d45.806387199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d7eab57cb9cf%3A0xd73c20080fa84ffe!2sPark%20Maksimir!5e0!3m2!1shr!2shr!4v1655485119829!5m2!1shr!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="float:right"></iframe>
      </div>
    </div>
    



  </div>

      

<?php
include("../Components/footer.html");
?>