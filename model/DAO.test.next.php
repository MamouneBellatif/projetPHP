<?php
// Test de la classe DAO
require_once('DAO.class.php');

$ref1=60040351;
// Recupère la référence suivante de
$ref2 = $dao->next($ref1);

// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
print('La référence qui suit '.$ref1.' est '.$ref2."\n");

 ?>
