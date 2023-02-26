<?php
require "Components/header.html";
require "../../Backend/select.php";
$query = $db->query ("SELECT p.naziv_pruzatelja, p.email, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, l.naziv_lokacije, p.oib
FROM pruzatelji p
INNER JOIN lokacija l ON p.lokacija=l.idLokacije
WHERE p.idPruz = " . $_GET["id"]);
$results = $query -> fetchAll();
?>

<div class="mainDiv">
  <div class="">
    <h1><?php echo $results[0]["naziv_pruzatelja"]; ?></h1>
  </div>
  <div class="firstSection">
    <div class="">
      <p class="txtDetail"><b>ADRESA:</b> <?php echo $results[0]["adresa"]; ?> </p>
      <p class="txtDetail"><b>ŽUPANIJA:</b> <?php echo $results[0]["naziv_lokacije"]; ?></p>
      <p class="txtDetail"><b>KONTAKT:</b> <?php echo $results[0]["kontakt"]; ?></p>
      <p class="txtDetail"><b>MAIL:</b> <?php echo $results[0]["email"]; ?></p>
      <p class="txtDetail"><b>RADNO VRIJEME:</b> <?php echo $results[0]["radno_vrijeme"]; ?></p>
      <p class="txtDetail"><b>WEB:</b> <?php echo $results[0]["URL_stranice"]; ?></p>
      <p class="txtDetail"><b>NAPOMENA:</b> <?php echo $results[0]["napomena"]; ?></p>
    </div>
    <div class="sectionServices">
    <?php
                    $query2 = $db->query("SELECT p.naziv_pruzatelja, u.naziv_usluge
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_usluge pu ON p.idPruz = pu.pruzatelj
                    INNER JOIN usluge u ON u.idUsluge = pu.usluga
                    WHERE p.idPruz = " . $_GET["id"]);
                    $results2 = $query2 -> fetchAll();
                    ?>
      <p class="txtDetailServices"><b>USLUGE:</b> 
      <?php foreach($results2 as $r2){
                        echo $r2["naziv_usluge"] . "<br>"; }
                      ?></p><br></p>
    </div>
  </div>

  <div class="secondSection">
    <div class="">
    <?php
                    $query3 = $db->query("SELECT p.naziv_pruzatelja, k.naziv_kategorije
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_kategorije pk ON p.idPruz = pk.pruzatelj
                    INNER JOIN kategorije k ON k.idKategorija = pk.kategorija
                    WHERE p.idPruz = " . $_GET["id"]);
                    $results3 = $query3 -> fetchAll();
                    ?>
      <p class="txtDetail"><b>KATEGORIJE:</b> 
      <?php
                    foreach($results3 as $r3){
                      echo $r3["naziv_kategorije"] . "<br>"; }
                    ?> </p>
    </div>
    <div class="map">

    </div>
  </div>
</div>
