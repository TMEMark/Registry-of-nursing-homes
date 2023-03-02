<?php
require "Components/header.html";
require "../../Backend/search.php";
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
          <div name="zupanija">
            <?php
            foreach ($selectLok as $keyLok) {
              $checked = "";
              if ($checked == $keyLok['naziv_lokacije']) {
                $checked = " checked=\"checked\" ";
              }
              echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/location.svg' alt=''> <label for='" . ($keyLok['naziv_lokacije']) . "' style= 'color: #858585'>" . ($keyLok['naziv_lokacije']) . "</label><br>";
            }
            ;
            ?>
          </div>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          foreach ($selectUsl as $keyUsl) {
            $checked = "";
            if ($checked == $keyUsl['naziv_usluge']) {
              $checked = " checked=\"checked\" ";
            }
            echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/services.svg' alt=''> <label for='" . ($keyUsl['naziv_usluge']) . "' style= 'color: #858585'>" . ($keyUsl['naziv_usluge']) . "</label> <br>";
          }
          ;
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          foreach ($selectKat as $keyKat) {
            $checked = "";
            if ($checked == $keyKat['naziv_kategorije']) {
              $checked = " checked=\"checked\" ";
            }
            echo "<input type='checkbox' id='checkbox'" . $checked . "> <img src='../Assets/categories.svg' alt=''> <label for='" . ($keyKat['naziv_kategorije']) . "' style= 'color: #858585'>" . ($keyKat['naziv_kategorije']) . "</label> <br>";
          }
          ;
          ?>
          <div class="btnDetails">
                    <a href="">
                      <button type="button" name="btnFilters" id="buttonNursingHome">Primijeni filtere</button>
                    </a>
                  </div>

          <footer>
            <img src="../Assets/Logo_ESF.png" alt="Logo_ESF" id="logo_ESF" style="width:350px;
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

      <div class="content" style = "text-align: left;;">
        <div class="filterLocation">
          <p class="filterTitle">ŽUPANIJE</p>
          <?php
          foreach ($selectLok as $keyLok) {
            $checked = "";
            if ($checked == $keyLok['naziv_lokacije']) {
              $checked = " checked=\"checked\" ";
            }
            echo "<input type='checkbox' id='checkbox'" . $checked . " /> <img src='../Assets/location.svg' alt=''> <label for='" . ($keyLok['naziv_lokacije']) . "' style= 'color: #858585'>" . ($keyLok['naziv_lokacije']) . "</label><br>";
          }
          ;
          ?>

        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          foreach ($selectUsl as $keyUsl) {
            $checked = "";
            if ($checked == $keyUsl['naziv_usluge']) {
              $checked = " checked=\"checked\" ";
            }
            echo "<input type='checkbox' id='checkbox'" . $checked . " /> <img src='../Assets/services.svg' alt=''> <label for='" . ($keyUsl['naziv_usluge']) . "' style= 'color: #858585'>" . ($keyUsl['naziv_usluge']) . "</label> <br>";
          }
          ;
          ?>

        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          foreach ($selectKat as $keyKat) {
            $checked = "";
            if ($checked == $keyKat['naziv_kategorije']) {
              $checked = " checked=\"checked\" ";
            }
            echo "<input type='checkbox' id='checkbox'" . $checked . " /> <img src='../Assets/categories.svg' alt=''> <label for='" . ($keyKat['naziv_kategorije']) . "' style= 'color: #858585'>" . ($keyKat['naziv_kategorije']) . "</label> <br>";
          }
          ;
          ?>
        </div>
        <div class="btnDetails">
                    <a href="">
                      <button type="button" name="button" id="buttonNursingHome">Primijeni filtere</button>
                    </a>
                  </div>
      </div>
    </div>

    <div class="gridNursingHomes">
      <div class="intro">
        <div class="txtIcon">
          <img src="../Assets/home.svg" alt="Pružatelji">
          <p class="txtPruzatelji">PRUŽATELJI</p>
        </div>
        <p class="noResults">
          <?php
          $query = $db->query("SELECT * FROM pruzatelji");
          $result = $query->fetchAll();
          echo count($result) . " rezultata" ?>
        </p>
      </div>

      <div class="dataDiv">
        <?php
        if (is_array($searchTest) || is_object($searchTest)) {
          foreach ($searchTest as $key) { ?>
            <div class="nursingHome">
              <div class="imgNursingHomes">
                <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="image">
              </div>
              <div class="gridDescNursingHomes">
                <div class="dataDesc">
                  <div class="mainInfo">
                    <p id="nameNursingHome">
                      <?php echo $key["naziv_pruzatelja"] ?>
                    </p>
                    <p id="nameLocation">
                      <?php echo $key["naziv_lokacije"] . " županija" ?>
                    </p>
                  </div>
                  <hr>
                  <div class="servicesCategories">
                    <?php
                    $queryUsl = $db->query("SELECT p.naziv_pruzatelja, u.naziv_usluge
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_usluge pu ON p.idPruz = pu.pruzatelj
                    INNER JOIN usluge u ON u.idUsluge = pu.usluga LIMIT 2");
                    $resultsUsl = $queryUsl->fetchAll();
                    ?>
                    <?php
                    $queryKat = $db->query("SELECT p.naziv_pruzatelja, k.naziv_kategorije
                    FROM pruzatelji p
                    INNER JOIN pruzatelji_kategorije pk ON p.idPruz = pk.pruzatelj
                    INNER JOIN kategorije k ON k.idKategorija = pk.kategorija LIMIT 2");
                    $resultsKat = $queryKat->fetchAll();
                    ?>
                    <p id="nameServicesCategories">
                    <p id="serviceData">
                      <?php foreach ($resultsUsl as $usluge) {
                        echo " <img src='../Assets/services.svg' alt=''> " . $usluge["naziv_usluge"];
                      }
                      ?>
                    </p><br>
                    <p id="categoryData">
                      <?php foreach ($resultsKat as $kategorije) {
                        echo " <img src='../Assets/categories.svg' alt=''> " . $kategorije["naziv_kategorije"];
                      }
                      ?>
                    </p>
                  </div>
                  <hr>
                  <div class="btnDetails">
                    <a href="details.php?id=<?php echo $key["idPruz"] ?>">
                      <button type="button" name="button" id="buttonNursingHome">Prikaži detalje</button>
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
        <p class="noResults">
          <?php
          $query = $db->query("SELECT * FROM pruzatelji");
          $result = $query->fetchAll();
          echo count($result) . " rezultata" ?>
        </p>
      </div>
      <?php
      if (is_array($searchTest) || is_object($searchTest)) {
        foreach ($searchTest as $key) { ?>
        <div class="mobileDataDiv">
          <div class="mainInfo">
            <p id="nameNursingHome"><a id="nameNursingHome" href="details.php?id=<?php echo $key["idPruz"] ?>"><?php echo $key["naziv_pruzatelja"] ?></a></p>
            <p id="nameLocation"><?php echo $key["naziv_lokacije"] . " županija" ?></p>
          </div>
          <div class="imgNursingHomes">
            <img src="../Assets/img_NursingHome.png" alt="Nursing home" class="img">
          </div>
          <?php
        }
      }
      ?>
        </div>
        </div>
        <footer>
            <img src="../Assets/Logo_ESF.png" alt="Logo_ESF" id="logo_ESF" style="width:350px;
    height:100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;">
          </footer>
      </div>
      
</div>
<script src="../JavaScript/collapseFilter.js" charset="utf-8" type="text/javascript"></script>