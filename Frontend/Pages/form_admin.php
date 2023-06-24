<link rel="stylesheet" href="../Styles/styleAdmin.css">
<?php
require "Components/header.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $url = "http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php?id=" . $id;
  $response = file_get_contents($url);
  $data = json_decode($response, true);
} else {
  echo "<label style='margin: 20px'>Unosite novi podatak</label>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $role = $_POST['role'];
  // Create an associative array with the form data
  $data = array(
      'firstname' => $firstname,
      'lastname' => $lastname,
      'username' => $username,
      'role' => $role
  );
  // Encode the data as JSON
  $jsonData = json_encode($data);
  // Send the JSON data to the backend using cURL
  $url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php';

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

    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="mb-4">
              <h3>Unos novog administratora</h3>
            </div>
            <form action="form_admin.php" method="POST">
             <input type="hidden" name="id_admin" value="<?php echo isset($data['id']) ? $data['id'] : '' ; ?>"> 

            <div class="form-group">
                <label for="firstname">Ime</label>
                <input name="firstname" type="text" class="form-control" value="<?php echo isset($data['firstname']) ? $data['firstname'] : '' ; ?>">
            </div>

            <div class="form-group">
                <label for="lastname">Prezime</label>
                <input name="lastname" type="text" class="form-control" value="<?php echo isset($data['lastname']) ? $data['lastname'] : '' ; ?>">
            </div>

            <div class="form-group">
                <label for="username">Korisničko ime</label>
                <input name="username" type="text" class="form-control" value="<?php echo isset($data['username']) ? $data['username'] : '' ; ?>">
            </div>

            <div class="form-group">
                <label>Lozinka</label>
                <input name="lozinka" type="password" class="form-control" value="<?php echo isset($data['password']) ? $data['password'] : '' ; ?>">
            </div>

            <div class="form-group">
                <label for="role">Uloga</label>
                <br>
                <select name="role" id="role">
                  <option value="">Odaberi ulogu</option>
                  <option value="1" <?php 
                   echo  (isset($data['role']) && $data['role'] == 1) ? "selected" : "" ?>>Administrator</option>
                  <option value="2" <?php 
                   echo  (isset($data['role']) && $data['role'] == 2) ? "selected" : "" ?>>Moderator</option>
                </select>
            </div>
          
              
            <input type="submit" name="submit" value="Unos" class="submit">
            
            <a href="admin.php"><button type="button" class="quitForm"><img src="../Assets/x.svg" alt="poništavanje">Odustani</button></a>
            <?php //} ?>
            </form>
            <?php
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              
              if(strpos($fullUrl, "data=empty")){
                echo "<p class='erMsg'> Ispunite sva polja. </p>";
                exit();
              }

              if(strpos($fullUrl, "username=exists")){
                echo "<p class='erMsg'> Korisničko ime već postoji. </p>";
                exit();
              }
            ?>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>

