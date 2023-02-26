<?php
require "Components/header.html";
require "../../Backend/select.php";
/*$query = $db->query ("SELECT p.naziv_pruzatelja, p.email, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, l.naziv_lokacije, p.oib
FROM pruzatelji p
INNER JOIN lokacija l ON p.lokacija=l.idLokacije
WHERE p.idPruz = " . $_GET["id"]);
$results = $query -> fetchAll();*/
?>

<div class="mainDiv">
  <div class="">
    <?php /*echo $results[0]["naziv_pruzatelja"]; */?></h1>
  </div>
  <div class="firstSection">
    <div class="">
      <p class="txtDetail"><b>ADRESA:</b> <?php /*echo $results[0]["adresa"];*/ ?> </p>
      <p class="txtDetail"><b>ŽUPANIJA:</b> <?php /*echo $results[0]["naziv_lokacije"];*/ ?></p>
      <p class="txtDetail"><b>KONTAKT:</b> <?php /*echo $results[0]["kontakt"];*/ ?></p>
      <p class="txtDetail"><b>MAIL:</b> <?php /*echo $results[0]["email"];*/ ?></p>
      <p class="txtDetail"><b>RADNO VRIJEME:</b> <?php /*echo $results[0]["radno_vrijeme"];*/ ?></p>
      <p class="txtDetail"><b>WEB:</b> <?php /*echo $results[0]["URL_stranice"];*/ ?></p>
      <p class="txtDetail"><b>NAPOMENA:</b> <?php /*echo $results[0]["napomena"];*/ ?></p>
    </div>
    <div class="sectionServices">
      
    <?php
                    /*$query2 = $db->query("SELECT p.naziv_pruzatelja, u.naziv_usluge
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_usluge pu ON p.idPruz = pu.pruzatelj
                    INNER JOIN usluge u ON u.idUsluge = pu.usluga
                    WHERE p.idPruz = " . $_GET["id"]);
                    $results2 = $query2 -> fetchAll();*/
                    ?>
      <p class="txtDetailServices"><b>USLUGE:</b> 
      <?php /*foreach($results2 as $r2){
                        echo $r2["naziv_usluge"] . "<br>"; }*/
                      ?></p><br></p>
    </div>
  </div>

  <div class="secondSection">
    <div class="">
    <?php
                   /* $query3 = $db->query("SELECT p.naziv_pruzatelja, k.naziv_kategorije
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_kategorije pk ON p.idPruz = pk.pruzatelj
                    INNER JOIN kategorije k ON k.idKategorija = pk.kategorija
                    WHERE p.idPruz = " . $_GET["id"]);
                    $results3 = $query3 -> fetchAll();*/
                    ?>
      <p class="txtDetail"><b>KATEGORIJE:</b> 
      <?php
                   /* foreach($results3 as $r3){
                      echo $r3["naziv_kategorije"] . "<br>"; }
                    */?> </p>
    </div>
    <div class="map">
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=17.937927246093754%2C45.17138813517549%2C19.572143554687504%2C45.83932432809877&amp;layer=mapnik&amp;marker=45.506346901083425%2C18.755035400390625" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=45.5063&amp;mlon=18.7550#map=10/45.5063/18.7550">View Larger Map</a></small>

    </div>
  </div>
</div>
