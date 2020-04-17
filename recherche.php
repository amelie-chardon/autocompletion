<?php

require 'class/bdd.php';

session_start();

if(!isset($_SESSION['bdd']))
{
  $_SESSION['bdd'] = new bdd();
}

if(isset($_GET['search']))
{
  $str=$_GET['search'];
  $result=$_SESSION["bdd"]->search($str);
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
  <title>Recherche</title>
</head>
<body>
  <?php require "include/header.php" ?>
  <main>
  <section class="panneau">
    <h1>Vos résultats de recherche</h1>
      <section class="bloc">
        <ul>
        <?php
        foreach($result as list($id,$nom))
          {
          ?>
          <li><p><a href="element.php?id=<?php echo $id;?>"><?php echo $nom; ?></a></p></li>
          <?php
          }
        ?>
        </ul>
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
