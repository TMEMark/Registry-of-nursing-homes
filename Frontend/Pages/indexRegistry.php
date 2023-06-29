<?php
require "Components/header.php";

?>


<div class="indexPage">
  <div class="gridMain">
    <div class="filters">
      <div class="txtFilters">
        <p id="filterTxtOne">Filtriraj prema</p>
        <p id="filterTxtTwo"><a href='indexRegistry.php' id="clickFilterTxtTwo" onclick="resetCheckboxes()"> Resetiraj filtere </a></p>
      </div>
      <hr class="filterHr">
      <div class="filtersLSC">
        <!-- <form> -->
        <div class="filterLocation">
          <p class="filterTitle">ŽUPANIJE</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $location_data = json_decode($json_data);
          foreach ($location_data as $location) {
            echo "<input type='checkbox' value='$location->id' name='location' 
            onchange='updateFilters()'><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
          }
          ?>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceController.php';
          $json_data = file_get_contents($rest_api_url);
          $service_data = json_decode($json_data);
          foreach ($service_data as $service) {
            echo "<input type='checkbox' value='$service->id' name='service' onchange='updateFilters()'><img src='../Assets/services.svg' alt=''>" . $service->name . "<br>";
          }
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/CategoryController.php';
          $json_data = file_get_contents($rest_api_url);
          $category_data = json_decode($json_data);
          foreach ($category_data as $category) {
            echo "<input type='checkbox' value='$category->id' name='category' onchange='updateFilters()'><img src='../Assets/categories.svg' alt=''>" . $category->name . "<br>";
          }
          ?>


        </div>
        <!-- <button type="submit" name="filter" id="filtersBtn">Filtriraj</button>
        </form> -->

      </div>
    </div>


    <div class="filtersCollapsible">
      <button type="button" class="collapsible">Filtriraj</button>

      <div class="content">
        <div class="filterLocation" onload="checkFilters()">
          <p class="filterTitle">ŽUPANIJE</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $location_data = json_decode($json_data);
          foreach ($location_data as $location) {
            echo "<input type='checkbox' value='$location->id' name='location' onchange='updateFilters()'><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
          }
          ?>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceController.php';
          $json_data = file_get_contents($rest_api_url);
          $service_data = json_decode($json_data);
          foreach ($service_data as $service) {
            echo "<input type='checkbox' value='$service->id' name='service' onchange='updateFilters()'><img src='../Assets/services.svg' alt=''>" . $service->name . "<br>";
          }
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/CategoryController.php';
          $json_data = file_get_contents($rest_api_url);
          $category_data = json_decode($json_data);
          foreach ($category_data as $category) {
            echo "<input type='checkbox' value='$category->id' name='category' onchange='updateFilters()'><img src='../Assets/categories.svg' alt=''>" . $category->name . "<br>";
          }
          ?>
        </div>
      </div>
    </div>

    <div class="gridNursingHomes">

      <div class="intro">
        <div class="txtIcon">
          <img src="../Assets/home.svg" alt="Pružatelji">
          <p class="txtPruzatelji">PRUŽATELJI</p>
        </div>
        <!-- <p class="noResults">x rezultata</p> -->
      </div>


      <div class="gridDescNursingHomes" id="resultContainer">
        <div>
          <?php

          if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $endpoint = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/DynamicSearchController.php' . '?' . $_SERVER['QUERY_STRING'];

            $data = file_get_contents($endpoint);
            $array = json_decode($data);
            foreach ($array as $serviceProvider) {

              ?>
              <div class="imgDesc">
                <div class="imgNursingHomes">
                  <img src="../Assets/img_NursingHome.png" alt="Service provider" class="image">
                </div>
                <div class="dataDesc">
                  <div class="mainInfo">

                    <p id="nameNursingHome">
                      <?php echo $serviceProvider->name; ?>
                    </p>
                    <p id="nameLocation">
                      <?php echo $serviceProvider->location; ?>
                    </p>
                  </div>
                  <hr>
                  <div class="servicesCategories">
                    <p id="nameServicesCategories">
                      <?php echo $serviceProvider->services . " " . ' <br> ' . $serviceProvider->categories . " "; ?>
                    </p>
                  </div>
                  <hr>
                  <div class="btnDetails">
                    <a href="details.php?id=<?php echo $serviceProvider->service_provider_id ?>">
                      <button type="button" name="button" class="buttonNursingHome"
                        data-id="<?php echo $serviceProvider->service_provider_id ?>">Prikaži detalje</button>
                    </a>
                  </div>
                </div>
              </div>
            <?php }
          } ?>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="gridDescNursingHomesMobile">
  <!-- <div class="intro">
            <div class="txtIcon">
              <img src="../Assets/home.svg" alt="Pružatelji">
              <p class="txtPruzatelji">PRUŽATELJI</p>
            </div>
            <p class="noResults">x rezultata</p>
          </div> -->
  <div class="mainInfo">
    <?php
    $fetchUrl = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceProviderController.php';
    $jsonData = file_get_contents($fetchUrl);
    $responseData = json_decode($jsonData);
    foreach ($responseData as $serviceProvider) {
      ?>
      <p id="nameNursingHome">
        <a href="details.php?id=<?php echo $serviceProvider->service_provider_id ?>" id="nameNursingHome">
          <img src='../Assets/img_NursingHome.png' alt='sp' id="img_mobile"> <br>
          <?php echo $serviceProvider->name; ?>
        </a>
      </p>
      <p id="nameLocation">
        <?php echo $serviceProvider->location; ?>
      </p>
    <?php } ?>
  </div>
</div>

<?php
require "Components/map.php";
?>

<script>
  function resetCheckboxes() {
    var checkboxes = document.getElementsByTagName('input');
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type === 'checkbox') {
        checkboxes[i].checked = false;
      }
    }
  }

  function updateCheckboxes() {
  var urlParams = new URLSearchParams(window.location.search);

  var checkboxes = document.querySelectorAll("input[name='location'], input[name='service'], input[name='category']");

  checkboxes.forEach(function(checkbox) {
    var checkboxValue = checkbox.value;
    var paramValue = urlParams.get(checkbox.name);
    checkbox.checked = paramValue !== null && paramValue.split(",").includes(checkboxValue);
  });
}

document.addEventListener('DOMContentLoaded', function() {
  updateCheckboxes();
});

document.addEventListener('change', function(event) {
  var target = event.target;
  if (target.matches("input[name='location']") || target.matches("input[name='service']") || target.matches("input[name='category']")) {
    updateFilters();
  }
});
</script>

<?php
require "Components/footer.html";
?>