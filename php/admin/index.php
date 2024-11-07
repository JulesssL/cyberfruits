<!DOCTYPE html>
<html>
    <head>
        <title>Espace Admin - CyberFruits</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    
    <body>
      <h1 class="text-logo">CyberFruits</h1>
        <div class="container admin">
          <a href="deconnexionAdmin.php">Se déconnecter</a>
            <div class="row">
                <h1><strong>Liste des articles   </strong><a href="insertArticle.php" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titre</th>
                      <th>Description</th>
                      <th>Auteur</th>
                      <th>Date</th>
                      <th>Catégorie</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       require 'database.php';
                       require_once "verifierAdmin.php";
                       $db = Database::connect();
                       $statement = $db->query('SELECT * FROM articles ORDER BY id DESC');
                       while($article = $statement->fetch()) {
                           echo '<tr>';
                           echo '<td>'. $article['id'] . '</td>';
                           echo '<td>'. $article['titre'] . '</td>';
                           echo '<td>'. $article['description'] . '</td>';
                           echo '<td>'. $article['auteur'] . '</td>';
                           echo '<td>'. $article['date'] . '</td>';
                           echo '<td>'. $article['categorie'] . '</td>';
                           echo '<td width=340>';
                           echo '<a class="btn btn-secondary" href="viewArticle.php?id='.$article['id'].'"><span class="bi-eye"></span> Voir</a>';
                           echo ' ';
                           echo '<a class="btn btn-primary" href="updateArticle.php?id='.$article['id'].'"><span class="bi-pencil"></span> Modifier</a>';
                           echo ' ';
                           echo '<a class="btn btn-danger" href="deleteArticle.php?id='.$article['id'].'"><span class="bi-x"></span> Supprimer</a>';
                           echo '</td>';
                           echo '</tr>';
                       }
                      ?>
                  </tbody>
                </table>

                <h1><strong>Liste des témoignages </strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titre</th>
                      <th>Contenu</th>
                      <th>Date</th>
                      <th>Auteur</th>
                      <th>email</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       $statement = $db->query('SELECT * FROM témoignages ORDER BY id DESC');
                       while($témoignage = $statement->fetch()) {
                           echo '<tr>';
                           echo '<td>'. $témoignage['id'] . '</td>';
                           echo '<td>'. $témoignage['titre'] . '</td>';
                           echo '<td>'. substr($témoignage['contenu'],0,200) . '</td>';
                           echo '<td>'. $témoignage['date'] . '</td>';
                           echo '<td>'. $témoignage['auteur'] . '</td>';
                           echo '<td>'. $témoignage['email'] . '</td>';
                           echo '<td width=340>';
                           echo '<a class="btn btn-secondary" href="viewTémoignage.php?id='.$témoignage['id'].'"><span class="bi-eye"></span> Voir</a>';
                           echo ' ';
                           echo '<a class="btn btn-danger" href="deleteTémoignage.php?id='.$témoignage['id'].'"><span class="bi-x"></span> Supprimer</a>';
                           echo '</td>';
                           echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                  </tbody>
                </table>


                <h1><strong>Liste des inscrits</strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       $statement = $db->query('SELECT * FROM users ORDER BY id DESC');
                       while($inscrit = $statement->fetch()) {
                           echo '<tr>';
                           echo '<td>'. $inscrit['id'] . '</td>';
                           echo '<td>'. $inscrit['nom'] . '</td>';
                           echo '<td>'. $inscrit['prenom'] . '</td>';
                           echo '<td>'. $inscrit['email'] . '</td>';
                           echo '<td width=340>';
                           echo '<a class="btn btn-danger" href="deleteCompte.php?id='.$inscrit['id'].'"><span class="bi-x"></span> Supprimer</a>';
                           echo '</td>';
                           echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                  </tbody>
                </table>

                <h1><strong>Liste des messages</strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titre</th>
                      <th>Contenu</th>
                      <th>Email</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       $statement = $db->query('SELECT * FROM contact ORDER BY id DESC');
                       while($message = $statement->fetch()) {
                           echo '<tr>';
                           echo '<td>'. $message['id'] . '</td>';
                           echo '<td>'. $message['titre'] . '</td>';
                           echo '<td>'. $message['contenu'] . '</td>';
                           echo '<td>'. $message['email'] . '</td>';
                           echo '<td>'. $message['date'] . '</td>';
                           echo '<td width=340>';
                           echo '<a class="btn btn-secondary" href="viewMessage.php?id='.$message['id'].'"><span class="bi-eye"></span> Voir</a>';
                           echo ' ';
                           echo '<a class="btn btn-danger" href="deleteMessage.php?id='.$message['id'].'"><span class="bi-x"></span> Supprimer</a>';
                           echo '</td>';
                           echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
