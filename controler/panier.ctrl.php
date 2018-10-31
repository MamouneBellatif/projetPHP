<?php

$articles = $_SESSION['panier'];
$prixTotal = 0;
foreach ($_SESSION['panier'] as $key => $articleEtQuat) {
  $article = $articleEtQuat[0];
  $quantite = $articleEtQuat[1];
  $prixTotal = $prixTotal + ($article->prix*$quantite);
}

if(isset($_GET['del'])){
  $articleEtQuat = $_SESSION['panier'][$_GET['del']];
  $article = $articleEtQuat[0];
  $prixTotal = $prixTotal - ($article->prix*$_SESSION['panier'][$_GET['del']][1]);
  array_splice ($_SESSION['panier'],$_GET['del']);
  //header('Location: main.ctrl.php?panier=1');
}

if ($prixTotal == 0)
    $panierVide = true;
else
    $panierVide = false;

include('../view/panier.view.php');

?>
