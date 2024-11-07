<?php

require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    if(!empty($pseudo) && !empty($mdp)) {

        $pdo = Database::connect();
        
        $data = $pdo->prepare("SELECT * FROM admin WHERE pseudo=?");
        $data->execute([$pseudo]); 
        $user = $data->fetch();

        if ($user == false){
            echo "<p class='errorMessage'>Vos infos sont invalides</p>";
        }else{
            if ($mdp == $user['mdp']) {
                $_SESSION['admin'] = $pseudo;
                header('Location: index.php');
                die();
            }else{
                echo "<p class='errorMessage'>Vos infos sont invalides</p>";
            }
        }

}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <title>Page d'accès - CyberFruits</title>
</head>
<body>
    <h2>Accès - CyberFruits</h2>
    <form method="post" action="accessAdmin.php">
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudonyme"><br>
        <input type="password" id="mdp" name="mdp" placeholder="Mot de passe"><br>
        <input type="submit" value="Valider">
    </form>
    <style>
        h2{
            text-align: center;
            font-size: 10vh;
            font-weight: bold;
            color: #000000;
            margin-top: 5vh;
        }

        form{
            padding: 2em;
            display: flex;
            flex-direction: column;
            gap:1vh;
        }

        input{
            padding: 0.8em;
            font-size: 2vh;
            border: 1px solid #000000;
            border-radius: 5px;
        }
    </style>
</body>
</html>