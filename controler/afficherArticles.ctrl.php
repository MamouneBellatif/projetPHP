<?php
    // Inclusion du modèle
    include_once("../model/DAO.class.php");


    if (isset($_GET['cat']))
      $cat = $_GET['cat'];
    else
      $cat = 0;

    $nbArticle = $dao->getNbArticle($cat);

    if (isset($_GET['ref'])){
      $ref = $_GET['ref'];
      if (isset($_GET['pred'])){
        $articles = $dao->prevN($ref,12, $cat);
      }elseif (isset($_GET['next'])){
        $articles = $dao->next($ref, $cat);
      }
    }else{
      $articles = $dao-> firstN(9, $cat);
    }



    // Article suivant
    //$nextRef = $dao->next(end($articles)->ref);

    // Les articles précédents
    //$prev = $dao->prevN($articles[0]->ref,12);

    // categories
    $listeCategorie = $dao->getAllCat();


    // Charge la vue
    include("../view/articles.view.php");
?>
