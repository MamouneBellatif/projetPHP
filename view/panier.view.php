<?php
include("../view/header.php");

if ($panierVide){
  echo '<div>';
    echo "<p>Panier vide.</p>";
  echo '</div>';
}else{
  echo '<section>';
    echo "<p>Prix total : $prixTotal</p>";
  echo '</section>';
  echo '<section>';
    foreach ($_SESSION['panier'] as $key => $articleEtQuat) {
      $PATH = '../view/imgArticles/';
      $img = $PATH.$articleEtQuat[0]->image;
      $article = $articleEtQuat[0];
      $quantite = $articleEtQuat[1];
        echo '<article>';
          echo "<p>$article->libelle</p>";
          echo "<p><img src='$img' /></p>";
          echo "<p>Prix unitaire : $article->prix</p>";
          echo "<p>Quantité : $quantite</p>";
          echo "<a href=\"../controler/main.ctrl.php?panier=1&del=$key\">Supprimer</a>";
        echo '</article>';
    }
  echo '</section>';
}

include("../view/footer.php");
?>
