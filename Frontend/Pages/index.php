<?php
require "../Components/header.html";
require "../../Backend/select.php";
?>

    
      </nav>

<div class="text container d-none d-lg-block">
        <div id="viewport">
          <div id="sidebar" class="">
            <form method="post">

          <input class="form-control mr-sm-2" type="search" name="search" id="search" style="font-family: 'Font Awesome 5 Free'; font-weight: 700" placeholder=" &#xf002; Search" aria-label="Search">

              <select class="form-select" aria-label="Default select example" name="zupanija" id="zupanija">
                <option selected><img src="../Components/assets/home.svg" alt="Županija" class="">ŽUPANIJA</option>
                <?php 
                foreach ($selectLok as $keyLok){
                  echo "<option>" . ($keyLok['naziv_lokacije']) . "</option>";
                };
                ?>
              </select>

              <select class="form-select" aria-label="Default select example" name="usluga">
                <option selected><img src="../Components/assets/open-hand.svg" alt="Usluge" id="usluga">USLUGE</option>
                <?php 
                foreach ($selectUsl as $keyUsl){
                  echo "<option>" . $keyUsl['naziv_usluge'] . "</option>";
                };
                ?>
              </select>

              <select class="form-select" aria-label="Default select example" name="kategorija">
                <option selected><img src="../Components/assets/list-menu.svg" alt="Kategorije" id="kategorija">KATEGORIJE</option>
                <?php 
                foreach ($selectKat as $keyKat){
                  echo "<option>" . $keyKat['naziv_kategorije'] . "</option>";
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

<?php
include("../Components/footer.html");
?>

