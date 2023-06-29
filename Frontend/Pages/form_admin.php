<link rel="stylesheet" href="../Styles/styleAdmin.css">
<?php
require "Components/header.php";
require "Components/authCheck.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $url = "http://localhost/Registry-of-nursing-homes/Backend/rest/controller/UserController.php?id=" . $id;
  $response = file_get_contents($url);
  $data = json_decode($response, true);
} else {
  echo "<label style='margin: 20px'>Unosite novi podatak</label>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
  // Retrieve the form data
  $id = $_POST['id_admin'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $password = $_POST['lozinka'];
  $role = $_POST['role'];

  // Create an associative array with the form data
  $data = array(
    'id_admin' => $id,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'username' => $username,
    'lozinka' => $password,
    'role' => $role
  );

  // Encode the data as JSON
  $jsonData = json_encode($data);

  // Set the endpoint URL
  $url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/UserController.php';

  // Initialize cURL
  $ch = curl_init();

  // Set the cURL options
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, ($_SERVER['REQUEST_METHOD'] === 'PUT') ? 'PUT' : 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  // Execute the cURL request
  $response = curl_exec($ch);

  // Check for errors
  if ($response === false) {
    echo 'Error: ' . curl_error($ch);
  } else {
    echo 'Uspješno dodan/promijenjen korisnik.';
  }

  // Close the cURL session
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
                <input name="firstname" type="text" class="form-control" value="<?php echo isset($data['firstname']) ? $data['firstname'] : '' ; ?>" required>
            </div>

            <div class="form-group">
                <label for="lastname">Prezime</label>
                <input name="lastname" type="text" class="form-control" value="<?php echo isset($data['lastname']) ? $data['lastname'] : '' ; ?>" required>
            </div>

            <div class="form-group">
                <label for="username">Korisničko ime</label>
                <input name="username" type="text" class="form-control" value="<?php echo isset($data['username']) ? $data['username'] : '' ; ?>" required>
            </div>

            <div class="form-group">
                <label>Lozinka</label>
                <input name="lozinka" type="password" class="form-control" value="<?php echo isset($data['password']) ? $data['password'] : '' ; ?>" required>
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

