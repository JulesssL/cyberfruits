<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <title>CyberFruits</title>
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
            <li><a class="burgerA" href="php/articles.php">Articles</li></a>
            <li><a class="burgerA" href="php/statistiques.php">Statistiques</a></li>
            <li><a class="burgerA" href="php/témoignages.php">Témoignages</a></li>
            <li><a class="burgerA" href="php/intervention.php">Intervention</a></li>
        </ul>
    </nav>

    <nav class="navBar">
        <div class="headerNav">
            <a href="index.php">
                <img src="img/Logo 2 partiel II.png" alt="Notre logo" id="logoNav">
            </a>
            <?php
                if(isset($_SESSION['email'])){
                    echo "
                    <div class='user'>
                        <p class='userText'>". $_SESSION['nom'] . " " . $_SESSION['prenom']. "</p>
                        <form action='php/admin/logout.php' method='post'>
                            <button type='submit' name='logout' class='logout'>Se déconnecter</button>
                        </form>
                    </div>
                    
                    ";
                }else{
                    echo '<a class="buttonConnexion" href="php/connexion.php">Se connecter</a>';

                }
            ?>
        </div>
        
        
    </nav>

    </header>

    <div class="navBarLinks">
        <li><a class="navBarAlink" href="php/articles.php">Articles</li></a>
        <li><a class="navBarAlink" href="php/statistiques.php">Statistiques</a></li>
        <li><a class="navBarAlink" href="php/témoignages.php">Témoignages</a></li>
        <li><a class="navBarAlink" href="php/intervention.php">Intervention</a></li>
    </div>

    <div class="homeImageDiv">
        <h1>CyberFruits</h1>
        <h2>Bienvenue chez CyberFruits, où nous luttons activement contre le cyberharcèlement. Notre mission est de sensibiliser et d'éduquer pour créer un internet plus sûr. Rejoignez-nous dans cette lutte pour un environnement en ligne respectueux pour tous.</h2>
        <a href="php/inscription.php">S'inscrire</a>
    </div>

    <div class="textHome">
        <div class="textHomeText">
            <h1>CyberFruits</h1>
            <h2>
                Notre équipe lutte continuellement contre le cyber-harcèlement. Vous retrouverez sur le site des articles, des témoignages et plus encore... N'hésitez pas à nous contacter si vous estimez que nous pouvons vous aider (sensibilisation, Ecoute, Aide administrative...).
            </h2>
        </div>
        <img src="img/gif.gif" class="textHomeImg">
    </div>

    <h2 class="midTitle">Ecouter nos PodCasts :</h2>

    <p class="podcastText">Dans notre série de podcasts, nous vous invitons à explorer avec nous un sujet crucial : la lutte contre le cyberharcèlement. À travers des épisodes informatifs, inspirants et pratiques, nous vous offrons des ressources pour naviguer en toute sécurité dans le monde numérique.</p>

    <div class="podcastsDiv reveal">
        <div class="podcastDiv">
        <h3 class="podcastTitle">Reconnaître les signes</h3>
        <audio controls>
            <source src="sons/Podcast cyberharcelement reconnaitre les signes.mp4" type="audio/mpeg">
            Votre navigateur ne supporte pas ce type de fichier.
        </audio>
        </div>

        <div class="podcastDiv">
        <h3 class="podcastTitle">Technologies</h3>
        <audio controls>
            <source src="sons/Podcast cyberharcelement technologies.mp4" type="audio/mpeg">
            Votre navigateur ne supporte pas ce type de fichier.
        </audio>
        </div>

        <div class="podcastDiv">
        <h3 class="podcastTitle" >Usurpation d'identité</h3>
        <audio controls>
            <source src="sons/Podcast cyberharcelement usurpation d'identité.mp4" type="audio/mpeg">
            Votre navigateur ne supporte pas ce type de fichier.
        </audio>
        </div>

        <div class="podcastDiv">
        <h3 class="podcastTitle">Les formes de harcèlement</h3>
        <audio controls>
            <source src="sons/Podcast formes de cyberharcelement.mp4" type="audio/mpeg">
            Votre navigateur ne supporte pas ce type de fichier.
        </audio>
        </div>
    </div>

<?php

require 'php/admin/database.php';

$pdo = Database::connect();

$data = $pdo->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 3");
$data->execute(); 
$articles = $data->fetchAll();

echo '
<h2 class="midTitle">Nos derniers articles</h2>
<div class="indexArticles">
';


foreach ($articles as $article) {
    echo "
    <div class='articleRowIndex reveal'>
        <h2 class='articleTitleIndex'>". $article['titre']. "</h2>
        <p class='articleDescriptionIndex'>". substr($article['contenu'], 0, 200). "...</p>
        <p class='articleDateIndex'>". $article['date']. "</p>
        <p class='articleAuteurIndex'>". $article['auteur']. "</p>
        <a href=php/article.php?id=".$article['id']." class='articleLinkIndex'>Voir l'article</a>
    </div>
    ";
}

echo '</div>';


$data = $pdo->prepare("SELECT * FROM témoignages ORDER BY id DESC LIMIT 3");
$data->execute(); 
$temoignages = $data->fetchAll();

echo '
<h2 class="midTitle">Nos derniers témoignages</h2>
<div class="indexTemoignages">
';


foreach ($temoignages as $temoignage) {
    echo "
    <div class='temoignageRowIndex reveal'>
        <h2 class='temoignageTitleIndex'>". $temoignage['titre']. "</h2>
        <p class='temoignageDescriptionIndex'>". substr($temoignage['contenu'], 0, 200). "...</p>
        <p class='temoignageDateIndex'>". $temoignage['date']. "</p>
        <p class='temoignageAuteurIndex'>". $temoignage['auteur']. "</p>
        <a href=php/témoignage.php?id=".$temoignage['id']." class='temoignageLinkIndex'>Voir le témoignage</a>
    </div>
    ";
}

echo '</div>';



?>


    <footer class="footer">
        <div  class="footerTop">
            <a href="index.php" class="footerTitle">CyberFruits</a>
            <div class="footerTopRéseaux">
                <a href="https://www.instagram.com/cyberfruits_?igsh=MXQ5cGJ6cWJveDhoNw==" target="_blank" ><img src="img/instagram.svg" alt="Instagram" class="footerIcon"></a>
                <a href="https://www.tiktok.com/@cyber_fruits0?_t=8lPXAhsG0dl&_r=1" target="_blank" ><img src="img/tiktok.svg" alt="TikTok" class="footerIcon"></a>
            </div>
        </div>
        <div class="footerMid">
            <div class="footerMidLeft">
                <h2 class="footerMidTitle">Liens</h2>
                <li><a class="footerPage" href="php/articles.php">Articles</li></a>
                <li><a class="footerPage" href="php/statistiques.php">Statistiques</a></li>
                <li><a class="footerPage" href="php/témoignages.php">Témoignages</a></li>
                <li><a class="footerPage" href="php/intervention.php">Intervention</a></li>
            </div>
            <div class="footerMidCenter">
                <h2 class="footerMidTitle">Qui sommes-nous ?</h2>
                <li><a class="footerMidLink" href="apropos.html">A propos</li></a>
                <li><a class="footerMidLink" href="mentions.html">Mentions légales</a></li>
                <li><a class="footerMidLink" href="php/admin/accessAdmin.php">Administration</a></li>
            </div>
            <div class="footerMidRight">
                <h2 class="footerMidTitle">Social</h2>
                <li><a href="https://www.instagram.com/cyberfruits_?igsh=MXQ5cGJ6cWJveDhoNw==" class="footerMidLink">Instagram</a></li>
                <li><a href="https://www.tiktok.com/@cyber_fruits0?_t=8lPXAhsG0dl&_r=1" class="footerMidLink">Tik Tok</a></li>
                <li><a href="mailto:Cyber.Fruits.officiel@gmail.com" class="footerMidLink">Adresse Email</a></li>
            </div>
        </div>
        <div class="footerBottom">
            <p>&copy; 2024 CyberFruits. Tous droits réservés.</p>
        </div>
    </footer>

    <div class="cookieConsentModal">
        <div class="cookieContent">
            <h1>Accepter les cookies</h1>
            <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site web. En acceptant nos cookies, vous consentez à leur utilisation conformément à notre politique de confidentialité. Les cookies sont de petits fichiers texte qui sont stockés sur votre appareil et qui nous aident à comprendre comment vous utilisez notre site. Ils nous permettent d'analyser les tendances, de personnaliser le contenu et les publicités, et de fournir des fonctionnalités sociales. Vous pouvez modifier vos préférences à tout moment dans les paramètres de votre navigateur. En continuant à utiliser ce site, vous consentez à l'utilisation de cookies.</p>
            <div class="cookieBtns">
                <button class="cookieBtn refuser">Refuser</button>
                <button class="cookieBtn accepter">Accepter</button>
            </div>
        </div>  
    </div>
    
    <script defer src="js/app.js"></script>
</body>

</html>