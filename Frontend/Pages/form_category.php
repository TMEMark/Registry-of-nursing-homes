<?php
require "Components/header.php";
require "Components/authCheck.php";

// if (isset($_GET["id"])) {
//   $id = $_GET["id"];
//   $url = "http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php?id=" . $id;
//   $response = file_get_contents($url);
//   $data = json_decode($response, true);
// } else {
//   echo "<label style='margin: 20px'>Unosite novi podatak</label>";
// }

// if (empty($_GET['id'])) {
//   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve the form data
//     $categoryName = $_POST['name'];
//     // Create an associative array with the form data
//     $data = array(
//       'name' => $categoryName,
//     );
//   }
// }
// if (isset($_GET['id']) && !empty($_GET['id'])) {
//   if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
//     $input = file_get_contents('php://input');
//     $data = json_decode($input, true);
//     $categoryId = $data['id'];
//     $categoryName = $data['name'];
//     $data = array(
//       'id' => $categoryId,
//       'name' => $categoryName
//     );
//   }
// }
// // Encode the data as JSON
// $jsonData = json_encode($data);
// // Send the JSON data to the backend using cURL
// $url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php?id=';

// $ch = curl_init($url);
// if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
//   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
// } else {
//   curl_setopt($ch, CURLOPT_POST, 1);
// }
// curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($ch);

// if ($response === false) {
//   echo 'Error: ' . curl_error($ch);
// } else {
//   echo 'Uspješno dodan/promijenjen podatak.';
// }

// curl_close($ch);


?>

</div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-6 contents">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="mb-4">
            <h3>Dodajte novu kategoriju</h3>
          </div>

          <form action="form_category.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">

            <div class="form-group">
              <label>Naziv kategorije</label>
              <input name="name" type="text" class="form-control"
                value="<?php //echo isset($data['name']) ? $data['name'] : ''; ?>" required>
            </div>

            <input type="submit" name="submit" value="Unos" class="submit">

            <a href="category.php">
              <button type="button" class="quitForm">
                <img src="../Assets/x.svg" alt="poništavanje">
                Odustani
              </button>
            </a>

          </form>
          <?php
          // $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          // if (strpos($fullUrl, "data=empty")) {
          //   echo "<p class='erMsg'> Polje je obavezno. </p>";
          // }
          ?>
        </div>
      </div>

    </div>

  </div>
</div>