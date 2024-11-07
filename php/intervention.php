<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleIntervention.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">

    <title>CyberFruits - Les témoignages</title>
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
        <li><a class="activePage navBarAlink" href="intervention.php">Intervention</a></li>
    </div>

    <h1 class="midTitle">Nous faire intervenir</h1>

    <p class="interventionText reveal">
        CyberFruits est dévoué à la lutte contre tous les types de cyber-harcèlement, et nous sommes là pour vous
        aider. Que vous soyez victime, témoin ou simplement à la recherche d'informations, n'hésitez pas à nous
        contacter pour toute question ou demande d'assistance. </br><br>

        Voici quelques exemples de situations dans lesquelles nous pouvons vous aider :</br><br>

        <span>Signaler un cas de cyber-harcèlement : </span> Si vous êtes victime de harcèlement en ligne ou si vous avez connaissance
        d'un cas de cyber-harcèlement, nous vous encourageons à nous contacter. Nous sommes là pour vous soutenir et
        vous guider dans les étapes à suivre pour signaler et faire face à cette situation.</br><br>

        <span> Obtenir des conseils et des ressources : </span>Vous avez besoin de conseils sur la façon de faire face au
        cyber-harcèlement ? Vous cherchez des ressources pour mieux comprendre vos droits et recours en cas de
        harcèlement en ligne ? Notre équipe est là pour répondre à vos questions et vous fournir les informations dont
        vous avez besoin.</br><br>

        <span>Organiser des interventions et des actions de sensibilisation :</span> Nous sommes également disponibles pour
        collaborer avec des écoles, des entreprises ou d'autres organisations pour organiser des interventions et des
        actions de sensibilisation sur le cyber-harcèlement. N'hésitez pas à nous contacter si vous souhaitez en savoir
        plus sur nos programmes et nos initiatives.</br><br>

        <span>Participer à nos projets et initiatives :</span> Vous souhaitez vous impliquer dans la lutte contre le
        cyber-harcèlement ? Nous sommes toujours à la recherche de bénévoles et de partenaires pour soutenir nos projets
        et initiatives. Contactez-nous pour en savoir plus sur les possibilités de collaboration.</br><br>

        Quelle que soit la nature de votre demande, nous vous assurons la confidentialité et le soutien dont vous avez
        besoin. Ensemble, nous pouvons contribuer à créer un environnement en ligne plus sûr et plus respectueux pour
        tous.</br><br>

        N'hésitez pas à utiliser le formulaire de contact ci-dessous pour nous envoyer un message ou à nous contacter
        directement par email ou par téléphone. Nous sommes là pour vous aider.
    </p>

    <div class="contactDiv reveal">

        <h1 class="bigTitle">Votre demande</h1>

        <form action="intervention.php" method="post" class="formulaire">
            <input type="text" name="titre" placeholder="Titre" required><br>
            <textarea id="contenu" name="contenu" cols="30" rows="10" placeholder="Votre demande..."></textarea><br>
            <input type="submit">
        </form>

    </div>



    <?php

    require 'admin/database.php';

    $pdo = Database::connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];

        $date = date('Y-m-d');

        if (!isset($_SESSION)) {
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

        if (!empty($titre) && !empty($contenu)) {
            $sql = "INSERT INTO contact(titre, contenu, auteur, email, date) VALUES (?, ?, ?, ?, ?)";
            $ajout = $pdo->prepare($sql);

            $ajout->bindParam(1, $titre);
            $ajout->bindParam(2, $contenu);
            $ajout->bindParam(3, $auteur);
            $ajout->bindParam(4, $email);
            $ajout->bindParam(5, $date);

            $ajoutEx = $ajout->execute();
            header("Location: intervention.php");
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