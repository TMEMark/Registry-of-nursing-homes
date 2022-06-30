<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar pružatelja</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="Frontend/Styles/styleIndexHTMLtest.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/464e80c499.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="landingpageOne">
        <div class="header">
            <div class="logo">
                <img src="Frontend/Components/assets/Logo.svg" alt="Logo" id="logo">
            </div>
            <div class="menu">
                
                    <a id="landing" href="#landingpageOne">Naslovnica</a>
                    <a id="vision" href="#landingpageTwo">O projektu</a>
                    <a id="nursing" href="#landingpageThree">Domovi</a>
                
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
        <div data-aos="fade-up-right" data-aos-duration="1000"  class="about">
            <div class="heading">
                <p>PROJEKT UDRUGE IZVOR</p>
            </div>
            <div class="desc">
                <p>Agregator svih dostupnih pružatelja usluga </p>
                <p>za stare i nemoćne na prostorima</p>    
                <p>Osječko baranjske županije i</p>
                <p>Vukovarsko srijemske</p>
            </div>
            
            <div class="quickNotes">
                <p class="pristup">JEDNOSTAVAN PRISTUP INFORMACIJAMA O USLUGAMA</p>
                <p class="pristup">PRISTUP KONTAKTIMA I MREŽNIM STRANICAMA</p>
                <p class="pristup">STALNI I AŽURNI PODACI O DOMOVIMA</p>
            </div>
            <div class="learnMore">
                <hr id="line">
                <a id="readMore" href="#">Pročitajte više</a>
            </div>
        </div>

        <div class="animation">
            <img src="" alt="Neka animacija/slika">
        </div>
    </div>

    <div id="landingpageThree">
        <div data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="500" class="about">
            <div class="heading">
                <p>DOMOVI I USLUGE ZA STARIJE</p>
            </div>
            <div class="desc">
                <p>Popis s više od [broj] pružatelja usluga za stare i nemoćne na prostoru
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
                <a id="readMore" href="Frontend/Pages/index.php">Istražite pružatelje</a>
            </div>
        </div>
        <div class="image">
            <img src="" alt="Neka animacija/slika">
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
</html>