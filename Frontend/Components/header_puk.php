
<div class="container">
    <div class="row">
        <div class="col-8 col-lg-6 col-xl-6">
          <h1 id="naslov"><strong>Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</strong></h1>
        </div>
    <div class="col-4 col-lg-6 col-xl-6">
    <img src="../Components/assets/pruzatelji_ikona.svg" alt="Pruzatelji" class="icon" id="ikona">
    </div>
    <hr>
    </div>
</div>

<div class="row d-sm-block d-md-block d-lg-none d-xl-none">
        <form class="d-flex">
           <input style="font-family: 'Font Awesome 5 Free'; font-weight: 700;" class="form-control me-2" type="search" placeholder=" &#xf002; Search" aria-label="Search">
         </form>


       <div id="show-hide">
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
      </div>

      