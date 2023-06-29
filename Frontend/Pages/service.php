<?php
require "Components/header.php";
require "Components/header_admin.php";
require "Components/authCheck.php";
?>
<style>
  @media (max-width:991px) {
    #viewport {
      display: none;
    }
  }
</style>
<div class="container"><a href="form_service.php">
    <img src="../Assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>

<?php
$rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceController.php';
$json_data = file_get_contents($rest_api_url);
$response_data = json_decode($json_data);
foreach ($response_data as $service_data) {
  ?>

  <div class="container">
    <div class="row d-lg-none d-xl-none">
      <div class="col-10">
        <p><b>
            <?php echo $service_data->name; ?>
          </b></p>
      </div>

      <div class="col-2">

        <a href="form_service.php?id=<?php echo $service_data->id; ?>" data-id="<?php echo $service_data->id ?>">
          <img src="../Assets/update.svg" alt="Update"></a>

          <a href="#"
              onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati?')) { deleteService(<?php echo $service_data->id; ?>); }">
              <img src="../Assets/delete.svg" alt="Delete">
            </a>
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
      foreach ($response_data as $service_data) {
        ?>
        <tr>
          <td>
            <?php echo $service_data->name; ?>
          </td>

          <td>
            <a href="form_service.php?id=<?php echo $service_data->id; ?>" data-id="<?php echo $service_data->id ?>"><img
                src="../Assets/update.svg" alt="Update"></a>
            <a href="#"
              onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati?')) { deleteService(<?php echo $service_data->id; ?>); }">
              <img src="../Assets/delete.svg" alt="Delete">
            </a>
          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
</div>

<script type="text/javascript" src="../JavaScript/service.js"></script>
<script>
  function deleteService(id) {
    const url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceController.php?id=<?php echo $service_data->id ?>';

    fetch(url, {
      method: 'DELETE',
      body: JSON.stringify({ id: id }),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => {
        if (response.ok) {
          // Redirect or perform any additional actions after successful deletion
          window.location.href = 'service.php';
        } else {
          // Handle the error case
          console.error('Failed to delete service');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>
<?php
require "Components/footer.html";
?>