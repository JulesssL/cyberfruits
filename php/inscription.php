<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/styleinscription.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">

    <title>CyberFruits - Inscription</title>
</head>
<body>
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
            <a class="buttonConnexion" href="connexion.php">Se connecter</a>
        </div>
        <div class="navBarLinks">
            <li><a class="navBarAlink" href="articles.php">Articles</li></a>
            <li><a class="navBarAlink" href="statistiques.php">Statistiques</a></li>
            <li><a class="navBarAlink" href="témoignages.php">Témoignages</a></li>
            <li><a class="navBarAlink" href="intervention.php">Intervention</a></li>
        </div>
        
    </nav>

    </header>

    <div class="inscriptionDiv reveal">

        <h1 class="bigTitle">Inscription</h1>

        <form action="inscription.php" method="post" class="formulaire">
            <input type="text" name="nom" placeholder="Votre Nom" required>
            <input type="text" name="prenom" placeholder="Votre Prénom" required>
            <input type="text" name="email" placeholder="Votre Email" required>
            <input type="password" name="mdp" min="8" placeholder="Votre Mot de passe" required>
            <input type="submit">
        </form>

        <div class="connexion">
            <p>Déjà inscrit ?</p>
            <a href="connexion.php">Connectez-vous</a>
        </div>
    </div>

    
    <script defer src="../js/app.js"></script>

<?php

require 'admin/database.php';

$pdo = Database::connect();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $mdp = $_POST['mdp'];
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();

    if(!empty($nom) && !empty($email) && !empty($mdp)) {
        if ($email == false){
            echo "<p class='.errorMessage'>Votre Email est invalide</p>";
        }
        else if (strlen($mdp) < 8){
            echo "<p class='.errorMessage'>Mot de passe trop court</p>";
        }
        else if ($user) {
            echo "<p class='.errorMessage'>Email déjà utilisé</p>";
        }
        else{   
            $ajout = $pdo->exec("INSERT INTO users (nom, prenom, email, mdp) VALUES ('$nom', '$prenom', '$email', '$mdp')");
            echo "Ajouté avec succès";
            header("Location: connexion.php");
            die();
        }
        

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

    </body>

</html>