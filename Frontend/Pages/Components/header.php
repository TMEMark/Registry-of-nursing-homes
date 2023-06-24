<?php
if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];

  $url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/DynamicSearchController.php';


  $url .= '?search=' . urlencode($searchTerm);


  $ch = curl_init();


  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


  $response = curl_exec($ch);

  if (curl_errno($ch)) {
      // Handle the error, e.g., display an error message
      echo 'cURL error: ' . curl_error($ch);
  }

  curl_close($ch);

  echo $response;

}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Styles/styleHeader.css">
  <link rel="stylesheet" href="../Styles/styleIndexRegistry.css">
  <link rel="stylesheet" href="../Styles/styleDetails.css">
  <link rel="stylesheet" href="../Styles/styleLogin.css">
  <link rel="stylesheet" href="../Styles/styleAdmin.css">
  <link rel="stylesheet" href="../Styles/styleForm.css">
  <link rel="stylesheet" href="../Styles/styleHeaderAdmin.css">
  <link rel="shortcut icon" href="../Assets/search-home.svg">
</head>

<body>
  <nav>
    <div class="logoRMU">
      <a href="indexRegistry.php">
        <img src="../Assets/LogoRazvoj.png" alt="Logo" id="logoRMU">
      </a>
    </div>
    <div class="logoIzvor">
      <a href="indexRegistry.php">
        <img src="../Assets/logoIzvor.png" alt="Logo" id="logoIzvor">
      </a>
    </div>
    <div class="searchBar">
      <form action="header.php" method="get">
        <img src="../Assets/search.svg" id="imgSearchBar">
        <input class="inputField" type="search" name="search" id="search" placeholder="Pretražite domove">
        <button type="button" name="button" id="searchButton">Pretražite</button>
      </form>
    </div>
    <div class="login">
      <a href="form_login.php">
        <p id="loginTxt">Login</p>
      </a>

    </div>
  </nav>

  <script>
  //   document.getElementById('searchButton').addEventListener('click', function () {
  //     var searchValue = document.getElementById('search').value;
  //     var url = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/DynamicSearchController.php?search=' + encodeURIComponent(searchValue);

  //     var xhr = new XMLHttpRequest();
  //     xhr.open('GET', url, true);
  //     xhr.onreadystatechange = function () {
  //       if (xhr.readyState === 4 && xhr.status === 200) {
  //         var response = xhr.responseText;
  //         // Process the response here
  //         console.log(response);
  //         displaySearchResults(response);
  //       }
  //     };
  //     xhr.send();
  //   });
  //   function displaySearchResults(results) {
  //     // console.log(results);
  //     // var resultContainer = document.getElementById('resultContainer');
  //     // resultContainer.innerHTML = results;
  //     var data = JSON.parse(results);

  // // Extract the desired data
  // var name = data[0].name;
  // var location = data[0].location;
  // var services = data[0].services;
  // var categories = data[0].categories;

  // // Update existing HTML elements with the extracted data
  // document.getElementById('nameNursingHome').textContent = name;
  // document.getElementById('nameLocation').textContent = location;
  // document.getElementById('nameServicesCategories').textContent = services + "\n" + categories;
  //   }
  </script>