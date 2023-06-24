<?php
require "Components/header.php";
require "Components/header_admin.php";
?>


<div class="container"><a href="form_category.php">
    <img src="../Assets/dodaj_ikona.svg" alt="Dodaj" id="add"></a>
</div>
<style>
  @media (max-width:991px) {
    #viewport {
      display: none;
    }
  }
</style>

<?php
$rest_api_url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/CategoryController.php';
$json_data = file_get_contents($rest_api_url);
$response_data = json_decode($json_data);
foreach ($response_data as $category_data) {
  ?>
  <div class="container">
    <div class="row d-lg-none d-xl-none">
      <div class="col-10">
        <p><b>
            <?php echo $category_data->name ?>
          </b></p>
      </div>
      <div class="col-2">
        <a href="form_category.php?id=<?php echo $category_data->id ?>" data-id="<?php echo $category_data->id ?>">
          <img src="../Assets/update.svg" alt="Update">
        </a>

        <a href="#"
              onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati?')) { deleteCategory(<?php echo $category_data->id; ?>); }">
              <img src="../Assets/delete.svg" alt="Delete">
            </a>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row d-none d-lg-block">
    <table class="table">
      <thead>
        <tr>
          <td>Kategorija</td>
        </tr>
      </thead>

      <?php
      foreach ($response_data as $category_data) {
        ?>
        <tr>
          <td>
            <?php echo $category_data->name; ?>
          </td>
          <td>
            <a href="form_category.php?id=<?php echo $category_data->id ?>"
              data-id="<?php echo $category_data->id ?>"><img src="../Assets/update.svg" alt="Update"></a>

            <a href="#"
              onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati?')) { deleteCategory(<?php echo $category_data->id; ?>); }">
              <img src="../Assets/delete.svg" alt="Delete">
            </a>



            <!-- <a href="">
              <img src="../Assets/delete.svg" alt="Delete"></a> -->
          </td>
        <?php
      }
      ?>
    </table>
  </div>
</div>

<script type="text/javascript" src="../JavaScript/category.js"></script>
<script>
  function deleteCategory(id) {
    const url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/CategoryController.php?id=<?php echo $category_data->id ?>';

    fetch(url, {
      method: 'DELETE',
      body: JSON.stringify({ id: id }),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => {
        if (response.ok) {
          // Redirect or perform any additional actions after successful deletion
          window.location.href = 'category.php';
        } else {
          // Handle the error case
          console.error('Failed to delete category');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>
<?php
require "Components/footer.html";
?>