<?php

require 'class/bdd.php';

session_start();

if(!isset($_SESSION['bdd']))
{
  $_SESSION['bdd'] = new bdd();
}

  $result=$_SESSION["bdd"]->var_bdd();
  $oiseaux=[];
  foreach($result as $id=>$oiseau)
  {
  $oiseaux[$id] = $oiseau;
 }
  
 //Récupération des résultats via AJAX/JSON
  echo json_encode($oiseaux);

?>


