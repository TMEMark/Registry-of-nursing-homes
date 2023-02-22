<?php
require "Components/header.html";
require  "../../Backend/search.php";
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
                foreach ($selectLok as $keyLok){
                  $checked="";
                  if($_GET['zupanija'] == $keyLok['naziv_lokacije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . ($keyLok['naziv_lokacije']);
                };
                ?>
            
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php 
                foreach ($selectUsl as $keyUsl){
                  $checked="";
                  if($_GET['usluga'] == $keyUsl['naziv_usluge']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/services.svg' alt=''>" . ($keyUsl['naziv_usluge']);
                };
                ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php 
                foreach ($selectKat as $keyKat){
                  $checked="";
                  if($_GET['kategorija'] == $keyUsl['naziv_kategorije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/categories.svg' alt=''>" . ($keyKat['naziv_kategorije']);
                };
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
                foreach ($selectLok as $keyLok){
                  $checked="";
                  if($_GET['zupanija'] == $keyLok['naziv_lokacije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/location.svg' alt=''>" . ($keyLok['naziv_lokacije']);
                };
                ?>
            
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php 
                foreach ($selectUsl as $keyUsl){
                  $checked="";
                  if($_GET['usluga'] == $keyUsl['naziv_usluge']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/services.svg' alt=''>" . ($keyUsl['naziv_usluge']);
                };
                ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php 
                foreach ($selectKat as $keyKat){
                  $checked="";
                  if($_GET['kategorija'] == $keyUsl['naziv_kategorije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "><img src='../Assets/categories.svg' alt=''>" . ($keyKat['naziv_kategorije']);
                };
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

      <div class="imgNursingHomes">
        <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="image">
      </div>
      <!--MOžda ovdje ni ne treba grid - pogledati kasnije -->
      <div class="gridDescNursingHomes">
        <div class="dataDesc">
          <div class="mainInfo">
            <p id="nameNursingHome">Naziv pružatelja</p>
            <p id="nameLocation">Županija</p>
          </div>
          <hr>
          <div class="servicesCategories">
            <p id="nameServicesCategories">Usluge, kategorije</p>
          </div>
          <hr>
          <div class="btnDetails">
              <a href="details.php">
              <button type="button" name="button" id= "buttonNursingHome">Prikaži detalje</button>
              </a>
          </div>
        </div>
      </div>
    </div>
    <div class="gridDescNursingHomesMobile">
          <div class="intro">
            <div class="txtIcon">
              <img src="../Assets/home.svg" alt="Pružatelji">
              <p class="txtPruzatelji">PRUŽATELJI</p>
            </div>
            <p class="noResults">x rezultata</p>
          </div>
          <div class="mainInfo">
            <p id="nameNursingHome">Naziv pružatelja</p>
            <p id="nameLocation">Županija</p>
          </div>
          <div class="imgNursingHomes">
            <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="img">
          </div>
        </div>    
  </div>
</div>
<?php
require "Components/footer.html";
 ?>
