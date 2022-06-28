
<div class="container">
    <div class="row">
        <div class="col-8 col-lg-6 col-xl-6">
          <h1 id="naslov"><strong>Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</strong></h1>
        </div>
    <div class="col-4 col-lg-6 col-xl-6">
        <img src="../Components/assets/pruzatelji_ikona.svg" alt="Pruzatelji" class="icon">
    </div>
    <hr>
    </div>
</div>

<div class="row d-lg-none d-xl-none">
        <form class="d-flex">
           <input style="font-family: 'Font Awesome 5 Free'; font-weight: 700;" class="form-control me-2" type="search" placeholder=" &#xf002; Search" aria-label="Search">
         </form>
         <form>
           <div class="text-center">
             <button class="btn btn-outline-success" type="submit"><img src="../Components/assets/Filter.svg" alt="Filter">Filtriraj</button>
             <button class="btn btn-outline-success" type="submit"><img src="../Components/assets/Poredaj.svg" alt="Poredak">Poredaj</button>
           </div>
         </form>
       </div>

       <div class="container">
        <div class="row">
          <div class="col-4 col-lg-6 col-xl-6" id="results1">
            <?php
            //$query = $db->query("SELECT COUNT(*) FROM pruzatelji");
            //$data = $query->fetchAll();
            ?>
            x rezultata od <!--<?php echo $data[0][0] ?>-->
          </div>
          <div class="col-8 col-lg-6 col-xl-6" id="results2">
            Rezultati po stranici:
            <select>
              <option selected>-</option>
              <option value="3">3</option>
              <option value="5">5</option>
              <option value="10">10</option>
            </select>
          </div>


        </div>
      </div>

      