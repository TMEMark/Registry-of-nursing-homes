<?php
require "../Components/header.html";
require "../../Backend/select.php";
$query = $db->query ("SELECT p.naziv_pruzatelja, p.email, l.naziv_lokacije, p.adresa, p.kontakt, p.URL_stranice, p.radno_vrijeme, p.napomena, p.longitude, p.latitude, u.naziv_usluge, k.naziv_kategorije, k.idKategorija, p.idPruz, u.idUsluge   
FROM usluge u
INNER JOIN pruzatelji_usluge pu ON u.idUsluge = pu.usluga
INNER JOIN pruzatelji p ON p.idPruz = pu.pruzatelj
INNER JOIN lokacija l ON l.idLokacije = p.lokacija
INNER JOIN pruzatelji_usluge_kategorije puk ON pu.idPruzUsl = puk.pruzatelj_usluga
INNER JOIN kategorije k ON k.idKategorija = puk.kategorija
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

                <div class="container" style="float:left">
                    <p><b>ADRESA:</b> <?php echo $results[0]["adresa"]; ?> </p> 
                    <p><b>ŽUPANIJA:</b> <?php echo $results[0]["naziv_lokacije"]; ?> </p>
                    <p><b>KONTAKT:</b> <?php echo $results[0]["kontakt"]; ?> </p>
                    <p><b>MAIL:</b> <?php echo $results[0]["email"]; ?> </p>
                    <p><b>RADNO VRIJEME:</b> <?php echo $results[0]["radno_vrijeme"]; ?> </p>
                    <p><b>WEB:</b> <?php echo $results[0]["URL_stranice"]; ?> </p>
                    <p><b>NAPOMENA:</b> <?php echo $results[0]["napomena"]; ?> </p>
                    <p><b>USLUGE:</b> <?php echo $results[0]["naziv_usluge"]; ?> </p>
                    <p><b>KATEGORIJE:</b> <?php echo $results[0]["naziv_kategorije"]; ?> </p>
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
        <?php } ?>
        map: map
        })
    }

  </script>
  <script async defer
        src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyD7wZDyRlKax4zKMn2PtGI4PbWOWFNG4dQ&callback=initMap">
        
  </script> 


<?php
include("../Components/footer.html");
?>
