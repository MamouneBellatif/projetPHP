<?php
    // Inclusion du modèle
    include_once("../model/DAO.class.php");


    if (isset($_GET['cat']))
      $cat = $_GET['cat'];
    else
      $cat = 0;

    $nbArticle = $dao->getNbArticle($cat);
    $okPrec = true;
    $okNext = true;

    if (isset($_GET['ref'])){
      $ref = $_GET['ref'];
      if (isset($_GET['pred'])){
        $articles = $dao->prec($ref, $cat);
        $okPrec = (sizeof($articles)>0) ? true : false;
      }elseif (isset($_GET['next'])){
        $articles = $dao->next($ref, $cat);
        $okNext = (sizeof($articles)>0) ? true : false;
      }
    }else{
      $articles = $dao-> firstN($cat);
    }


    // categories
    $listeCategorie = $dao->getAllCat();


    // Charge la vue
    include("../view/articles.view.php");
?>
