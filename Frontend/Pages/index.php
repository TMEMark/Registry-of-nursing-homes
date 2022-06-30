<?php
require "../Components/header.html";
require "../../Backend/select.php";
require "../Components/dropdown_menu.php";
?>

    
      </nav>

<div class="text container d-none d-lg-block">
        <div id="viewport">
          <div id="sidebar" style="margin-top: 100px">
            <form method="get">

              <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page"><a href="../../index.php">Home</a></li>
                </ol>
              </nav>

          <input class="form-control mr-sm-2" type="search" name="search" id="search" style="font-family: 'Font Awesome 5 Free'; font-weight: 700" placeholder=" &#xf002; Search" aria-label="Search">

          <select class="form-select" class="js-example-basic-multiple" aria-label="Default select example" name="zupanija" id="zupanija">
          <option selected><img src="../Components/assets/home.svg" alt="Županija" class="">ŽUPANIJA</option>
          <?php 
                foreach ($selectLok as $keyLok){
                  $selected="";
                  if($_GET['zupanija'] == $keyLok['naziv_lokacije']){
                    $selected=" selected=\"selected\" ";
                  }
                  echo "<option " . $selected . ">" . ($keyLok['naziv_lokacije']) . "</option>";
                };
                ?>
          </select>

              <select class="form-select" aria-label="Default select example" name="usluga" id="usluga">
                <option selected><img src="../Components/assets/open-hand.svg" alt="Usluge">USLUGE</option>
                <?php 
                foreach ($selectUsl as $keyUsl){
                  $selected="";
                  if($_GET['usluga'] == $keyUsl['naziv_usluge']){
                    $selected=" selected=\"selected\" ";
                  }
                  echo "<option" . $selected . ">" . $keyUsl['naziv_usluge'] . "</option>";
                };
                ?>
              </select>

              <select class="form-select" aria-label="Default select example" name="kategorija" id="kategorija">
                <option selected><img src="../Components/assets/list-menu.svg" alt="Kategorije">KATEGORIJE</option>
                <?php 
                foreach ($selectKat as $keyKat){
                  $selected="";
                  if($_GET['kategorija'] == $keyKat['naziv_kategorije']){
                  $selected=" selected=\"selected\" ";
                }
                echo "<option" . $selected . ">" . $keyKat['naziv_kategorije'] . "</option>";
                };
                ?>
              </select>
              <input type="submit" value="Prikaži" name="submit" class="submit" id="prikazi"><br>
            </form>
            <a href="index.php"><button type="button" class="btn btn-outline-secondary"><img src="../Components/assets/x.svg" alt="poništavanje">Poništi filtere</button></a>
         
          </div>

        </div>
</div>

<?php
require "../Components/header_puk.php";
?>

<div class="container overflow-hidden">
  <div class="row gx-5">
        <?php
          if(isset($_POST["pruzatelj"]) || isset($_POST["usluga"]) || isset($_POST["kategorija"]) || isset($_POST["search"])){
            foreach($selectPruzUslKat as $key){
              if ($key["naziv_lokacije"] == $_POST["zupanija"] || $key["naziv_usluge"] == $_POST["usluga"] || $key["naziv_kategorije"] == $_POST["kategorija"] || $key["naziv_pruzatelja"] == $_POST["search"]) {
                echo "<div class='col'>";
                echo "<div class='p-3 border bg-light'>";
                echo "<p>" . "<b>" . $key["naziv_pruzatelja"] . "</b>" . "</p>";
                echo "<p>" . "<b>" . $key["naziv_usluge"] . "</b>" . "</p>";
                echo "<p>" . "<b>" . $key["naziv_kategorije"] . "</b>" . "</p>"; 
                echo "<p>" . "<b>" . $key["naziv_lokacije"] . "</b>" . "</p>";?> 
                <a href='detail.php?id=<?php echo $key["idPruz"] ?>' id='more'>Prikaži više</a>
                <?php
                echo "</div>";
                echo "</div>";
              };
            };
          }else{
            foreach($selectPruzUslKat as $key){
            echo "<div class='col'>";
            echo "<div class='p-3 border bg-light'>";
            echo "<p>" . "<b>" . $key["naziv_pruzatelja"] . "</b>" . "</p>";
            echo "<p>" . "<b>" . $key["naziv_usluge"] . "</b>" . "</p>";
            echo "<p>" . "<b>" . $key["naziv_kategorije"] . "</b>" . "</p>";
            echo "<p>" . "<b>" . $key["naziv_lokacije"] . "</b>" . "</p>"; ?>
            <a href='detail.php?id=<?php echo $key["idPruz"] ?>' id='more'>Prikaži više</a>
            <?php
            echo "</div>";
            echo "</div>";
            }
          };
        
        ?>


  </div>
</div>

<script>
$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});
</script>

<?php
include("../Components/footer.html");
?>