<?php


$ref = $_GET['refArticle'];


$cat = $_GET['cat'];
//si nb présent alors c'est que l'utilisateur veut l'ajouter à son panier
if(isset($_GET['nb'])){
  $aAjouterPanier = array( $dao->getArticle($_GET['refArticle']) ,$_GET['nb']);
  array_push($_SESSION['panier'], $aAjouterPanier);
  header("Location: main.ctrl.php?cat=$cat");
}

if (isset($_GET['modifLibelle'])){
  $dao->modifLibelle($ref,$_GET['modifLibelle']);
}else if(isset($_GET['modifDesc'])){
  $dao->modifDesc($ref,$_GET['modifDesc']);
}else if(isset($_GET['modifImg'])){
  $dao->modifImg($ref,$_GET['modifImg'], $_GET['id']);
}else if(isset($_GET['modifPrix'])){
  $dao->modifPrix($ref,$_GET['modifPrix']);
}

if(isset($_GET['modif'])){
  if ($_GET['modif']=='libelle'){
    $modification = $_GET['modif'];
  }else if($_GET['modif']=='description'){
    $modification = $_GET['modif'];
  }else if($_GET['modif']=='image'){
    $modification = $_GET['modif'];
  }else if($_GET['modif']=='prix'){
    $modification = $_GET['modif'];
  }
}

$article = $dao->getArticle($_GET['refArticle']);
$PATH = '../view/imgArticles/';
$img = $PATH.$article->image;

include("../view/article.view.php");
?>
