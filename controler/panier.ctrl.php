<?php
if(isset($_GET['payer'])){
  $_SESSION['panier'] = array();
  header('Location: main.ctrl.php');
}

$prixTotal = 0;

if(isset($_GET['del'])){
  $articleEtQuat = $_SESSION['panier'][$_GET['del']];
  $article = $articleEtQuat[0];
  $quantite = $_SESSION['panier'][$_GET['del']][1];
  $prixTotal = $prixTotal - ($article->prix*$quantite);

  $articlesPanier = array();
  foreach ($_SESSION['panier'] as $key => $articleEtQuat) {
    if ( !($key == $_GET['del']) ){
      array_push($articlesPanier, $articleEtQuat);
    }
  }
  $_SESSION['panier'] = $articlesPanier;
  header('Location: main.ctrl.php?panier=1');
}

$articles = $_SESSION['panier'];
$prixTotal = 0;
foreach ($_SESSION['panier'] as $key => $articleEtQuat) {
  $article = $articleEtQuat[0];
  $quantite = $articleEtQuat[1];
  $prixTotal = $prixTotal + ($article->prix*$quantite);
}

if ($prixTotal == 0)
    $panierVide = true;
else
    $panierVide = false;

include('../view/panier.view.php');

?>
