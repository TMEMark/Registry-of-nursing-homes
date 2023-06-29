<?php
require "Components/header.php";

$data = array(); // Initialize $data as an empty array

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $url = "http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php?id=" . $id;
  $response = file_get_contents($url);
  $data = json_decode($response, true);
} else {
  echo "<label style='margin: 20px'>Unosite novi podatak</label>";
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
//   $input = file_get_contents('php://input');
//   $data = json_decode($input, true);
//   $categoryId = $data['id'];
//   $categoryName = $data['name'];
//   $data = array(
//       'id' => $categoryId,
//       'name' => $categoryName
//   );

//   // Encode the data as JSON
//   $jsonData = json_encode($data);
//   // Send the JSON data to the backend using cURL
//   $url = 'http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php';

//   $ch = curl_init($url);
//   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//   $response = curl_exec($ch);
//   curl_close($ch);

//   // Handle the response as needed
// }

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

          <form method="post" id="form-update">
          <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">

            <div class="form-group">
              <label>Naziv kategorije</label>
              <input id="category-name" name="name" type="text" class="form-control"
                value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" required>
            </div>

            <input id='update-button' type="submit" name="submit" value="Unos" class="submit">

            <a href="category.php">
              <button type="button" class="quitForm">
                <img src="../Assets/x.svg" alt="poništavanje">
                Odustani
              </button>
            </a>

          </form>
        </div>
      </div>

    </div>

  </div>
</div>

<script>
    const updateForm = document.querySelector('form');
    const updateForm = document.getElementById('form-update');
const categoryNameInput = document.getElementById('category-name');
const updateButton = document.getElementById('update-button');

updateForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const categoryId = categoryIdInput.value;
    const categoryName = categoryNameInput.value;

    const updatedCategory = {
        id: categoryId,
        name: categoryName
    };

    fetch('http://localhost/Registry-of-nursing-homes/Backend/rest/controller/CategoryController.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(updatedCategory)
    })
    .then(response => {
        if (response.ok) {
            alert('Category updated successfully');
        } else {
            alert('Failed to update category');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>