<?php
require "Components/header.php";

$id = $_GET["id"];
$url = "http://localhost/Registry-of-nursing-homes/Backend/rest/controller/ServiceProviderController.php?id=" . $id;
$response = file_get_contents($url);
$data = json_decode($response, true);
?>

<div class="mainDiv">
  <div class="">
    <h1>
      <?php echo $data['name']; ?>
    </h1>
  </div>
  <div class="firstSection">
    <div class="">
      <p class="txtDetail"><b>ADRESA:</b>
        <?php echo $data['address'] ?>
      </p>
      <p class="txtDetail"><b>ŽUPANIJA:</b>
        <?php echo $data['address'] ?>
      </p>
      <p class="txtDetail"><b>KONTAKT:</b>
        <?php echo $data['contact_number'] ?>
      </p>
      <p class="txtDetail"><b>EMAIL:</b>
        <?php echo $data['email'] ?>
      </p>
      <p class="txtDetail"><b>RADNO VRIJEME:</b>
        <?php echo $data['work_time'] ?>
      </p>
      <p class="txtDetail"><b>WEB:</b>
        <?php echo $data['website_url'] ?>
      </p>
      <p class="txtDetail"><b>NAPOMENA:</b>
        <?php echo $data['remark'] ?>
      </p>
    </div>
    <div class="sectionServices">

      <p class="txtDetailServices"><b>USLUGE:</b>
        <?php echo $data['services'] ?>
      </p><br></p>
    </div>
  </div>

  <div class="secondSection">
    <div class="">
      <p class="txtDetail" style="margin-top: 20px"><b>KATEGORIJE:</b>
        <?php echo $data['categories'] ?>
      </p>
    </div>
    <div class="map">

      <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
        src="https://www.openstreetmap.org/export/embed.html?bbox=<?php echo ($data['longitude'] - 0.8); ?>%2C<?php echo ($data['latitude'] - 0.8); ?>%2C<?php echo ($data['longitude'] + 0.8); ?>%2C<?php echo ($data['latitude'] + 0.8); ?>&amp;layer=mapnik&amp;marker=<?php echo $data['latitude']; ?>%2C<?php echo $data['longitude']; ?>"
        style="border: 1px solid black"></iframe>
      <br /><small>
        <a
          href="https://www.openstreetmap.org/?mlat=<?php echo $data['latitude']; ?>&amp;mlon=<?php echo $data['longitude']; ?>#map=10/<?php echo $data['latitude']; ?>/<?php echo $data['longitude']; ?>">View
          Larger Map</a>
      </small>


    </div>
  </div>
</div>