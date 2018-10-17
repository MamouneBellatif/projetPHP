<?php
// Test de la classe DAO
require_once('DAO.class.php');

$ref = 61019994;
// Recupère les n  articles précédents
$list = $dao->prevN($ref,4);

// Affiche les 4  articles précédents
print('Les '.count($list).' articles qui précèdent la référence '.$ref." sont : \n");
foreach ($list as  $a) {
  print($a->libelle.' à '.$a->prix.'€ ('.$a->ref.") \n");
}

 ?>
