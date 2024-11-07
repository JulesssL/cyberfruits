<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/styleTémoignage.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">

    <title>CyberFruits - Témoignage</title>
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
        <li><a class="navBarAlink" href="statistiques.php">Statistiques</a></li>
        <li><a class="navBarAlink" href="témoignages.php">Témoignages</a></li>
        <li><a class="navBarAlink" href="intervention.php">Intervention</a></li>
    </div>

    <div class="temoignageContent">
        <?php
        require 'admin/database.php';

        $pdo = Database::connect();

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $temoignage_id = $_GET['id'];

            $data = $pdo->prepare("SELECT * FROM témoignages WHERE id = ?");
            $data->execute([$temoignage_id]);
            $temoignage = $data->fetch();

            if ($temoignage == false) {
                echo "<p class='errorMessage'>Erreur : Témoignage non trouvé.</p>";
            } else{
                echo "
                <div class='temoignagePage reveal'>
                    <h2 class='temoignageTitle'>" . $temoignage['titre'] . "</h2>
                    <p class='temoignageDescription'>" . nl2br($temoignage['contenu']) . "</p>
                    <p class='temoignageDate'>" . $temoignage['date'] . "</p>
                    <p class='temoignageAuteur'>" . $temoignage['auteur'] . "</p>
                </div>
                ";
            }
 
        } else {
            echo "<p class='errorMessage'>Erreur : Témoignage non trouvé.</p>";
        }
        ?>
    </div>

    <div class="temoignageBackPage">
        <a href="témoignages.php" class="backPage">Retour</a>
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
