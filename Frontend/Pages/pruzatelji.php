<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "Components/header.html";
require "Components/header_admin.php";
//require "../Components/header_puk.php";
require "../../Backend/select.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Styles/style_table.css">
  <title>Pružatelji</title>
  <style>
    @media (max-width:991px){
    #viewport{
        display: none;
    }
}
  </style>
</head>
<body>
<div class="container"><a href="form_pruzatelji.php">
  <img src="../Assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>

<?php
foreach ($selectPruzLok as $keyPruzLok){
?>
  
      <div class="container">
        <div class="row d-lg-none d-xl-none">
          <div class="col-10">
            <p><b><?php echo $keyPruzLok["naziv_pruzatelja"] ?></b></p>
            <p>OIB: <?php echo $keyPruzLok["oib"] ?></p>
            <p><?php echo $keyPruzLok["email"] ?></p>
            <p><?php echo $keyPruzLok["naziv_lokacije"] ?></p>
            <p><?php echo $keyPruzLok["adresa"] ?></p>
            <p>Kontakt: <?php echo $keyPruzLok["kontakt"] ?></p>
            <p>Web stranica: <?php echo $keyPruzLok["URL_stranice"] ?></p>
            <p>Radno vrijeme: <?php echo $keyPruzLok["radno_vrijeme"] ?></p>
          </div>

          <div class="col-2">
              <a href="form_pruzatelji.php?idPruz=<?php echo $keyPruzLok["idPruz"] ?>"> <img src="../Assets/update.svg" alt="Update"></a>

              <a href ="../../Backend/Controller/pruzatelji.php?delete=<?php echo $keyK["idPruz"]; ?>"><img src="../Assets/delete.svg" alt="Delete"></a>
          </div>
        </div>
      </div>

<?php
}
?>

      <div class="container">
        <div class="row d-none d-lg-block">
          <table class="table">
            <thead>
            <tr>
              <td>Naziv</td>
              <td>OIB</td>
              <td>Email</td>
              <td>Adresa</td>
              <td>Kontakt</td>
              <td>Stranica</td>
              <td>Radno vrijeme</td>
              <td>Županija</td>
            </tr>
          </thead>
        
<?php
foreach ($selectPruzLok as $keyPruzLok){
  $keylokacija = $keyPruzLok["lokacija"];
?>

                <tr>
                <td><?php echo $keyPruzLok["naziv_pruzatelja"]; ?></td>
                <td><?php echo $keyPruzLok["oib"] ?></td>
                <td><?php echo $keyPruzLok["email"]; ?></td>
                <td><?php echo $keyPruzLok["adresa"]; ?></td>
                <td><?php echo $keyPruzLok["kontakt"]; ?></td>
                <td><?php echo $keyPruzLok["URL_stranice"]; ?></td>
                <td><?php echo $keyPruzLok["radno_vrijeme"]; ?></td>
                <td><?php if($keylokacija == 1){
                  echo $keyPruzLok["naziv_lokacije"];
                }else{
                  echo $keyPruzLok["naziv_lokacije"];
                }?></td>
               
                <td>
                <a href="form_pruzatelji.php?idPruz=<?php echo $keyPruzLok["idPruz"];?>"><img src="../Assets/update.svg" alt="Update"></a>
                <a href="../../Backend/Controller/pruzatelji.php?delete=<?php echo $keyPruzLok["idPruz"];?>"><img src='../Assets/delete.svg' alt='Delete'></a>
                </td>
            </tr>
<?php
}
?>
          </table>
        </div>
      </div>
<script type="text/javascript" src="../JavaScript/pruzatelji.js"></script>

<?php
require "Components/footer.html";
?>


</body>
</html>
