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
