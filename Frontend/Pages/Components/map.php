<?php
$fetchUrl = 'http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/ServiceProviderController.php';
$jsonData = file_get_contents($fetchUrl);
$responseData = json_decode($jsonData);

// Create an array to store marker locations
$markerLocations = array();

foreach ($responseData as $serviceProvider) {
  $latitude = $serviceProvider->latitude; // Assuming latitude property name is 'latitude'
  $longitude = $serviceProvider->longitude; // Assuming longitude property name is 'longitude'
  
  // Add the marker location to the array
  $markerLocations[] = array('latitude' => $latitude, 'longitude' => $longitude);
}

// Generate the iframe URL for the map
$bbox = getBoundingBox($markerLocations);
$iframeUrl = 'https://www.openstreetmap.org/export/embed.html?bbox=' . $bbox['minLon'] . ',' . $bbox['minLat'] . ',' . $bbox['maxLon'] . ',' . $bbox['maxLat'] . '&amp;layer=mapnik';

function getBoundingBox($locations) {
  $minLat = $minLon = 1000;
  $maxLat = $maxLon = -1000;
  
  foreach ($locations as $location) {
    $latitude = $location['latitude'];
    $longitude = $location['longitude'];
    
    if ($latitude < $minLat) $minLat = $latitude;
    if ($latitude > $maxLat) $maxLat = $latitude;
    if ($longitude < $minLon) $minLon = $longitude;
    if ($longitude > $maxLon) $maxLon = $longitude;
  }
  
  return array('minLat' => $minLat, 'minLon' => $minLon, 'maxLat' => $maxLat, 'maxLon' => $maxLon);
}
?>
<head>

  <style>
    #map {
      height: 400px;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
  <div id="map"></div>
  <script>
    var map = L.map('map').setView([<?php echo $markerLocations[0]['latitude']; ?>, <?php echo $markerLocations[0]['longitude']; ?>], 9);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);

    var markerLocations = <?php echo json_encode($markerLocations); ?>;
    
    // Loop through the marker locations and add markers to the map
    for (var i = 0; i < markerLocations.length; i++) {
      var marker = L.marker([markerLocations[i].latitude, markerLocations[i].longitude]).addTo(map);
      marker.bindPopup('Marker ' + (i + 1)); // You can customize the popup content here
    }
  </script>
</body>