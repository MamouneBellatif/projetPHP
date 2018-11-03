<?php
//pour identifier la catégorie en train d'être visité
// rien ou 0 signifie qu'on est sur la page d'accueil
if (isset($_GET['cat']))
  $cat = $_GET['cat'];
else
  $cat = 0;

//si une référence est présente en $_GET
//alors on regarde si l'utilisateur veut voir les articles suivant ou précédent
//sinon on lui affiche les premiers articles de la catégorie défini précédemment
if (isset($_GET['ref'])){
  $ref = $_GET['ref'];
  if (isset($_GET['pred'])){
    $articles = $dao->prec($ref, $cat);
  }elseif (isset($_GET['next'])){
    $articles = $dao->next($ref, $cat);
  }
}else{
  $articles = $dao-> firstN($cat);
}

//permet à la vue de savoir si l'utilisateur doit pouvoir choisir de voir
//les articles précédents ou suivant les articles courants
$prec = $dao->prec($articles[0]->ref, $cat);
$okPrec = (sizeof($prec)>0) ? true : false;
$next = $dao->next(end($articles)->ref, $cat);
$okNext = (sizeof($next)>0) ? true : false;

include("../view/articles.view.php");
?>
