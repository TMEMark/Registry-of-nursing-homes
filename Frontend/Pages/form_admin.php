<link rel="stylesheet" href="../Styles/styleAdmin.css">
<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "Components/header.html";
require "../../Backend/select.php";

if(isset($_GET["idAdmin"]) && $_GET["idAdmin"] > 0){
  $queryAdmin = $db->query("SELECT * 
  FROM administratori a 
  INNER JOIN uloge u ON a.uloga = u.idUloga 
  WHERE a.idAdmin =" . $_GET["idAdmin"]);
  $Admin = $queryAdmin ->fetchAll();

  $idAdmin = $_GET["idAdmin"];
  $ime = $Admin[0]["ime_admina"];
  $prezime = $Admin[0]["prezime_admina"];
  $username = $Admin[0]["korisnicko_ime"];
  $role = $Admin[0]["uloga"];
  $lozinka = $Admin[0]["lozinka"];
}else{
  $idAdmin = "";
  $ime = "";
  $prezime = "";
  $username = "";
  $role = "";
  $lozinka = "";
}
?>

</div>
</nav>

<div class="ilustracija">
  <img src="../Components/assets/ilustracija2.png" alt="Ilustracija" class="illustr">
</div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="mb-4">
              <h3>Unos novog administratora</h3>
            </div>
            <form action="../../Backend/Controller/administratori.php" method="post">

            <input type="hidden" name="id_admin" value="<?php echo $idAdmin;?>">

            <div class="form-group">
                <label>Ime</label>
                <input name="ime" type="text" class="form-control" value="<?php echo $ime;?>">
            </div>

            <div class="form-group">
                <label>Prezime</label>
                <input name="prezime" type="text" class="form-control" value="<?php echo $prezime ?>">
            </div>

            <div class="form-group">
                <label>Korisničko ime</label>
                <input name="username" type="text" class="form-control" value="<?php echo $username; ?>">
            </div>

            <div class="form-group">
                <label>Lozinka</label>
                <input name="lozinka" type="text" class="form-control" value="<?php echo $lozinka; ?>">
            </div>

            <div class="form-group">
                <label>Uloga</label>
                <br>
                <select name="role" id="role">
                  <option value="">Odaberi ulogu</option>
                  <option value="1" <?php 
                  echo ($role == "1") ? "selected" : "" ?>>Administrator</option>
                  <option value="2" <?php 
                  echo ($role == "2") ? "selected" : "" ?>>Moderator</option>
                </select>
            </div>
              
            <input type="submit" name="submit" value="Unos" class="submit">

            <a href="admin.php"><button type="button" id="quitForm"><img src="../Assets/x.svg" alt="poništavanje">Odustani</button></a>

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

