<?php
    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    if (isset($_GET['ref'])){
      $ref = $_GET['ref'];
      $articles = $dao-> getN($ref, 12);
    }else {
      $articles = $dao-> firstN(12);
    }

    // Article suivant
    $nextRef = $dao->next(end($articles)->ref);

    // Les articles précédents
    $prev = $dao->prevN($articles[0]->ref,12);

    // categories
    $listeCategorie = $dao->getAllCat();


    // Charge la vue
    include("../view/articles.view.php");
?>
