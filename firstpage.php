<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>site linkedin</title>
  <link rel="stylesheet" href="fichier.css">
  <script src="https://kit.fontawesome.com/f31faae043.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="main">
    <nav>
      <img src="image/asset/logo-linkedin.png" style="width: max(17.5%, 130px)" />
      <div>
        <span id="toggleMenu" class="mob">
          <i class="fa-solid fa-bars"></i>
        </span>
        <ul id="information">
          <a href="#">
            <li>A PROPOS</li>
          </a>
          <a href="#">
            <li>AWARDS</li>
          </a>
          <a href="#foot">
            <li>CONTACTS</li>
          </a>
          <a href="#">
            <li>PRENDRE SON TICKET D'ENTREE</li>
          </a>
        </ul>
      </div>
    </nav>
  </div>
  <section class="section1">
    <div class="première mySlides fade">
      <div class="text">
        <h1>LINKEDIN LOCAL ABIDJAN</h1>
        <p>19 Septembre 2023 / Palm Club Hôtel</p>
      </div>
      <div>
        <a href="#">PRENDRE SON TICKET D'ENTREE</a>
        <a href="#">PASS D'ENTREE: <span>10.000FCFA</span></a>
      </div>

      <br>

      <div class="boutonSlide">
        <div class="oCircle"></div>
        <div class="oCircle"></div>
      </div>
    </div>
    <div class="second mySlides fade">
      <div class="text">
        <h1>LINKEDIN LOCAL ABIDJAN <br>AWARDS</h1>
        <p>Votre évènement inédit dédié à la valorisation de nos experts <br>et influenceurs LindekIn</p>
        <button>JE PASSE AU VOTE</button>
      </div>
    </div>
  </section>

  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("oCircle");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>

  <section class="section2">
    <div class="presentation">
      <h1>POURQUOI PARTICIPER A <br> <u>LINKEDIN</u> LOCAL ABIDJAN</h1>
      <img src="image/asset/groupe.png" alt="image de groupe">
      <div class="importance">
        <ul>
          <li>Pour apprendre à trouver un emploi grâce à LinkedIn.</li>
          <li> Pour rencontrer nos amis virtuels et tisser des liens.</li>
          <li>Pour comprendre le fonctionnement de LinkedIn.</li>
          <li>Pour s'inspirer du parcours des autres.</li>
        </ul>
        <p>LinkedIn local, un concept CREER en Australie approuvé par <br> LinkedIn et repris dans plusieurs pays et qui est à sa quatrième <br> édition en Côte d'Ivoire.</p>
      </div>
      <div class="lieu">
        <i class="fa-regular fa-calendar-days"></i>
        <span>SAMEDI 09 SEPTEMBRE 2023</span>
        <i class="fa-solid fa-location-dot"></i>
        <span>PALM CLUB HôTEL <br> ABIDJAN COCODY</span>
      </div>
    </div>
  </section>
  <section id="section3">
    <div class="tip">
      <img src="image/asset/logo-awards.png" alt="logo awards">
      <h2>JE FAIS LE CHOIX DE MON INFLUENCEUR LINKEDIN LOCAL FAVORI</h2>
    </div>
    <div class="cercledesign">
      <div class="categorie">
        <a id="sFour" href="#section4">
          <div class="Circle">
            Jeunes Producteurs de Contenus
          </div>
        </a>
        <img src="image/asset/1542_Plan de travail 1.png" />
      </div>

      <div class="categorie">
        <a id="sFour" href="#section5">
          <div class="Circle">
            Créateurs de contenus RH motivation Consultant
          </div>
        </a>
        <img src="image/asset/1542_Plan de travail 1.png" />
      </div>

      <div class="categorie">
        <a id="sFour" href="#section6">
          <div class="Circle">
            Coachs & Experts
          </div>
        </a>
        <img src="image/asset/1542_Plan de travail 1.png" />
      </div>

      <div class="categorie">
        <a id="sFour" href="#section7">
          <div class="Circle">
            Contributeurs LinkedIn
          </div>
        </a>
        <img src="image/asset/1542_Plan de travail 1.png" />
      </div>

    </div>
  </section>

  <div id="slides">
    <section id="section4">
      <div class="tip">
        <img src="image/asset/logo-awards.png" alt="logo awards">
        <h3>JEUNE PRODUCTEUR DE CONTENUS</h3>
      </div>
      <div class="jeune" id = "p1">
      <?php include "points-php1.php"; ?>
       
      </div>
    </section>
    <section id="section5">
      <div class="tip">
        <img src="image/asset/logo-awards.png" alt="logo awards">
        <h3> CRéATEURS DE CONTENUS RH/MOTIVATION/CONSULTANT</h3>
      </div>
      <div class="jeune" id = "p2">
      <?php include "
      points-php2.php"; ?>
        
      </div>
    </section>

    <section id="section6">
      <div class="tip">
        <img src="image/asset/logo-awards.png" alt="logo awards">
        <h3> COACH/EXPERT</h3>
      </div>
      <div class="jeune" id= "p3"></div>
      <?php include "points-php3.php"; ?>
       
      </div>
    </section>

    <section id="section7">
      <div class="tip">
        <img src="image/asset/logo-awards.png" alt="logo awards">
        <h3> CONTRIBUTEURS LINKEDIN</h3>
      </div>
      <div class="jeune" id= "p4"></div>
      <?php include "points-php4.php"; ?>
       
      </div>
    </section>
  </div>
  <footer>
    <div class="footer-logo">
      <img class="logo-footer" src="image/asset/logo-blanc-footer.png" alt="">
    </div>
    <div class="footer-container">
      <div class="mes-contacts">
        <div class="bloc-informations">
          <h3 class="contact">Contact Us</h3>
          <div class="box">
            <i class="fa-solid fa-phone-volume" style="color: red;"></i>
            <span>+225 0748424725</span>
          </div><br>
          <div class="box">
            <i class="fa-regular fa-envelope-open" style="color: red;"></i>
            <span>studiosadinkra@gmail.com</span>
          </div><br>
          <div class="les-icons">
            <div class="icon">
              <i class="fa-brands fa-facebook-f"></i>
              <span>facebook</span>
            </div>
            <div class="icon">
              <i class="fa-brands fa-instagram"></i>
              <span>instagram</span>
            </div>
            <div class="icon">
              <i class="fa-brands fa-twitter"></i>
              <span>twitter</span>
            </div>
            <div class="icon">
              <i class="fa-brands fa-linkedin-in"></i>
              <span>linkedin-in</span>
            </div>
          </div>
        </div>
      </div>
      <div class="bloc-informations">
        <h3 class="contact">Information</h3>
        <ul class="liste-informations">
          <li><a href="">About Us</a></li>
          <li><a href="">Services</a></li>
          <li><a href="">Team</a></li>
          <li><a href="">Projet</a></li>
          <li><a href="">Coaching</a></li>
          <li><a href="">Brandblog</a></li>
        </ul>
      </div>

      <div class="bloc-informations">
        <h3 class="contact">Information</h3>
        <ul class="liste-services">
          <li><a href="">Feedback</a></li>
          <li><a href="">Services</a></li>
          <li><a href="">Team&condition</a></li>
          <li><a href="">Privacy policy</a></li>
        </ul>
      </div>

      <div class="bloc-informations">
        <form action="nom">
          <h3 class="contact">Newsteller</h3>
          <input type="text" placeholder="Votre nom">
          <input type="email" placeholder="Votre Email">
          <input type="text" placeholder="recevez nos actualités" class="submit-input">
        </form>
      </div>
    </div>
    <hr><br>
    <div class="block-Fin">
      <div class="Fin">
        <div style="color: white;">© X3M Limited 2023.Politique De Confidentialité</div>
      </div>
      <div class="Fin">
        <div style="color: white;">All rights Reserved</div>
      </div>
    </div>
  </footer>
</body>
 
  <script src="../script/ajax.js"></script>
  <script src="../script/ajax-2.js"></script>
  <script src="../script/ajax-3.js"></script>
  <script src="../script/ajax-4.js"></script>

</html>

