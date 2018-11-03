<?php

$article = $dao->getArticle($_GET['refArticle']);

//si nb présent alors c'est que l'utilisateur veut l'ajouter à son panier
if(isset($_GET['nb'])){
  $aAjouterPanier = array( $dao->getArticle($_GET['refArticle']) ,$_GET['nb']);
  array_push($_SESSION['panier'], $aAjouterPanier);
  header("Location: main.ctrl.php?cat=$cat");
}

include("../view/article.view.php");
?>
