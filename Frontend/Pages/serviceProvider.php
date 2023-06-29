<?php
require "Components/header.php";
require "Components/header_admin.php";
require "Components/authCheck.php";
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
    @media (max-width:991px) {
      #viewport {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="container"><a href="form_serviceProvider.php">
      <img src="../Assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
  </div>

  <?php
  $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceProviderController.php';
  $json_data = file_get_contents($rest_api_url);
  $response_data = json_decode($json_data);
  foreach ($response_data as $serviceProvider_data) {
    ?>

    <div class="container">
      <div class="row d-lg-none d-xl-none">
        <div class="col-10">
          <p><b>
              <?php echo $serviceProvider_data->name; ?>
            </b></p>
          <!-- <p>OIB: <?php echo $serviceProvider_data->name; ?></p> -->
          <p>
            <?php echo $serviceProvider_data->email; ?>
          </p>
          <p>
            <?php echo $serviceProvider_data->location; ?>
          </p>
          <p>
            <?php echo $serviceProvider_data->address; ?>
          </p>
          <p>Kontakt:
            <?php echo $serviceProvider_data->contact_number; ?>
          </p>
          <p>Web stranica:
            <?php echo $serviceProvider_data->website_url; ?>
          </p>
          <p>Radno vrijeme:
            <?php echo $serviceProvider_data->work_time; ?>
          </p>
        </div>

        <div class="col-2">
          <a href="form_serviceProvider.php?id=<?php echo $serviceProvider_data->service_provider_id ?>">
            <img src="../Assets/update.svg" alt="Update">
          </a>

          <a href="#"
              onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati?')) { deleteServiceProvider(<?php echo $serviceProvider_data->service_provider_id; ?>); }">
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
            <td>Naziv</td>
            <!-- <td>OIB</td> -->
            <td>Email</td>
            <td>Adresa</td>
            <td>Kontakt</td>
            <td>Stranica</td>
            <td>Županija</td>
            <td>Radno vrijeme</td>

          </tr>
        </thead>

        <?php
        foreach ($response_data as $serviceProvider_data) {
          ?>

          <tr>
            <td>
              <?php echo $serviceProvider_data->name; ?>
            </td>
            <!-- <td><?php echo $keyPruzLok["oib"] ?></td> -->
            <td>
              <?php echo $serviceProvider_data->email; ?>
            </td>
            <td>
              <?php echo $serviceProvider_data->address; ?>
            </td>
            <td>
              <?php echo $serviceProvider_data->contact_number; ?>
            </td>
            <td>
              <?php echo $serviceProvider_data->website_url; ?>
            </td>
            <td>
              <?php if ($serviceProvider_data->location == 1) {
                echo $serviceProvider_data->location;
              } else {
                echo $serviceProvider_data->location;
              } ?>
            </td>
            <td>
              <?php echo $serviceProvider_data->work_time; ?>
            </td>


            <td>
            <a href="form_serviceProvider.php?id=<?php echo $serviceProvider_data->service_provider_id ?>">
              <img src="../Assets/update.svg" alt="Update">
              <a href="#"
              onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati?')) { deleteServiceProvider(<?php echo $serviceProvider_data->service_provider_id; ?>); }">
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
  <script type="text/javascript" src="../JavaScript/serviceProvider.js"></script>

  <?php
  require "Components/footer.html";
  ?>
<script>
  function deleteServiceProvider(id) {
    const url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceProviderController.php?id=<?php echo $serviceProvider_data->service_provider_id ?>';

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
          window.location.href = 'serviceProvider.php';
        } else {
          // Handle the error case
          console.error('Failed to delete servicer provider.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>

</body>

</html>