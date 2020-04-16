<?php

require 'class/bdd.php';

session_start();

if(!isset($_SESSION['bdd']))
{
  $_SESSION['bdd'] = new bdd();
}

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $result=$_SESSION["bdd"]->infos($id);
}
else
{
  header("location:index.php");
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Résultat</title>
</head>
<body>
<?php require "include/header.php" ?>
  <main>
  <section class="panneau">
    <h1>Votre recherche</h1>
      <?php
      foreach($result as list($id,$nom_fr,$nom_lat,$ordre,$categorie,$couleur,$description))
        {
        ?>
          <article class="bloc">
            <h2>Nom : <?php echo $nom_fr;?></h2>
            <p>Nom scientifique : <?php echo $nom_lat;?></p>
            <p>Ordre (famille) : <?php echo $ordre;?></p>
            <p>Catégorie : <?php echo $categorie;?></p>
            <p>Couleur principale : <?php echo $couleur;?></p>
            <p>Description : <?php echo $description;?></p>
          </article>
        <?php
        }
      ?>
  </main>
<?php require "include/footer.php" ?>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="script.js"></script>

