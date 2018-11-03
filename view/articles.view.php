<?php
include("../view/header.php");

//affiche les boutons précédent/suivant
//si le controler à verfier que c'était possible d'effectuer ces actions
echo '<section class="parcourir">';
  if ($cat!=0 && $okPrec){
    $refFirst = $articles[0]->ref;
    echo "<a href=\"../controler/main.ctrl.php?pred=1&cat=$cat&ref=$refFirst\"><img src=\"../view/design/left-arrow.png\" alt=\"Précédents\"></a>";
  }
  if ($cat!=0 && $okNext){
    $refEnd = end($articles)->ref;
    echo "<a href=\"../controler/main.ctrl.php?next=1&cat=$cat&ref=$refEnd\"><img src=\"../view/design/right-arrow.png\" alt=\"Suivants\"></a>";
  }
  if ($cat==0){
    echo "<p>Top 10 des produits les plus vendus !</p>";
  }
echo '</section>';

//////////////////////////////////
//affichage des ou d'un articles
//////////////////////////////////
echo '<section class="articles">';
  $PATH = '../view/imgArticles/';
  foreach ($articles as $key => $article) {
    $img = $PATH.$article->image;
    echo"<a href=\"../controler/main.ctrl.php?refArticle=$article->ref\">";
      echo '<article>';
        echo "<p>$article->libelle</p>";
        echo "<p><img src='$img' /></p>";
        echo "<p>Prix : $article->prix</p>";
      echo '</article>';
    echo"</a>";
  }
echo '</section>';


include("../view/footer.php");
?>
