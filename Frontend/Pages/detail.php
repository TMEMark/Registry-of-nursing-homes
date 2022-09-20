<?php
require "../Components/header.html";
require "../../Backend/select.php";
$query = $db->query ("SELECT p.naziv_pruzatelja, p.email, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, l.naziv_lokacije, p.oib
FROM pruzatelji p
INNER JOIN lokacija l ON p.lokacija=l.idLokacije
WHERE p.idPruz = " . $_GET["id"]);
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
              <h3 style="margin-top:160px; margin-left:50px"><?php echo $results[0]["naziv_pruzatelja"]; ?></h3>
              <p class="mb-4" style="margin-top:30px; margin-left:50px">Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</p>
            </div>
                <div class="grid">
                <div class="container1">
                    <p><b>ADRESA:</b> <?php echo $results[0]["adresa"]; ?> </p> <br>
                    <p><b>ŽUPANIJA:</b> <?php echo $results[0]["naziv_lokacije"]; ?> </p><br>
                    <p><b>KONTAKT:</b> <?php echo $results[0]["kontakt"]; ?> </p><br>
                    <p><b>MAIL:</b> <?php echo $results[0]["email"]; ?> </p><br>
                    <p><b>RADNO VRIJEME:</b> <?php echo $results[0]["radno_vrijeme"]; ?> </p><br>
                    <p><b>WEB:</b> <?php echo $results[0]["URL_stranice"]; ?> </p><br>
                    <p><b>NAPOMENA:</b> <?php echo $results[0]["napomena"]; ?> </p><br>                    

                </div>

                <div class="container2">

                    <?php
                    $query2 = $db->query("SELECT p.naziv_pruzatelja, u.naziv_usluge
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_usluge pu ON p.idPruz = pu.pruzatelj
                    INNER JOIN usluge u ON u.idUsluge = pu.usluga
                    WHERE p.idPruz = " . $_GET["id"]);
                    $results2 = $query2 -> fetchAll();
                    ?>
                    <p><b>USLUGE:</b><br><?php foreach($results2 as $r2){
                        echo $r2["naziv_usluge"] . "<br>"; }
                      ?></p><br>
                    <?php
                    $query3 = $db->query("SELECT p.naziv_pruzatelja, k.naziv_kategorije
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_kategorije pk ON p.idPruz = pk.pruzatelj
                    INNER JOIN kategorije k ON k.idKategorija = pk.kategorija
                    WHERE p.idPruz = " . $_GET["id"]);
                    $results3 = $query3 -> fetchAll();
                    ?>
                </div>
                <div class="container3">
                    <p><b>KATEGORIJE:</b><br> <?php
                    foreach($results3 as $r3){
                      echo $r3["naziv_kategorije"] . "<br>"; }
                    ?> </p>
                </div>
           
            </div>
          </div>
        </div>

        <div id="map"></div>  
     
      </div>
    </div>
    



  </div>

  <script>
    function initMap(){
      //Map options
      var options = {
        zoom: 8,
        center: { lat:45.55111, lng:-18.69389} // koordinate Osijeka
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      //Add marker  
      var marker = new.google.maps.Marker({
        <?php foreach($results as $latlng){ ?>
        position: {lat: <?php echo $latlng["latitude"] ?>, lng: <?php echo $latlng["longitude"] ?>}
        <?php } ?> ,
        map: map
        });
    }

  </script>
  <script async defer
        src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyD7wZDyRlKax4zKMn2PtGI4PbWOWFNG4dQ&callback=initMap">
        
  </script> 


<?php
include("../Components/footer.html");
?>
