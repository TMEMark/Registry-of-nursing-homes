<?php
require "Components/header.html";
//require  "../../Backend/search.php";
//require "../Components/dropdown_menu.php";

?>
<div class="indexPage">
  <div class="gridMain">
    <div class="filters">
      <div class="txtFilters">
        <p id="filterTxtOne">Filtriraj prema</p>
        <p id="filterTxtTwo">Resetiraj filtere</p>
      </div>
      <hr class="filterHr">
      <div class="filtersLSC">
      <div class="filterLocation">
          <p class="filterTitle">ŽUPANIJE</p>
          <?php 
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $response_data = json_decode($json_data);
                // foreach ($selectLok as $keyLok){
                //   $checked="";
                //   if($_GET['zupanija'] == $keyLok['naziv_lokacije']){
                //     $checked=" checked=\"checked\" ";
                //   }
                //   echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . ($keyLok['naziv_lokacije']);
                // };
                foreach($response_data as $location){
                  $checked="";
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
                }
                ?>
            
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php 
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceController.php';
          $json_data = file_get_contents($rest_api_url);
          $response_data = json_decode($json_data);
          foreach($response_data as $service){
            $checked="";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $service->name . "<br>";
          }
                // foreach ($selectUsl as $keyUsl){
                //   $checked="";
                //   if($_GET['usluga'] == $keyUsl['naziv_usluge']){
                //     $checked=" checked=\"checked\" ";
                //   }
                //   echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/services.svg' alt=''>" . ($keyUsl['naziv_usluge']);
                // };
                ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php 
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/CategoryController.php';
          $json_data = file_get_contents($rest_api_url);
          $response_data = json_decode($json_data);
          foreach($response_data as $category){
            $checked="";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $category->name . "<br>";
          }
                // foreach ($selectKat as $keyKat){
                //   $checked="";
                //   if($_GET['kategorija'] == $keyKat['naziv_kategorije']){
                //     $checked=" checked=\"checked\" ";
                //   }
                //   echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/categories.svg' alt=''>" . ($keyKat['naziv_kategorije']);
                // };
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
          $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/LocationController.php';
          $json_data = file_get_contents($rest_api_url);
          $response_data = json_decode($json_data);
          foreach($response_data as $location){
            $checked="";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $location->name . "<br>";
          }
                // foreach ($selectLok as $keyLok){
                //   $checked="";
                //   if($_GET['zupanija'] == $keyLok['naziv_lokacije']){
                //     $checked=" checked=\"checked\" ";
                //   }
                //   echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . ($keyLok['naziv_lokacije']);
                // };
                ?>
            
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php 
                // foreach ($selectUsl as $keyUsl){
                //   $checked="";
                //   if($_GET['usluga'] == $keyUsl['naziv_usluge']){
                //     $checked=" checked=\"checked\" ";
                //   }
                //   echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/services.svg' alt=''>" . ($keyUsl['naziv_usluge']);
                // };
                $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceController.php';
                $json_data = file_get_contents($rest_api_url);
                $response_data = json_decode($json_data);
                foreach($response_data as $service){
                  $checked="";
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $service->name . "<br>";
                }
                ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php 
                // foreach ($selectKat as $keyKat){
                //   $checked="";
                //   if($_GET['kategorija'] == $keyUsl['naziv_kategorije']){
                //     $checked=" checked=\"checked\" ";
                //   }
                //   echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/categories.svg' alt=''>" . ($keyKat['naziv_kategorije']);
                // };

                $rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/CategoryController.php';
          $json_data = file_get_contents($rest_api_url);
          $response_data = json_decode($json_data);
          foreach($response_data as $category){
            $checked="";
            echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . $category->name . "<br>";
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
        <p class="noResults">x rezultata</p>
      </div>


      <div class="gridDescNursingHomes">
      <?php
            $fetchUrl = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceProviderController.php';
            $jsonData = file_get_contents($fetchUrl);
            $responseData = json_decode($jsonData);
            foreach($responseData as $serviceProvider){ 
            ?>
       <div id="flexImageAndDesc">
        <!-- <div class="imgNursingHomes">
        <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="image">
        </div> -->
        <div class="dataDesc">
          <div class="mainInfo">
         
            <p id="nameNursingHome"><?php echo $serviceProvider->name; ?></p>
            <p id="nameLocation"><?php echo $serviceProvider->location; ?></p>
          </div>
          <hr>
          <div class="servicesCategories">
            <p id="nameServicesCategories"><?php echo $serviceProvider->services . ' <br> ' . $serviceProvider->categories; ?></p>
          </div>
          <hr>
          <div class="btnDetails">
              <a href="details.php?id=<?php echo $key["idPruz"] ?>">
              <button type="button" name="button" id= "buttonNursingHome">Prikaži detalje</button>
              </a>
          </div>
          <?php } ?>  
        </div>
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
            foreach($responseData as $serviceProvider){ 
            ?>
            <p id="nameNursingHome"><?php echo $serviceProvider->name; ?></p>
            <p id="nameLocation"><?php echo $serviceProvider->location; ?></p>
            <?php } ?>
          </div>
          <!-- <div class="imgNursingHomes">
            <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="img">
          </div> -->
           
        </div>  
        
<?php
require "Components/footer.html";
 ?>
