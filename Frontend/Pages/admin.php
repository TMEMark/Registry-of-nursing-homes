<?php
require "../../Backend/Controller/LoginSystem/session.php";
//require "../../Backend/Controller/LoginSystem/adminRole.php";
require "../Components/header.html";
require "../../Backend/select.php";
require "../Components/dropdown_menu.html";
require "../Components/header_admin.php";
require "../Components/header_puk.php";

?>

<div class="container"><a href="form_admin.php">
  <img src="../Components/assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>

<?php 
foreach ($selectAdminUloge as $admin){
?>
  
      <div class="container">
        <div class="row d-lg-none d-xl-none">
          <div class="col-10">
            <p><b><?php echo $admin["korisnicko_ime"]; ?></b></p>
            <p>Ime i prezime: <?php echo $admin["ime_admina"] . " " . $admin["prezime_admina"]; ?></p>
            <p>Uloga: <?php echo $admin["nazivUloge"]; ?></p>
            <p>Lozinka: <?php echo $admin["lozinka"]; ?></p>
          </div>

          <div class="col-2">
              <a href="form_admin.php?idAdmin=<?php echo $admin["idAdmin"];?>"><img src="../Components/assets/update.svg" alt="Update"></a>

              <a href ="../../Backend/Controller/admin.php?delete=<?php echo $admin["idAdmin"]; ?>"><img src="../Components/assets/delete.svg" alt="Delete"></a>
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
              <td>Korisničko ime</td>
              <td>Ime i prezime administratora</td>
              <td>Uloga</td>
              <td>Lozinka</td>
            </tr>
            </thead>

<?php 
foreach ($selectAdminUloge as $admin){
?>
            <tr>
              <td><?php echo $admin["korisnicko_ime"]; ?></td>
              <td><?php echo $admin["ime_admina"] . " " . $admin["prezime_admina"]; ?></td>
              <td><?php echo $admin["nazivUloge"]; ?></td>
              <td><?php echo $admin["lozinka"]; ?></td>
              <td>
              <a href="form_admin.php?idAdmin=<?php echo $admin["idAdmin"];?>"><img src="../Components/assets/update.svg" alt="Update"></a>

              <a href ="../../Backend/Controller/administratori.php?delete=<?php echo $admin["idAdmin"]; ?>"><img src="../Components/assets/delete.svg" alt="Delete"></a>
              </td>
<?php
}
?>
          </table>
        </div>
      </div>

<script type="text/javascript" src="../JavaScript/admin.js"></script>

<?php
require "../Components/footer.html" ;
?>
