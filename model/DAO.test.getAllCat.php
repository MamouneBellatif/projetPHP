<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère toutes les catégories
$cat = $dao->getAllCat();

// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
print($cat[3]->id.' '.$cat[3]->nom.' < '.$cat[3]->pere.' '.$cat[$cat[3]->id]->nom."\n");

 ?>
