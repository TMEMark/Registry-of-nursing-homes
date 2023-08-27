<?php
require "Components/header.php";

?>


<div class="indexPage">
  <div class="gridMain">
    <div class="filters">
      <div class="txtFilters">
        <p id="filterTxtOne"><label for="filterTxtOne">Filtriraj prema</label></p>
        <p id="filterTxtTwo"><a href='indexRegistry.php' id="clickFilterTxtTwo" onclick="resetCheckboxes()"><label for="clickFilterTxtTwo"> Resetiraj filtere </label></a></p>
      </div>
      <hr class="filterHr">
      <div class="filtersLSC">
        <!-- <form> -->
        <div class="filterLocation">
          <p class="filterTitle" id = "location"><label for="filterTitle">ŽUPANIJE</label></p>
          <?php
          
          $rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/LocationController.php';

$curl = curl_init($rest_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($curl);

if ($json_data === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $location_data = json_decode($json_data);

    if ($location_data === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($location_data as $location) {
    echo "<input type='checkbox' id='ftLocation_$location->id' value='$location->id' name='location' onchange='updateFilters()'><img src='../Assets/location.svg' alt=''><label for='ftLocation_$location->id'>" . $location->name . "</label><br>";
}

    }
}

curl_close($curl);


          /*$rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $location_data = json_decode($json_data);
          foreach ($location_data as $location) {
            echo "<input type='checkbox' value='$location->id' name='location' 
            onchange='updateFilters()'><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
          }*/
          ?>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          $rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/ServiceController.php';

$curl = curl_init($rest_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($curl);

if ($json_data === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $service_data = json_decode($json_data);

    if ($service_data === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($service_data as $service) {
    echo "<input type='checkbox' id='ftService_$service->id' value='$service->id' name='service' onchange='updateFilters()'><img src='../Assets/services.svg' alt=''><label for='ftService_$service->id'>" . $service->name . "</label><br>";
}

    }
}

curl_close($curl);


          /*$rest_api_url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceController.php';
          $json_data = file_get_contents($rest_api_url);
          $service_data = json_decode($json_data);
          foreach ($service_data as $service) {
            echo "<input type='checkbox' value='$service->id' name='service' onchange='updateFilters()'><img src='../Assets/services.svg' alt=''>" . $service->name . "<br>";
          }*/
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          $rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/CategoryController.php';

$curl = curl_init($rest_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($curl);

if ($json_data === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $category_data = json_decode($json_data);

    if ($category_data === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($category_data as $category) {
            echo "<input type='checkbox' id='ftCategory_$category->id' value='$category->id' name='category' onchange='updateFilters()'><img src='../Assets/categories.svg' alt=''><label for='ftCategory_$category->id'>" . $category->name . "</label><br>";
        }
    }
}

curl_close($curl);

          /*$rest_api_url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php';
          $json_data = file_get_contents($rest_api_url);
          $category_data = json_decode($json_data);
          foreach ($category_data as $category) {
            echo "<input type='checkbox' value='$category->id' name='category' onchange='updateFilters()'><img src='../Assets/categories.svg' alt=''>" . $category->name . "<br>";
          }*/
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
           $rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/LocationController.php';

$curl = curl_init($rest_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($curl);

if ($json_data === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $location_data = json_decode($json_data);

    if ($location_data === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($location_data as $location) {
            echo "<input type='checkbox' value='$location->id' name='location' onchange='updateFilters()'><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
        }
    }
}

curl_close($curl);
          /*$rest_api_url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $location_data = json_decode($json_data);
          foreach ($location_data as $location) {
            echo "<input type='checkbox' value='$location->id' name='location' onchange='updateFilters()'><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
          }*/
          ?>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          $rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/ServiceController.php';

$curl = curl_init($rest_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($curl);

if ($json_data === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $service_data = json_decode($json_data);

    if ($service_data === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($service_data as $service) {
            echo "<input type='checkbox' value='$service->id' name='service' onchange='updateFilters()'><img src='../Assets/services.svg' alt=''>" . $service->name . "<br>";
        }
    }
}

curl_close($curl);

          /*$rest_api_url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceController.php';
          $json_data = file_get_contents($rest_api_url);
          $service_data = json_decode($json_data);
          foreach ($service_data as $service) {
            echo "<input type='checkbox' value='$service->id' name='service' onchange='updateFilters()'><img src='../Assets/services.svg' alt=''>" . $service->name . "<br>";
          }*/
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          $rest_api_url = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/CategoryController.php';

$curl = curl_init($rest_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($curl);

if ($json_data === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $category_data = json_decode($json_data);

    if ($category_data === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($category_data as $category) {
            echo "<input type='checkbox' value='$category->id' name='category' onchange='updateFilters()'><img src='../Assets/categories.svg' alt=''>" . $category->name . "<br>";
        }
    }
}

curl_close($curl);
          /*$rest_api_url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php';
          $json_data = file_get_contents($rest_api_url);
          $category_data = json_decode($json_data);
          foreach ($category_data as $category) {
            echo "<input type='checkbox' value='$category->id' name='category' onchange='updateFilters()'><img src='../Assets/categories.svg' alt=''>" . $category->name . "<br>";
          }*/
          ?>
        </div>
      </div>
    </div>

    <div class="gridNursingHomes">

      <div class="intro">
        <div class="txtIcon">
          <img src="../Assets/home.svg" alt="Pružatelji">
          <p class="txtPruzatelji" id="serviceProvider"><label for="serviceProvider">PRUŽATELJI</label></p>
        </div>
        <!-- <p class="noResults">x rezultata</p> -->
      </div>


      <div class="gridDescNursingHomes" id="resultContainer">
        <div>
          <?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $endpoint = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/DynamicSearchController.php' . '?' . $_SERVER['QUERY_STRING'];

    $curl = curl_init($endpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($curl);

    if ($data === false) {
        echo "cURL Error: " . curl_error($curl);
    } else {
        $array = json_decode($data);

        if ($array === null) {
            echo "JSON Decoding Error: " . json_last_error_msg();
        } else {
            foreach ($array as $serviceProvider) {
                ?>
                <div class="imgDesc">
                    <div class="imgNursingHomes">
                        <img src="../Assets/img_NursingHome.png" alt="Service provider" class="image">
                    </div>
                    <div class="dataDesc">
                        <div class="mainInfo">
                            <p id="nameNursingHome">
                                <label for = "nameNursingHome">
                                <?php echo $serviceProvider->name; ?>
                                </label>
                            </p>
                            <p id="nameLocation">
                                <label for = "nameLocation">
                                <?php echo $serviceProvider->location; ?>
                                </label>
                            </p>
                        </div>
                        <hr>
                        <div class="servicesCategories">
                            <p id="nameServicesCategories">
                                <label for = "nameServicesCategories">
                                <?php echo $serviceProvider->services . " " . ' <br> ' . $serviceProvider->categories . " "; ?>
                                </label>
                            </p>
                        </div>
                        <hr>
                        <div class="btnDetails">
                            <a href="details.php?id=<?php echo $serviceProvider->service_provider_id ?>">
                                <button type="button" name="button" class="buttonNursingHome" id = "buttonNursingHomeDetail"
                                        data-id="<?php echo $serviceProvider->service_provider_id ?>">
                                    Prikaži detalje
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }

    curl_close($curl);
}
?>

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
$fetchUrl = 'https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/ServiceProviderController.php';

$curl = curl_init($fetchUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$jsonData = curl_exec($curl);

if ($jsonData === false) {
    echo "cURL Error: " . curl_error($curl);
} else {
    $responseData = json_decode($jsonData);

    if ($responseData === null) {
        echo "JSON Decoding Error: " . json_last_error_msg();
    } else {
        foreach ($responseData as $serviceProvider) {
            ?>
            <p id="nameNursingHome">
                <a href="details.php?id=<?php echo $serviceProvider->service_provider_id ?>" id="nameNursingHome">
                    <img src='../Assets/img_NursingHome.png' alt='sp' id="img_mobile"> <br>
                    <label for = "nameNursingHome">
                    <?php echo $serviceProvider->name; ?>
                    </label>
                </a>
            </p>
            <p id="nameLocation">
                <label for = "nameLocation">
                <?php echo $serviceProvider->location; ?>
                </label>
            </p>
            <?php
        }
    }
}

curl_close($curl);
?>

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
