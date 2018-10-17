<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère les n premiers articles
$list = $dao->getN(60040351,4);

// Affiche les 5 premiers articles
foreach ($list as  $a) {
  print($a->libelle.' à '.$a->prix.'€ ('.$a->ref.") \n");
}

 ?>
