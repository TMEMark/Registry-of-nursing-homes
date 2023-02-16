<?php
require "Components/header.html";
//require  "../../Backend/search.php";
//require "../Components/dropdown_menu.php";
require "../SveZaBazu/pdo.php";
$queryLok = $db -> query ("SELECT * FROM lokacija");
$resultsLok = $queryLok->fetchAll();

$queryUsl = $db -> query ("SELECT * FROM usluge");
$resultsUsl = $queryUsl->fetchAll();

$queryKat = $db -> query ("SELECT * FROM kategorije");
$resultsKat = $queryKat->fetchAll();
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
          foreach ($resultsLok as $lokacija) { ?>
            <label class="location">
              <input type="checkbox" id="checkbox">
              <img src="../Assets/location.svg" alt="">
              <span class="checkmark"><?php echo $lokacija["naziv_lokacije"] ?></span>
            </label><br>
            <?php
          }
          ?>
        </div>
        <div class="filterServices">
          <p class="filterTitle">USLUGE</p>
          <?php
          foreach ($resultsUsl as $usluga) { ?>
          <label class="location">
            <input type="checkbox" id="checkbox">
            <img src="../Assets/services.svg" alt="">
            <span class="checkmark"><?php echo $usluga["naziv_usluge"] ?></span>
          </label><br>
          <?php
        }
        ?>
        </div>
        <div class="filterCategories">
          <p class="filterTitle">KATEGORIJE</p>
          <p class="filterTitle" style="margin-left: 10px"> Skrb i usluge za:</p>
          <?php
          foreach ($resultsKat as $kategorija) { ?>
          <label class="location">
            <input type="checkbox" id="checkbox">
            <img src="../Assets/categories.svg" alt="">
            <span class="checkmark"><?php echo $kategorija["naziv_kategorije"] ?></span>
          </label><br>
          <?php
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
  </div>
</div>