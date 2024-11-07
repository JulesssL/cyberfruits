<?php
    require 'database.php';
    require_once "verifierAdmin.php";

    if(!empty($_POST)) {
        $titre = checkInput($_POST['titre']);
        $description = checkInput($_POST['description']);
        $contenu = checkInput($_POST['contenu']);
        $auteur = checkInput($_POST['auteur']); 
        $date = checkInput($_POST['date']);
        $catégorie = checkInput($_POST['categorie']);
        $isSuccess = true;
        
        if (empty($titre)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($description)) {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if (empty($contenu)) {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }  
        if (empty($auteur)) {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($date)) {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($catégorie)) {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if($isSuccess) {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO articles (titre, description, contenu, auteur, date, categorie) VALUES(?,?,?,?,?,?)");
            $statement->execute(array($titre,$description,$contenu,$auteur,$date,$catégorie));
            Database::disconnect();
            header("Location: index.php");
        }
    }

    function checkInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter - CyberFruits</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo">CyberFruits</h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter un article</strong></h1>
                <br>
                <form class="form" action="insertArticle.php" role="form" method="post" enctype="multipart/form-data">
                    <br>
                    <div>
                        <label class="form-label" for="name">Titre:</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="description">Contenu:</label>
                        <textarea class="form-control" name="contenu" id="contenu" cols="30" rows="10" placeholder="Contenu"></textarea>
                    <br>
                    <div>
                        <label class="form-label" for="description">Auteur:</label>
                        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur (Prénom NOM)" >
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="price">date</label>
                        <input type="date" step="0.01" class="form-control" id="date" name="date" placeholder="date" >
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="category">Catégorie:</label>
                        <select class="form-control" id="categorie" name="categorie">
                        <?php
                            $db = Database::connect();
                           foreach ($db->query('SELECT * FROM categories_articles') as $row) {
                                echo '<option value="'. $row['id'] .'">'. $row['nom_categorie'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>