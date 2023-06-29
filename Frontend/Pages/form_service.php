<?php
require "Components/header.php";
require "Components/authCheck.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $url = "http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceController.php?id=" . $id;
  $response = file_get_contents($url);
  $data = json_decode($response, true);
} else {
  echo "<label style='margin: 20px'>Unosite novi podatak</label>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $serviceName = $_POST['name'];
  // Create an associative array with the form data
  $data = array(
      'name' => $serviceName,
  );
  // Encode the data as JSON
  $jsonData = json_encode($data);
  // Send the JSON data to the backend using cURL
  $url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceController.php';

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
            <form action="form_service.php" method="post">

            <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : '' ; ?>">

              <div class="form-group">
                <label>Naziv usluge</label>
                <input name="name" type="text" class="form-control" value="<?php echo isset($data['name']) ? $data['name'] : '' ; ?>" required>
              </div>

              <input type="submit" name="submit" value="Unos" class="submit">

              <a href="service.php"><button type="button" class="quitForm"><img src="../Assets/x.svg" alt="poništavanje">Odustani</button></a>

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
  
