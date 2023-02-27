<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar pružatelja</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="Frontend/Styles/styleIndexHTML.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="Frontend/Assets/search-home.svg">
    <script src="https://kit.fontawesome.com/464e80c499.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="landingpageOne">
        <div class="header">
            <div class="logo">
                <img src="Frontend/Assets/Logo.svg" alt="Logo" id="logo" style="width: 100%">
            </div>
            <div class="menu">
                <a id="landing" href="#landingpageOne">Naslovnica</a>
                <a id="vision" href="#landingpageTwo">O projektu</a>
                <a id="nursing" href="Frontend/Pages/indexRegistry.php">Domovi</a>
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

        </div>
        <div class="headline">
            <div class="text">
                <h1>Spoj mudrosti i mladosti</h1>
                <h3 id="quotePt1">Jednostavniji pristup informacijama o pružateljima usluga</h3>
                <h3 id="quotePt2">za stare i nemoćne</h3>
            </div>
            <div class="scroll-downs">
                <div class="mousey">
                  <div class="scroller"></div>
                </div>
              </div>
        </div>
    </div>
    <div id="landingpageTwo">
        <div data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="500" class="about">
            <div class="heading">
                <p style = "font-family: 'Lora', serif;">PROJEKT ŽENSKE UDRUGE IZVOR</p>
            </div>
            <div class="desc">
                <p >Agregator svih dostupnih pružatelja usluga </p>
                <p>za stare i nemoćne na prostorima</p>
                <p>Osječko baranjske županije i</p>
                <p>Vukovarsko srijemske</p>
            </div>

            <div class="quickNotes">
                <p class="pristup" style = "font-family: 'Lora', serif;">JEDNOSTAVAN PRISTUP INFORMACIJAMA O USLUGAMA</p>
                <p class="pristup" style = "font-family: 'Lora', serif;">PRISTUP KONTAKTIMA I MREŽNIM STRANICAMA</p>
                <p class="pristup" style = "font-family: 'Lora', serif;">STALNI I AŽURNI PODACI O DOMOVIMA</p>
            </div>
        </div>
        <div data-aos="fade-up-left" data-aos-duration="1000" class="animation">
            <img src="Frontend/Assets/img_1.svg" alt="Neka animacija/slika">
            <!-- All rights reserved to creator of SVG taken from: https://www.svgrepo.com/svg/284782/grandmother and modified according to page desing requirements -->
        </div>
    </div>
    <div id="landingpageThree">
        <div data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="500" class="about">
            <div class="heading">
                <p>DOMOVI I USLUGE ZA STARIJE</p>
            </div>
            <div class="desc">
                <p style = "font-family: 'Lora', serif;">Popis pružatelja usluga za stare i nemoćne na prostoru
                    Osječko-baranjske županije i Vukovarsko srijemske
                    s ažurnim podacima o ključnim segmentima
                    njihovih usluga i kategorija u koje pripadaju.
                    Istražite sve pružatelje i osigurajte
                    svojim bliskima njima
                    adekvatno mjesto.
                </p>
            </div>
            <div class="seeMore">
                <hr id="line">
                <a id="readMore" href="Frontend/Pages/indexRegistry.php">Istražite pružatelje</a>
            </div>
        </div>
        <div data-aos="fade-up-right" data-aos-duration="1000" class="image">
            <img src="Frontend/Assets/img_2.svg" alt="Neka animacija/slika">
            <!-- All rights reserved to creator of SVG taken from: https://www.svgrepo.com/svg/97453/home and modified according to page desing requirements -->
        </div>
    </div>
    <div id="landingpageFour">
        <div class="desc1">
            <div class="basicInfo">
                <p>Ženska udruga "IZVOR"</p>
                <p><i class="fa-solid fa-location-dot"></i> Vladka Mačeka 20, 31 207 TENJA</p>
                <p><i class="fa-solid fa-phone"></i> Tel/fax: ** 00 385 (0) 31 290 433</p>
            </div>
        </div>
        <div class="img">
        <img src="Frontend/Assets/Logo_ESF.png" alt="Logo_ESF" id="logo_ESF">
        </div>
        <div class="desc2">
            <div class="conInfo">
                <p><i class="fa-solid fa-phone-volume"></i> SOS telefon /0800 200 151</p>
                <p><i class="fa-solid fa-envelope"><a href="mailto:zenska.udruga.izvor@gmail.com" style="
    text-decoration: none;
    color: rgb(43, 60, 118);;
"></i> zenska.udruga.izvor@gmail.com</a></p>
                <p><i class="fa-brands fa-skype"></i>zenskaudrugaIZVOR</p>
                <p><a href="https://web.facebook.com/zenskaudruga.izvor/" style="
    text-decoration: none;
    color: rgb(43, 60, 118);;
"><i class="fa-brands fa-facebook"></i> zenskaudruga.izvor</a></p>
            </div>
        </div>
    </div>
    <a href="#" class="button">
        <i id="hh" class="fa fa-solid fa-angle-up"></i>
    </a>
</body>
<script src="https://kit.fontawesome.com/464e80c499.js" crossorigin="anonymous"></script>
<script src="Frontend/JavaScript/to-top.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
  <script>
      var btn = $('#button');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
</script>
<script>
    const hamburger = document.querySelector(".hamburger");
    const menu = document.querySelector(".menu");
    hamburger.addEventListener('click', () =>{
        hamburger.classList.toggle("active");
        menu.classList.toggle("active");
    })
    document.querySelectorAll("a").forEach(n => n. addEventListener('click', () =>{
        hamburger.classList.remove("active");
        menu.classList.remove("active");
    }))
</script>
</html>
