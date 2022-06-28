<?php
include "../../Backend/Controller/LoginSystem/session.php";
//require "../Components/header.html";
//require "../Components/dropdown_menu.html";
//require "../Components/header.html";
//require "../Components/header_admin.html";
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Styles/style_formPruzatelji.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <script src="../JavaScript/script.js" defer></script>
  <title>Unos pružatelja</title>
</head>
<body>
<div class="grid">
  
<!--navbar-->
<nav>
<div class="container-fluid">
         <div class="d-none d-lg-block d-xl-block">
          <a href="../Pages/index.php"><img src="../Components/assets/LogoRazvoj.svg" alt="Logo" id="logoRMU"></a>
         </div>
         <div class="d-none d-lg-block d-xl-block">
          <a href="../Pages/pruzatelji.php"><img src="../Components/assets/IzvorLogo.svg" alt="Logo" id="logoIZVOR"></a>
        </div>
</nav>


<!--sidebar-->
<div class="container d-none d-lg-block">
    <div id="viewport">
      <div id="sidebar" class="">
        <img src="../Components/assets/user.svg" alt="admin" id="admin">
        <p>ADMIN</p>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search"  style="font-family: 'Font Awesome 5 Free'; font-weight: 700" placeholder=" &#xf002; Search" aria-label="Search">
        </form>
        
        <table class="nav">

          <tr>
            <td id="celija_pruzatelji">
              <a href="pruzatelji.php" id="pruzatelji"><img src="../Components/assets/home.svg" id="ikona_pruzatelji"/></a>
            </td>
            <td>
              <a href="pruzatelji.php" id="pruzatelji">PRUŽATELJI</a>
            </td>
          </tr>

          <tr>
            <td id="celija_usluge">
              <a href="usluge.php"><img src="../Components/assets/open-hand.svg" id="ikona_usluge"/></a>
            </td>
            <td>
              <a href="usluge.php" id="usluge">USLUGE</a>
            </td>
          </tr>

          <tr>
            <td id="celija_kategorije">
              <a href="kategorije.php"><img src="../Components/assets/list-menu.svg" id="ikona_kategorije"/></a>
            </td>
            <td>
              <a href="kategorije.php" id="kategorije">KATEGORIJE</a>
            </td>
          </tr>

          <tr>
            <td id="celija_admin">
              <a href="admin.php"><img src="../Components/assets/admin.svg" id="ikona_admin"/></a>
            </td>
            <td>
              <a href="admin.php" id="admin">ADMINI</a>
            </td>
          </tr>
        </table>
        
      </div>
    </div>
  </div>


<!--form-->  
  <form data-multi-step class="multi-step-form" action="../../Backend/Controller/pruzateljiUslugeKategorije.php" method="post">
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
        <h4>6. korak od 6</h4> 
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
            <input type="submit" name="submit" value="Unos" class="submit">
            <br>
        </div>
    </div>
  </form>
</div>
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
</body>
</html>