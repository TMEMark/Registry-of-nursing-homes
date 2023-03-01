<?php
require "Components/header.html";
require "../../Backend/select.php";
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
            <form action="../../Backend/Controller/LoginSystem/login.php" method="post">
              <div class="form-group">
                <label>Korisničko ime</label>
                <input name="username" type="text" class="form-control" value="<?php ?>">
              </div>

              <div class="form-group">
                <label>Lozinka</label>
                <input name="password" type="password" class="form-control" value="<?php ?>">
              </div>
              
              <input type="submit" name="submit" value="Login" class="button">
              <button type="button" class="btn btn-outline-secondary" id="quit"><a href="indexRegistry.php"><img src="../Assets/x.svg" alt="poništavanje">Odustani</a></button>

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
