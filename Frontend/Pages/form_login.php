<?php
require "Components/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  // Create an associative array with the form data
  $data = array(
      'username' => $username,
      'password' => $password
  );
  // Encode the data as JSON
  $jsonData = json_encode($data);
  // Send the JSON data to the backend using cURL
  $url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/AuthController.php?action=login';

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);

  if ($response === false) {
      echo 'Error: ' . curl_error($ch);
  } else {
      echo '';
  }

  curl_close($ch);
}
?>

<div class="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="mb-4">
              <h3>Prijava</h3>
              <p class="mb-4">Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</p>
            </div>
            <form action="form_login.php" method="POST">
              <div class="form-group">
                <label for="username">Korisničko ime</label>
                <input name="username" type="text" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="password">Lozinka</label>
                <input name="password" type="password" class="form-control" required>
              </div>
              
              <input type="submit" name="submit" value="Login" class="button">
              <button type="button" class="btn btn-outline-secondary" id="quit"><a href="indexRegistry.php"><img src="../Assets/x.svg" alt="quit">Odustani</a></button>

            </form>
            <?php
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

              if (strpos($fullUrl, "login=empty")){
                echo "<p class='erMsg'> Ispunite sva polja za login</p>";
                exit();
              }

              if (strpos($fullUrl, "data=wrong")){
                echo "<p class='erMsg'> Korisničko ime i/ili lozinka nisu ispravni.</p>";
                exit();
              }
            ?>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
