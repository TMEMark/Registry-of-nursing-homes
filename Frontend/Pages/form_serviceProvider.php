<?php
require "Components/header.php";
require "Components/authCheck.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $url = "http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceProviderController.php?id=" . $id;
  $response = file_get_contents($url);
  $data = json_decode($response, true);
} else {
  echo "<label style='margin: 20px'>Unosite novi podatak</label>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $address = $_POST['address'];
  $contact_number = $_POST['contact_number'];
  $website_url = $_POST['website_url'];
  $work_time = $_POST['work_time'];
  $remark = $_POST['remark'];
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $services = $_POST['services'];
  $categories = $_POST['categories'];

  // Create an associative array with the form data
  $data = array(
      'name' => $name,
      'email' => $email,
      'location' => $location,
      'address' => $address,
      'contact_number' => $contact_number,
      'website_url' => $website_url,
      'work_time' => $work_time,
      'remark' => $remark,
      'longitude' => $longitude,
      'latitude' => $latitude,
      'services' => $services,
      'categories' => $categories
  );
  // Encode the data as JSON
  $jsonData = json_encode($data);
  // Send the JSON data to the backend using cURL
  $url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceProviderController.php';

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);

  if ($response === false) {
      echo 'Error: ' . curl_error($ch);
  } else {
      echo 'Uspješno dodan/promijenjen podatak.';
  }

  curl_close($ch);
}
?>

  
  <h1>Unos pružatelja</h1>

<div class="formRegistry">
  
<!--form-->
  <form data-multi-step class="multi-step-form" action="form_serviceProvider.php" method="post">
  <input type="hidden" name="idPruz" value="<?php echo isset($data['service_provider_id']) ? $data['service_provider_id'] : '' ; ?>">
    <div class="card" data-step>
      <h2>Dodajte pružatelja</h2>
      <h3 class="step-title">Osnovne informacije</h3>
      <h4>1. korak od 5</h4>
      <div class="form-group">
        <div class="naziv">
          <label for="name" id="label-naziv">
          <span class="content-naziv" >
                  Naziv pružatelja
              </span><br>
              <input type="text" autocomplete="off" id="naziv" value="<?php echo isset($data['name']) ? $data['name'] : '' ; ?>" name="name" required/>
          </label>
          <br />
        </div>
        <!-- <div class="oib">
          <label for="oib" id="label-oib">
          <span class="content-oib">
                  OIB
          </span><br>
          <input type="text" autocomplete="off" id="oib" value="<?php echo $oib;?>" name="oib" />
          </label>
          <br />
        </div> -->
        <div class="adresa">
          <label for="address" id="label-adresa">
          <span class="content-adresa">
                  Adresa
          </span><br>
          <input type="text" autocomplete="off" id="adresa" value="<?php echo isset($data['address']) ? $data['address'] : '' ; ?>" name="address" />
          </label>
          <br />
        </div>
        <div class="lokacija">
          <label for="location" id="label-lokacija">
          <span class="content-lokacij">
                  Županija
              </span><br>
              <select name="lokacija" id="lokacija">
                <option value="">Odaberi županiju</option>
                <option value="1" <?php 
                echo (isset($data['location']) && $data['location'] == 1) ? "selected" : "";
                ?>>Osječko-baranjska županija</option>
                <option value="2" <?php 
                echo(isset($data['location']) && $data['location'] == 2) ? "selected" : "";
                ?>>Vukovarsko-srijemska županija</option>
              </select>
          </label>
          <br />
        </div>
        <div class="radn_vrijeme">
          <label for="work_time" id="label-radn_vrijeme">
          <span class="content-radn_vrijeme">
                  Radno vrijeme
              </span><br>
              <input type="text" autocomplete="off" id="radn_vrijeme" value="<?php echo isset($data['work_time']) ? $data['work_time'] : '' ; ?>" name="work_time" />
          </label>
          <br />
          <button type="button" data-next class="submit">Sljedeće</button>
          <button type="button" class="quitForm"><a href="serviceProvider.php"><img src="../Assets/x.svg" alt="poništavanje">Odustani</a></button>
        </div>
      </div>
    </div>
    <div class="card" data-step>
      <h3 class="step-title">Kontakt informacije</h3>
      <h4>2. korak od 5</h4>
      <div class="form-group">
        <div class="kontakt">
          <label for="contact_number" id="label-kontakt">
          <span class="content-kontakt">
                  Kontakt broj
              </span><br>
              <input type="text" autocomplete="off" id="kontakt" value="<?php echo isset($data['contact_number']) ? $data['contact_number'] : '' ; ?>" name="contact_number" />
          </label>
          <br />
        </div>
        <div class="email">
          <label for="email" id="label-email">
          <span class="content-email">
                  Email
              </span><br>
              <input type="text" autocomplete="off" id="email" value="<?php echo isset($data['email']) ? $data['email'] : '' ; ?>" name="email" />
          </label>
          <br />
        </div>
        <div class="url">
          <label for="website_url" id="label-url">
          <span class="content-url">
                  Link mrežne stranice
              </span><br>
              <input type="text" autocomplete="off" id="url" value="<?php echo isset($data['website_url']) ? $data['website_url'] : '' ; ?>" name="website_url" />
          </label>
          <br />
          <button type="button" data-previous class="before">Prethodno</button>
          <button type="button" data-next class="submit">Sljedeće</button>
          <button type="button" data-next class="quitForm"><a href="serviceProvider.php"><img src="../Assets/x.svg" alt="poništavanje">Odustani</a></button>
        </div>
      </div>
    </div>

    <div class="card" data-step>
      <h3 class="step-title">Napomena</h3>
      <h4>3. korak od 5</h4>
      <div class="form-group">
      <div class="napomena">
          <label for="remark" id="label-napomena">
          <span class="content-naziv">
                  Napomena
              </span><br>
              <textarea name="remark" id="napomena" value="<?php echo isset($data['remark']) ? $data['remark'] : '' ; ?>" cols="30" rows="10"></textarea>
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
        // foreach ($getLastInserted as $key) {
        //   echo "<h3>" . $key['naziv_pruzatelja'] . "</h3>";
        //   $idPruz = $key['idPruz'];
        // }
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
