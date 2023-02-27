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
          <div name ="zupanija">
          <?php 
                foreach ($selectLok as $keyLok){
                  $checked="";
                  if($checked == $keyLok['naziv_lokacije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/location.svg' alt=''> <label for='" . ($keyLok['naziv_lokacije']) . "' style= 'color: #858585'>" . ($keyLok['naziv_lokacije']) . "</label><br>";
                };
                ?>
                </div>
            
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php 
                foreach ($selectUsl as $keyUsl){
                  $checked="";
                  if($checked == $keyUsl['naziv_usluge']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/services.svg' alt=''> <label for='" . ($keyUsl['naziv_usluge']) . "' style= 'color: #858585'>" . ($keyUsl['naziv_usluge']) . "</label> <br>";
                };
                ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php 
                foreach ($selectKat as $keyKat){
                  $checked="";
                  if($checked == $keyKat['naziv_kategorije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/categories.svg' alt=''> <label for='" . ($keyKat['naziv_kategorije']) . "' style= 'color: #858585'>" . ($keyKat['naziv_kategorije']) . "</label> <br>";
                };
                ?>

<footer>
    <img src="../Assets/Logo_ESF.png" alt="Logo_ESF" id="logo_ESF"
    style="width:350px;
    height:100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;">
  </footer>
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
                  if($checked == $keyLok['naziv_lokacije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/location.svg' alt=''> <label for='" . ($keyLok['naziv_lokacije']) . "' style= 'color: #858585'>" . ($keyLok['naziv_lokacije']) . "</label><br>";
                };
                ?>
            
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php 
                foreach ($selectUsl as $keyUsl){
                  $checked="";
                  if($checked == $keyUsl['naziv_usluge']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/services.svg' alt=''> <label for='" . ($keyUsl['naziv_usluge']) . "' style= 'color: #858585'>" . ($keyUsl['naziv_usluge']) . "</label> <br>";
                };
                ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php 
                foreach ($selectKat as $keyKat){
                  $checked="";
                  if($checked == $keyKat['naziv_kategorije']){
                    $checked=" checked=\"checked\" ";
                  }
                  echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/categories.svg' alt=''> <label for='" . ($keyKat['naziv_kategorije']) . "' style= 'color: #858585'>" . ($keyKat['naziv_kategorije']) . "</label> <br>";
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
        <p class="noResults"><?php 
        $query = $db -> query ("SELECT * FROM pruzatelji");
        $result = $query -> fetchAll();
        echo count($result) . " rezultata" ?></p>
      </div>

      <div class="dataDiv">
  <?php
  if(is_array($searchTest) || is_object($searchTest))
  {
    foreach($searchTest as $key){?>
      <div class="nursingHome">
        <div class="imgNursingHomes">
          <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="image">
        </div>
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
              <a href="details.php?id=<?php echo $key["idPruz"] ?>">
                <button type="button" name="button" id= "buttonNursingHome">Prikaži detalje</button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php
      }    
    }
  ?>
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

