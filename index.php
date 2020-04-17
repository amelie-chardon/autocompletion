<?php

require 'class/bdd.php';

session_start();

if(!isset($_SESSION['bdd']))
{
  $_SESSION['bdd'] = new bdd();
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Accueil</title>
</head>
<body id="index">

  <?php require "include/header.php" ;?>
<main>

  <section class="panneau">
    <h1>L'annuaire complet des oiseaux de France</h1>
      <section class="bloc">
        <h2>Rechercher un oiseau :</h2>
        <form autocomplete="off" method="GET" action="recherche.php">
          <input type="text" name="search" id="search" list="liste" placeholder="Votre recherche" required>
          <datalist id="liste">
          </datalist>
          <input type="submit" id="submit">
        </form>
    </section>
  </section>
</main>
<?php require "include/footer.php" ?>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="script.js"></script>


