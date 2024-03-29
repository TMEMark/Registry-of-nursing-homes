<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "Components/header.html";
require "../../Backend/select.php";

if(isset($_GET["idPruz"]) && $_GET["idPruz"] > 0){
  $queryPruzatelji = $db->query("SELECT * 
  FROM lokacija l 
  INNER JOIN pruzatelji p ON l.idLokacije =  p.lokacija
  WHERE idPruz =" . $_GET["idPruz"]);
  $Pruzatelji = $queryPruzatelji ->fetchAll();
 
  $idPruz = $_GET["idPruz"];
  $naziv_pruzatelja = $Pruzatelji[0]["naziv_pruzatelja"];
  $oib = $Pruzatelji[0]["oib"];
  $email = $Pruzatelji[0]["email"];
  $lokacija = $Pruzatelji[0]["naziv_lokacije"];
  $adresa = $Pruzatelji[0]["adresa"];
  $kontakt = $Pruzatelji[0]["kontakt"];
  $URL_stranice = $Pruzatelji[0]["URL_stranice"];
  $radno_vrijeme = $Pruzatelji[0]["radno_vrijeme"];
  $napomena = $Pruzatelji[0]["napomena"];
  $long = $Pruzatelji[0]["longitude"];
  $lat = $Pruzatelji[0]["latitude"];
}else{
  $idPruz = "";
  $naziv_pruzatelja = "";
  $oib = "";
  $pruzatelj = "";
  $email = "";
  $lokacija = "";
  $adresa = "";
  $kontakt = "";
  $URL_stranice = "";
  $radno_vrijeme = "";
  $napomena = "";
  $long = "";
  $lat = ""; 
}
$idPruzUsl = "";
$idPruzUslKat = "";
?>

  
  <h1>Unos pružatelja</h1>

<div class="formRegistry">
  
<!--form-->
  <form data-multi-step class="multi-step-form" action="../../Backend/Controller/pruzatelji.php" method="post">
  <input type="hidden" name="idPruz" value="<?php echo $idPruz;?>">
    <div class="card" data-step>
      <h2>Dodajte pružatelja</h2>
      <h3 class="step-title">Osnovne informacije</h3>
      <h4>1. korak od 5</h4>
      <div class="form-group">
        <div class="naziv">
          <label for="naziv" id="label-naziv">
          <span class="content-naziv" >
                  Naziv pružatelja
              </span><br>
              <input type="text" autocomplete="off" id="naziv" value="<?php echo $naziv_pruzatelja;?>" name="naziv" />
          </label>
          <br />
        </div>
        <div class="oib">
          <label for="oib" id="label-oib">
          <span class="content-oib">
                  OIB
          </span><br>
          <input type="text" autocomplete="off" id="oib" value="<?php echo $oib;?>" name="oib" />
          </label>
          <br />
        </div>
        <div class="adresa">
          <label for="adresa" id="label-adresa">
          <span class="content-adresa">
                  Adresa
          </span><br>
          <input type="text" autocomplete="off" id="adresa" value="<?php echo $adresa;?>" name="adresa" />
          </label>
          <br />
        </div>
        <div class="lokacija">
          <label for="lokacija" id="label-lokacija">
          <span class="content-lokacij">
                  Županija
              </span><br>
              <select name="lokacija" id="lokacija">
                <option value="">Odaberi županiju</option>
                <option value="1" <?php 
                echo ($lokacija == "Osječko-baranjska županija") ? "selected" : "";
                ?>>Osječko-baranjska županija</option>
                <option value="2" <?php 
                echo ($lokacija == "Vukovarsko-srijemska županija") ? "selected" : "";
                ?>>Vukovarsko-srijemska županija</option>
              </select>
          </label>
          <br />
        </div>
        <div class="radn_vrijeme">
          <label for="radn_vrijeme" id="label-radn_vrijeme">
          <span class="content-radn_vrijeme">
                  Radno vrijeme
              </span><br>
              <input type="text" autocomplete="off" id="radn_vrijeme" value="<?php echo $radno_vrijeme;?>" name="radn_vrijeme" />
          </label>
          <br />
          <button type="button" data-next class="submit">Sljedeće</button>
          <button type="button" class="quitForm"><a href="pruzatelji.php"><img src="../Assets/x.svg" alt="poništavanje">Odustani</a></button>
        </div>
      </div>
    </div>
    <div class="card" data-step>
      <h3 class="step-title">Kontakt informacije</h3>
      <h4>2. korak od 5</h4>
      <div class="form-group">
        <div class="kontakt">
          <label for="kontakt" id="label-kontakt">
          <span class="content-kontakt">
                  Kontakt broj
              </span><br>
              <input type="text" autocomplete="off" id="kontakt" value="<?php echo $kontakt;?>" name="kontakt" />
          </label>
          <br />
        </div>
        <div class="email">
          <label for="email" id="label-email">
          <span class="content-email">
                  Email
              </span><br>
              <input type="text" autocomplete="off" id="email" value="<?php echo $email;?>" name="email" />
          </label>
          <br />
        </div>
        <div class="url">
          <label for="url" id="label-url">
          <span class="content-url">
                  Link mrežne stranice
              </span><br>
              <input type="text" autocomplete="off" id="url" value="<?php echo $URL_stranice;?>" name="url" />
          </label>
          <br />
          <button type="button" data-previous class="before">Prethodno</button>
          <button type="button" data-next class="submit">Sljedeće</button>
          <button type="button" data-next class="quitForm"><a href="pruzatelji.php"><img src="../Assets/x.svg" alt="poništavanje">Odustani</a></button>
        </div>
      </div>
    </div>

    <div class="card" data-step>
      <h3 class="step-title">Napomena</h3>
      <h4>3. korak od 5</h4>
      <div class="form-group">
      <div class="napomena">
          <label for="napomena" id="label-napomena">
          <span class="content-naziv">
                  Napomena
              </span><br>
              <textarea name="napomena" id="napomena" value="<?php echo $napomena;?>" cols="30" rows="10"></textarea>
          </label><br>
          <button type="button" data-previous class="before">Prethodno</button>
          <input type="submit" name="submit" value="Unos" class="submit" id="unos">
          <br />
        </div>
      </div>
    </div>
  </form>


  <form action="../../Backend/Controller/pruzateljiUsluge.php" method="post">
    <div class="card" data-step id="usluge">
        <h3>Usluge</h3>
        <?php
        foreach ($getLastInserted as $key) {
          echo "<h3>" . $key['naziv_pruzatelja'] . "</h3>";
          $idPruz = $key['idPruz'];
        }
        ?>
        <h4>4. korak od 5</h4> 
        <div class="form-group">
        <input type="hidden" name="idPruzUsl" value="<?php echo $idPruzUsl;?>">
          <input type="hidden" name="pruzatelj"  class="form-control" value="<?php echo $idPruz; ?>">
          <div class="usluga">
            <label for="usluga" id="usluga">
            <span class="content-usluga">
                    Usluga
                </span><br>
                <select name="usluga[]" class="js-example-basic-multiple"  id="usluga" multiple="multiple">
                  <option value="">Odaberi uslugu</option>
                  <option value="1">Trajni smještaj</option>
                  <option value="2">Privremeni i povremeni</option>
                  <option value="3">Dnevni boravak u domu</option>
                  <option value="4">Probno stanovanje</option>
                </select>
            </label>
            <input type="submit" name="submit" value="Unos" class="submit" id="unos">
            <br />
        </div>
    </div>
  </form>

  <form action="../../Backend/Controller/pruzateljiUslugeKategorije.php" method="post">
    <div class="card" data-step>
        <h3>Kategorije</h3>
        <?php
        foreach ($getLastInserted as $key) {
          echo "<h3>" . $key['naziv_pruzatelja'] . "</h3>";
          $idPruz = $key['idPruz'];
        }

        foreach($getLastUsl as $key){
          $idPruzUsl = $key['idPruzUsl'];
        }
        ?>
        <h4>5. korak od 5</h4> 
        <div class="form-group">
        <input type="hidden" name="idPruzUslKat" value="<?php echo $idPruzUslKat;?>">
          <input type="hidden" name="pruzateljUsluga"  class="form-control" value="<?php echo $idPruzUsl; ?>">
          <div class="kategorija">
            <label for="kategorija" id="kategorija">
            <span class="content-usluga">
                    Kategorija
                </span><br>
                <select name="kategorija[]" class="js-example-basic-multiple"  id="kategorija" multiple="multiple">
                  <option value="1">Skrb o pokretnim osobama</option>
                  <option value="2">Skrb o nepokretnim osobama</option>
                  <option value="3">Skrb o psihički bolesnim osobama</option>
                  <option value="4">Skrb o osobama s demencijom/Alzheimerom</option>
                  <option value="5">Palijativna skrb</option>
                </select>
            </label>
            <br>
            <input type="submit" name="submit" value="Unos" class="submit" id="unos">
            <br>
        </div>
    </div>
  </form>
</div>
<script src="../JavaScript/script.js" defer></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
  </script>
  <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
  </script>
