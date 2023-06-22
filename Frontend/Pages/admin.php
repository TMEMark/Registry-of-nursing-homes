<?php
//require "../../Backend/Controller/LoginSystem/session.php";
//require "../../Backend/Controller/LoginSystem/adminRole.php";
require "Components/header.html";
//require "../../Backend/select.php";
require "Components/header_admin.php";
?>

<div class="container"><a href="form_admin.php">
    <img src="../Assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>
<style>
  @media (max-width:991px) {
    #viewport {
      display: none;
    }
  }
</style>
<?php
$rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php';
$json_data = file_get_contents($rest_api_url);
$response_data = json_decode($json_data);
foreach ($response_data as $user_data) {
  ?>


  <div class="container">
    <div class="row d-lg-none d-xl-none">
      <div class="col-10">
        <p><b>
            <?php echo $user_data->username; ?>
          </b></p>
        <p>Ime i prezime:
          <?php echo $user_data->firstname . " " . $user_data->lastname; ?>
        </p>
        <p>Uloga:
          <?php echo $user_data->roleName; ?>
        </p>
      </div>

      <div class="col-2">
        <a href="form_admin.php?idAdmin=<?php echo $user_data->id; ?>">
          <img src="../Assets/update.svg" alt="Update">
        </a>

        <a href="../../Backend/Controller/admin.php?delete=<?php echo $admin["idAdmin"]; ?>"><img
            src="../Assets/delete.svg" alt="Delete"></a>
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
          <!-- <td>Lozinka</td> -->
        </tr>
      </thead>

      <?php
      $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php';
      $json_data = file_get_contents($rest_api_url);
      $response_data = json_decode($json_data);
      foreach ($response_data as $user_data) {
        ?>
        <tr>
          <td>
            <?php echo $user_data->username; ?>
          </td>
          <td>
            <?php echo $user_data->firstname . " " . $user_data->lastname; ?>
          </td>
          <td>
            <?php echo $user_data->roleName; ?>
          </td>
          <!-- <td><?php echo $admin["lozinka"]; ?></td> -->
          <td>
            <a href="form_admin.php?idAdmin=<?php echo $user_data->id; ?>">
              <img src="../Assets/update.svg" alt="Update">
            </a>

            <a href="http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php?id=<?php echo $user_data->id; ?>"
              onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')) { document.getElementById('delete-form-<?php echo $user_data->id; ?>').submit(); }">
              <img src="../Assets/delete.svg" alt="Delete">
            </a>
            <form id="delete-form-<?php echo $admin["idAdmin"]; ?>"
              action="http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/UserController.php"
              method="POST" style="display: none;">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="<?php echo $user_data->id; ?>">
            </form>
          </td>
          <?php
      }
      ?>
    </table>
  </div>
</div>

<script type="text/javascript" src="../JavaScript/admin.js"></script>

<?php
require "Components/footer.html";
?>