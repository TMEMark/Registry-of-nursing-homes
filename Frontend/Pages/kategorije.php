<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "Components/header.html";
require "../../Backend/select.php";
require "Components/header_admin.php";
?>


<div class="container"><a href="form_kategorije.php">
  <img src="../Assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>
<style>
    @media (max-width:991px){
    #viewport{
        display: none;
    }
}
  </style> 
  
<?php
foreach ($selectKat as $keyK){
?>
      <div class="container">
        <div class="row d-lg-none d-xl-none">
          <div class="col-10">
            <p><b><?php echo $keyK["naziv_kategorije"] ?></b></p>
          </div>

          <div class="col-2">
          <a href="form_kategorije.php?idKategorija=<?php echo $keyK["idKategorija"]; ?>"><img src="../Assets/update.svg" alt="Update"></a>

          <a href ="../../Backend/Controller/kategorije.php?delete=<?php echo $keyK["idKategorija"]; ?>"><img src="../Assets/delete.svg" alt="Delete"></a>
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
              <td>Kategorija</td>
            </tr>
            </thead>

<?php
foreach ($selectKat as $keyKat){
?>
            <tr>
              <td><?php echo $keyKat["naziv_kategorije"]; ?></td>
              <td>
              <a href="form_kategorije.php?idKategorija=<?php echo $keyKat["idKategorija"]; ?>"><img src="../Assets/update.svg" alt="Update"></a>

              <a href="../../Backend/Controller/kategorije.php?delete=<?php echo $keyKat["idKategorija"];?>"><img src="../Assets/delete.svg" alt="Delete"></a>
              </td>
<?php 
} 
?>
          </table>
        </div>
      </div>



<script type="text/javascript" src="../JavaScript/kategorije.js"></script>

<?php
require "Components/footer.html";
?>
