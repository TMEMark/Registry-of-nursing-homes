<div class="container d-none d-md-none d-lg-block">
    <div id="viewport">
      <div id="sidebar" class="">
        <img src="../Components/assets/user.svg" alt="admin" id="admin">
<pre>
</pre>
        <?php 
        echo $_SESSION["user"];
        ?>

        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search"  style="font-family: 'Font Awesome 5 Free'; font-weight: 700" placeholder=" &#xf002; Search" aria-label="Search">
        </form>
        
        <table class="nav">

          <tr>
            <td id="celija_pruzatelji">
              <a href="pruzatelji.php" id="pruzatelji"><img src="../Components/assets/home.svg" id="ikona_pruzatelji"/></a>
            </td>
            <td>
              <a href="pruzatelji.php" id="pruzatelji">PRUŽATELJI</a>
            </td>
          </tr>

          <tr>
            <td id="celija_usluge">
              <a href="usluge.php"><img src="../Components/assets/open-hand.svg" id="ikona_usluge"/></a>
            </td>
            <td>
              <a href="usluge.php" id="usluge">USLUGE</a>
            </td>
          </tr>

          <tr>
            <td id="celija_kategorije">
              <a href="kategorije.php"><img src="../Components/assets/list-menu.svg" id="ikona_kategorije"/></a>
            </td>
            <td>
              <a href="kategorije.php" id="kategorije">KATEGORIJE</a>
            </td>
          </tr>

          <tr>
            <td id="celija_admin">
              <a href="admin.php"><img src="../Components/assets/admin.svg" id="ikona_admin"/></a>
            </td>
            <td>
              <a href="admin.php" id="admin">ADMINI</a>
            </td>
          </tr>
        </table>
        
      </div>
    </div>
  </div>