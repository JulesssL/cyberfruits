<?php
require 'database.php';
require_once "verifierAdmin.php";

$id = $_GET['id'];

$db = Database::connect();
$statement = $db->prepare("SELECT * FROM articles WHERE id = ?");
$statement->execute(array($id));
$item = $statement->fetch();
Database::disconnect();
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Article - CyberFruits</title>
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
            <h1><strong>Voir un article</strong></h1>
            <br>
            <form>
              <div>
                <label>Nom:</label><?php echo '  '.$item['titre'];?>
              </div>
              <br>
              <div>
                <label>Description:</label><?php echo '  '.$item['description'];?>
              </div>
              <br>
              <div>
                <label>Contenu:</label><?php echo '  '.nl2br($item['contenu']);?>
              </div>
              <br>
              <div>
                <label>Auteur:</label><?php echo '  '.$item['auteur'];?>
              </div>
              <br>
              <div>
                <label>Date:</label><?php echo '  '.$item['date'];?>
              </div>
              <br>
              <div>
                <label>Catégorie:</label><?php echo '  '.$item['categorie'];?>
              </div>
              <br>
            </form>
            <br>
            <div class="form-actions">
              <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
            </div>
          </div>
        </div>
      </div>   
    </body>
</html>

