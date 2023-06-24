<?php
require "Components/header.php";

?>


<div class="indexPage">
  <div class="gridMain">
    <div class="filters">
      <div class="txtFilters">
        <p id="filterTxtOne">Filtriraj prema</p>
        <p id="filterTxtTwo" ><a id="clickFilterTxtTwo" onclick="resetCheckboxes()"> Resetiraj filtere </a></p>
      </div>
      <hr class="filterHr">
      <div class="filtersLSC">
        <div class="filterLocation">
          <p class="filterTitle">ŽUPANIJE</p>
          <?php
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $location_data = json_decode($json_data);
          foreach ($location_data as $location) {
            $checked = "";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
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
            $checked = "";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $service->name . "<br>";
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
            $checked = "";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $category->name . "<br>";
          }
          ?>
        </div>
      </div>
    </div>

    <div class="filtersCollapsible">
      <button type="button" class="collapsible">Filtriraj</button>

      <div class="content">
        <div class="filterLocation">
          <p class="filterTitle">ŽUPANIJE</p>
          <?php
            $checked = "";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
          ?>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
            $checked = "";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $service->name . "<br>";
          
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
            $checked = "";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $category->name . "<br>";
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
        <p class="noResults">x rezultata</p>
      </div>


      <div class="gridDescNursingHomes" id="resultContainer">
        <div>
          <?php
          $fetchUrl = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceProviderController.php';
          $jsonData = file_get_contents($fetchUrl);
          $serviceProvider_data = json_decode($jsonData);
          foreach ($serviceProvider_data as $serviceProvider) {
            ?>
            <div class="imgDesc">
              <div class="imgNursingHomes">
                <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="image">
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
                    <?php echo $serviceProvider->services . ' <br> ' . $serviceProvider->categories; ?>
                  </p>
                </div>
                <hr>
                <div class="btnDetails">
                  <a href="details.php?id=<?php echo $serviceProvider->id ?>">
                    <button type="button" name="button" class="buttonNursingHome"
                      data-id="<?php echo $serviceProvider->id ?>">Prikaži detalje</button>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
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
        <?php echo $serviceProvider->name; ?>
      </p>
      <p id="nameLocation">
        <?php echo $serviceProvider->location; ?>
      </p>
    <?php } ?>
  </div>
  <!-- <div class="imgNursingHomes">
            <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="img">
          </div> -->

</div>
<script>
 function resetCheckboxes() {
    var checkboxes = document.getElementsByTagName('input');
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type === 'checkbox') {
        checkboxes[i].checked = false;
      }
    }
  }
</script>
<?php
require "Components/footer.html";
?>