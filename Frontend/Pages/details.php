<?php
require "Components/header.php";

$id = $_GET["id"];
$url = "https://www.zenska-udruga-izvor.hr/registar/Backend/rest/controller/ServiceProviderController.php?id=" . $id;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if ($response === false) {
    echo "cURL Error: " . curl_error($curl);
    exit;
}

$data = json_decode($response, true);

curl_close($curl);
?>

<div class="mainDiv">
  <div class="">
    <h1 id="serviceProviderName">
        <label for="serviceProviderName">
      <?php echo $data['name']; ?>
      </label>
    </h1>
  </div>
  <div class="firstSection">
    <div class="">
      <p class="txtDetail" id ="address"><label for="address"><b>ADRESA:</b>
        <?php echo $data['address'] ?></label>
      </p>
      <p class="txtDetail" id ="location"><label for="location"><b></b>ŽUPANIJA</b>
        <?php echo $data['address'] ?></label>
      </p>
      <p class="txtDetail" id ="contact"><label for="contact"><b>KONTAKT:></b>
        <?php echo $data['contact_number'] ?></label>
      </p>
      <p class="txtDetail" id ="email"><label for="email"><b>EMAIL:</b>
        <?php echo $data['email'] ?></label>
      </p>
      <p class="txtDetail" id ="workingHours"><label for="workingHours"><b>RADNO VRIJEME:</label></b>
        <?php echo $data['work_time'] ?>
      </p>
      <p class="txtDetail" id ="website"><label for="website"><b>WEB:</b>
        <?php echo $data['website_url'] ?></label>
      </p>
      <p class="txtDetail" id ="remark"><label for="remark"><b>NAPOMENA:</b>
        <?php echo $data['remark'] ?></label>
      </p>
    </div>
    <div class="sectionServices">
      <p class="txtDetailServices" id ="servicesSP"><label for="servicesSP"><b>USLUGE:</b>
        <?php echo $data['services'] ?>
        </label>
      </p><br></p>
    </div>
  </div>

  <div class="secondSection">
    <div class="">
      <p class="txtDetail" id ="categoriesSP" style="margin-top: 20px"><label for="categoriesSP"><b>KATEGORIJE:</b>
        <?php echo $data['categories'] ?>
        </label>
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
