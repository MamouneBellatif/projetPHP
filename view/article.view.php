<?php
include("../view/header.php");

echo '<section class="article">';
  echo"<div>";
    $PATH = '../view/imgArticles/';
    $img = $PATH.$article->image;
    echo "<h2>$article->libelle</h2>";
    echo "<p><img src='$img' /></p>";
    echo "<p>$article->description</p>";
    echo "<p>Prix unitaire : $article->prix</p>";
    if(  isset($_SESSION['statut']) && $_SESSION['statut'] == 'admin'){
      echo "<p>Référence : $article->ref</p>";
    }
    echo"<fieldset>";
      echo"<legend> Ajouter au panier </legend>";
      if ($userConnected){
        echo "<form action=\"../controler/main.ctrl.php\" method=\"get\">";
          echo "<input type=\"hidden\" name=\"refArticle\" value=\"$article->ref\">";
          echo "<input type=\"number\" name=\"nb\" step=\"1\" value=\"1\" min=\"1\" max=\"50\">";
          echo "<input type=\"submit\" value=\"Valider\">";
        echo "</form>";
      }else{
        echo "<p>Connectez vous pour ajouter</p>";
        echo "<p>l'article à votre panier.</p>";
      }
    echo"</fieldset>";
  echo"</div>";
echo '</section>';

include("../view/footer.php");
?>
