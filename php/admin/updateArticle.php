<?php

    require 'database.php';
    require_once "verifierAdmin.php";

    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM articles where id = ?");
    $statement->execute(array($id));
    $article = $statement->fetch();
    $titre = $article['titre'];
    $description = $article['description'];
    $contenu = $article['contenu'];
    $auteur = $article['auteur'];
    $date = $article['date'];
    $catégorie = $article['categorie'];
    Database::disconnect();

    if (!empty($_POST)) {
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
        
        
         
        if ($isSuccess) { 
            $db = Database::connect();
            $statement = $db->prepare("UPDATE articles  set titre= ?, description = ?, contenu = ?, auteur = ?, date = ?, categorie=? WHERE id = ?");
            $statement->execute(array($titre, $description, $contenu, $auteur, $date, $catégorie, $id));
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
    <title>Modifier - CyberFruits</title>
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
                <div class="col-md-6">
                    <h1><strong>Modifier un article</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'updateArticle.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <br>
                        <div>
                            <label class="form-label" for="name">Nom:</label>
                            <input type="text" class="form-control" id="name" name="titre" placeholder="Titre" value="<?php echo $titre;?>">
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                        </div>
                        <br>
                        <div>
                        <label class="form-label" for="price">Contenu:</label>
                            <textarea name="contenu" class="form-control" cols="30" rows="10" placeholder="Contenu" ><?php echo $contenu; ?></textarea>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="description">Auteur:</label>
                            <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur" value="<?php echo $auteur;?>">
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="description">Auteur:</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo $date;?>">
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="category">Catégorie:</label>
                            <select class="form-control" id="categorie" name="categorie">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT * FROM categories_articles') as $row) 
                               {
                                    if($row['id'] == $category)
                                        echo '<option selected="selected" value="'. $row['id'] .'">'. $row['nom_categorie'] . '</option>';
                                    else
                                        echo '<option value="'. $row['id'] .'">'. $row['nom_categorie'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>
