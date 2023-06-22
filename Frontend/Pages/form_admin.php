<link rel="stylesheet" href="../Styles/styleAdmin.css">
<?php
//include "../../Backend/Controller/LoginSystem/session.php";
require "Components/header.html";
//require "../../Backend/select.php";

// if(isset($_GET["idAdmin"]) && $_GET["idAdmin"] > 0){
//   $queryAdmin = $db->query("SELECT * 
//   FROM administratori a 
//   INNER JOIN uloge u ON a.uloga = u.idUloga 
//   WHERE a.idAdmin =" . $_GET["idAdmin"]);
//   $Admin = $queryAdmin ->fetchAll();

//   $idAdmin = $_GET["idAdmin"];
//   $ime = $Admin[0]["ime_admina"];
//   $prezime = $Admin[0]["prezime_admina"];
//   $username = $Admin[0]["korisnicko_ime"];
//   $role = $Admin[0]["uloga"];
//   $lozinka = $Admin[0]["lozinka"];
// }else{
//   $idAdmin = "";
//   $ime = "";
//   $prezime = "";
//   $username = "";
//   $role = "";
//   $lozinka = "";
// }
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
            <form action="http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php" method="POST">
<?php
// $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php';
// $json_data = file_get_contents($rest_api_url);
// $response_data = json_decode($json_data);
// foreach($response_data as $user_data){
?>
            <!-- <input type="hidden" name="id_admin"> -->

            <div class="form-group">
                <label for="firstname">Ime</label>
                <input name="firstname" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="lastname">Prezime</label>
                <input name="lastname" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="username">Korisničko ime</label>
                <input name="username" type="text" class="form-control">
            </div>

            <!-- <div class="form-group">
                <label>Lozinka</label>
                <input name="lozinka" type="text" class="form-control">
            </div> -->

            <div class="form-group">
                <label for="role">Uloga</label>
                <br>
                <select name="role" id="role">
                  <option value="">Odaberi ulogu</option>
                  <option value="1" <?php 
                  //echo ($user_data->roleName == "1") ? "selected" : "" ?>>Administrator</option>
                  <option value="2" <?php 
                  //echo ($user_data->roleName == "2") ? "selected" : "" ?>>Moderator</option>
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

