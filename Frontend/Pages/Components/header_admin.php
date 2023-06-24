<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
          <h1 id="naslov"><strong>Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije</strong></h1>
        </div>
    <hr>
    </div>
</div>

  <div class="filtersCollapsibleAdmin">
        <button type="button" class="collapsible">Odaberi</button>

      <div class="content">
        <?php 
        if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
          $userId = $_SESSION['user_id'];
          $username = $_SESSION['username'];
        echo "<p><img src='../Assets/user.svg' alt='admin' id='admin' style= 'width:40px;'>
        Prijavljeni ste kao: " . $username . "</p>";
      } else {
        echo "Korisnik trenutno nije prijavljen.";
    }
        ?>
        
        <table class="nav">

          <tr>
            <td id="celija_pruzatelji">
              <a href="serviceProvider.php" id="pruzatelji"><img src="../Assets/home.svg" id="ikona_pruzatelji"/></a>
            </td>
            <td>
              <a href="serviceProvider.php" id="serviceProvider">PRUŽATELJI</a>
            </td>
          </tr>

          <tr>
            <td id="celija_usluge">
              <a href="service.php"><img src="../Assets/open-hand.svg" id="ikona_usluge"/></a>
            </td>
            <td>
              <a href="service.php" id="service">USLUGE</a>
            </td>
          </tr>

          <tr>
            <td id="celija_kategorije">
              <a href="category.php"><img src="../Assets/list-menu.svg" id="ikona_kategorije"/></a>
            </td>
            <td>
              <a href="category.php" id="category">KATEGORIJE</a>
            </td>
          </tr>

          <tr>
            <td id="celija_admin">
              <a href="admin.php"><img src="../Assets/admin.svg" id="ikona_admin"/></a>
            </td>
            <td>
              <a href="admin.php" id="admin">ADMINI</a>
            </td>
          </tr>
        </table>
        
      
    </div>
  </div>