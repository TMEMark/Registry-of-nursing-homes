<?php
require "Components/header.php";

?>

<div class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="mb-4">
              <h3>Prijava</h3>
              <p class="mb-4">Registar pružatelja socijalnih usluga Osječko-baranjske i Vukovarsko-srijemske županije
              </p>
            </div>
            <form method="post" action="../../Backend/rest/controller/AuthController.php">
              <div class="form-group">
                <input type="hidden" name="action" value="login">
                <label for="username">Korisničko ime</label>
                <input name="username" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Lozinka</label>
                <input name="password" type="password" class="form-control" required>
              </div>
              <input type="submit" name="submit" value="Login" class="submit">
              <button type="button" class="btn btn-outline-secondary" class="quitForm"><a href="indexRegistry.php" id="quit" style="color:#CF2214"><img
                    src="../Assets/x.svg" alt="quit">Odustani</a></button>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>