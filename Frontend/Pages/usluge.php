<?php
include "../../Backend/Controller/LoginSystem/session.php";
require "../Components/header.html";
require "../../Backend/select.php";
require "../Components/dropdown_menu.php";
require "../Components/header_admin.php";
require "../Components/header_puk.php";
?>
   <style>
    @media (max-width:991px){
    #viewport{
        display: none;
    }
}
  </style>   
<div class="container"><a href="form_usluge.php">
  <img src="../Components/assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>

<?php 
foreach ($selectUsl as $keyU){
?>
  
      <div class="container">
        <div class="row d-lg-none d-xl-none">
          <div class="col-10">
            <p><b><?php echo $keyU["naziv_usluge"]; ?></b></p>
          </div>

          <div class="col-2">
              <a href="form_usluge.php?idUsluge=<?php echo $keyU["idUsluge"];?>"><img src="../Components/assets/update.svg" alt="Update"></a>

              <a href ="../../Backend/Controller/kategorije.php?delete=<?php echo $keyU["idUsluge"]; ?>"><img src="../Components/assets/delete.svg" alt="Delete"></a>
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
              <td>Usluga</td>
            </tr>
            </thead>

<?php 
foreach ($selectUsl as $keyUsl){
?>
            <tr>
              <td><?php echo $keyUsl["naziv_usluge"]; ?></td>

              <td>
              <a href="form_usluge.php?idUsluge=<?php echo $keyUsl["idUsluge"];?>"><img src="../Components/assets/update.svg" alt="Update"></a>
              <a href="../../Backend/Controller/usluge.php?delete=<?php echo $keyUsl["idUsluge"];?>"><img src="../Components/assets/delete.svg" alt="Delete"></a> 
              </td>
            </tr>
<?php
}
?>
          </table>
        </div>
      </div>

<script type="text/javascript" src="../JavaScript/usluge.js"></script>

<?php
require "../Components/footer.html";
?>
