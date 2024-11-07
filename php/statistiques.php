<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styleStats.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>" />
  <link rel="icon" href="../img/icon.png" type="image/x-icon">

  <title>Statistiques - CyberFruits</title>
</head>

<body>
  <?php session_start(); ?>

  <header class="burgerMenu">

  <button class="boxBurger">
      <div class="containerLinesBurger">
          <div class="lineBurger"></div>
          <div class="lineBurger"></div>
          <div class="lineBurger"></div>
      </div>
  </button>

  <nav id="mySideNav" class="sideNav">
      <ul class="burgerList">
          <li><a class="burgerA" href="index.html">Accueil</li></a>
          <li><a class="burgerA" href="agenda.html">Agenda</a></li>
          <li><a class="burgerA" href="galerie.html">Galerie Photos</a></li>
          <li><a class="burgerA" href="reserver.html">Réserver</a></li>
          <li><a class="burgerA" href="contact.html">Contact</a></li>
      </ul>
  </nav>

  <nav class="navBar">
      <div class="headerNav">
          <a href="../index.php">
              <img src="../img/Logo 2 partiel II.png" alt="Notre logo" id="logoNav">
          </a>
          <?php
              if(isset($_SESSION['email'])){
                  echo "
                  <div class='user'>
                      <p class='userText'>". $_SESSION['nom'] . " " . $_SESSION['prenom']. "</p>
                      <form action='admin/logout.php' method='post'>
                          <button type='submit' name='logout' class='logout'>Se déconnecter</button>
                      </form>
                  </div>
                  
                  ";
              }else{
                  echo '<a class="buttonConnexion" href="connexion.php">Se connecter</a>';

              }
          ?>
      </div>
      
      
  </nav>

  </header>

  <div class="navBarLinks">
      <li><a class="navBarAlink" href="articles.php">Articles</li></a>
      <li><a class="activePage navBarAlink" href="statistiques.php">Statistiques</a></li>
      <li><a class="navBarAlink" href="témoignages.php">Témoignages</a></li>
      <li><a class="navBarAlink" href="intervention.php">Intervention</a></li>
  </div>

  <body>
    <h1 class="title">Voici quelques statististiques !</h1>

    <div class="statRow reveal">
      <div class="statContent ">
        <h2 class="midTitle">Qui sont les victimes du cyberharcèlement ?</h2>
        <p>Le cyberharcèlement, un fléau insidieux sur internet, laisse des
          cicatrices invisibles mais profondes sur ses victimes. Les statistiques
          alarmantes révèlent les groupes les plus vulnérables à cette forme de
          violence en ligne. Avec 84% des victimes étant des femmes, 51% âgées de
          moins de 30 ans, 43% appartenant à la communauté LGBTQI+ et 22% étant
          des personnes handicapées, il est impératif de prendre des mesures pour
          contrer cette menace croissante. </p>
        <p class="source"> <i>Source : </i> <a target="_blank"
            href="https://www.ipsos.com/fr-fr/cyberviolences-et-cyberharcelement-le-vecu-des-victimes">Ipsos</a></p>
      </div>
      <div>
        <img class="statImg" src="../img/femmes.png" alt="">
      </div>
    </div>

    <div class="statReverseRow reveal">
      <div class="statContent">
        <h2 class="midTitle">La jeunesse dans tout ça ?</h2>
        <p>Dans le détail, 15% des enfants en école primaire ont déjà été
        confrontés au cyberharcèlement, indique cette étude financée par la
        <i>Caisse d'Epargne</i>. C'est également le cas de 25% des mineurs au
        collège
        et de 27% de ceux au lycée. Pour faire face à ce phénomène d'ampleur, le
        gouvernement a présenté fin septembre une série de mesures, allant du
        signalement systématique des cas de harcèlement à la justice à la
        volonté d'exclure les élèves harceleurs des réseaux sociaux. </p>
        <p class="source"><i>Source : </i> <a target="_blank"
          href="https://www.europe1.fr/societe/mineurs-cyberharceles-un-quart-des-familles-touchees-4209549#:~:text=Dans%20le%20d%C3%A9tail%2C%2015%25%20des,27%25%20de%20ceux%20au%20lyc%C3%A9e.">Europe1</a>
      </p>
      </div>
      <div>
        <img class="statImg" src="../img/jeunes.png" alt="">
      </div>
    </div>

    <div class="statRow reveal">
      <div class="statContent ">
        <h2 class="midTitle">Le cyberharcelement étant un délit, il est puni par la loi.</h2>
        <p>Le cyberharcelement peut entraîner des conséquences juridiques sévères,
          telles qu'une amende pouvant aller jusqu'à <b>12 000 €</b> pour l'injure
          ou la
          diffamation publique, un an de prison et une amende pouvant atteindre
          <b>45
            000 €</b> pour le non-respect du droit à l’image, ainsi qu'un an
          d'emprisonnement et une amende de <b>15 000 €</b>pour l’usurpation
          d’identité,
          conformément à la loi.
        </p>
        <p class="source"> <i>Source : </i> <a target="_blank"
          href="https://www.cnil.fr/fr/cyberviolences-et-cyberharcelement-que-faire">CNIL</a></p>
      </div>
      <div>
        <img class="statImg" src="../img/peines.jpg" alt="">
      </div>
    </div>

    <footer class="footer">
        <div  class="footerTop">
            <a href="../index.php" class="footerTitle">CyberFruits</a>
            <div class="footerTopRéseaux">
                <a href="https://www.instagram.com/cyberfruits_?igsh=MXQ5cGJ6cWJveDhoNw==" target="_blank" ><img src="../img/instagram.svg" alt="Instagram" class="footerIcon"></a>
                <a href="https://www.tiktok.com/@cyber_fruits0?_t=8lPXAhsG0dl&_r=1" target="_blank" ><img src="../img/tiktok.svg" alt="TikTok" class="footerIcon"></a>
            </div>
        </div>
        <div class="footerMid">
            <div class="footerMidLeft">
                <h2 class="footerMidTitle">Liens</h2>
                <li><a class="footerPage" href="articles.php">Articles</li></a>
                <li><a class="footerPage" href="statistiques.php">Statistiques</a></li>
                <li><a class="footerPage" href="témoignages.php">Témoignages</a></li>
                <li><a class="footerPage" href="intervention.php">Intervention</a></li>
            </div>
            <div class="footerMidCenter">
                <h2 class="footerMidTitle">Qui sommes-nous ?</h2>
                <li><a class="footerMidLink" href="apropos.html">A propos</li></a>
                <li><a class="footerMidLink" href="../mentions.html">Mentions légales</a></li>
                <li><a class="footerMidLink" href="admin/accessAdmin.php">Administration</a></li>

            </div>
            <div class="footerMidRight">
                <h2 class="footerMidTitle">Social</h2>
                <li><a href="https://www.instagram.com/cyberfruits_?igsh=MXQ5cGJ6cWJveDhoNw==" class="footerMidLink">Instagram</a></li>
                <li><a href="https://www.tiktok.com/@cyber_fruits0?_t=8lPXAhsG0dl&_r=1" class="footerMidLink">Tik Tok</a></li>
            </div>
        </div>
        <div class="footerBottom">
            <p>&copy; 2024 CyberFruits. Tous droits réservés.</p>
        </div>
    </footer>

    <script defer src="../js/app.js"></script>

  </body>

</html>