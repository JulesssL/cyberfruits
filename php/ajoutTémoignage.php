<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/styleAjout.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">

    <title>CyberFruits - Ajouter un témoignage</title>
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

    <div class="ajoutDiv reveal">

        <h1 class="bigTitle">Votre temoignage</h1>

        <form action="ajoutTémoignage.php" method="post" class="formulaire">
            <input type="text" name="titre" placeholder="Titre" required><br>
            <textarea id="contenu" name="contenu" cols="30" rows="10" placeholder="Votre témoignage..."></textarea><br>
            <input type="submit">
        </form>

    </div>
    

<?php

require 'admin/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pdo = Database::connect();

    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    $date = date('Y-m-d');

    if ($_SESSION['connect'] !== true){
        echo '<p class="errorMessage">Vous n\'êtes pas connecté, vous allez être redirigé dans 5 secondes </p>';
        header('Location: connexion.php');
    }

    $auteurID = $_SESSION['id'];

    $email = $_SESSION['email'];

    $query = $pdo->query("SELECT prenom FROM users WHERE id = $auteurID");

    if ($query) {
        $auteur = $query->fetch(PDO::FETCH_ASSOC);
        $auteur = $auteur['prenom'];
    } else {
        echo "Erreur requête.";
    }

    if(!empty($titre) && !empty($contenu)) {
        $sql = "INSERT INTO témoignages(titre, contenu, date, auteur, email) VALUES (?, ?, ?, ?, ?)";
        $ajout = $pdo->prepare($sql);

        $ajout->bindParam(1, $titre);
        $ajout->bindParam(2, $contenu);
        $ajout->bindParam(3, $date);
        $ajout->bindParam(4, $auteur);
        $ajout->bindParam(5, $email);

        $ajoutEx = $ajout->execute();
        header("Location: témoignages.php");
        die();
    }
}


?>
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