<?php
include("../view/header.php");

echo '<section>';
  echo"<div>";
    $PATH = '../view/imgArticles/';
    $img = $PATH.$article->image;
    echo "<p>$article->libelle</p>";
    echo "<p><img src='$img' /></p>";
    echo "<p>$article->prix</p>";
    if ($userConnected){
      echo "<form action=\"../controler/main.ctrl.php\" method=\"get\">";
        echo "<input type=\"hidden\" name=\"refArticle\" value=\"$article->ref\">";
        echo "<input type=\"number\" name=\"nb\" step=\"1\" value=\"1\" min=\"1\" max=\"50\">";
        echo "<input type=\"submit\" value=\"Valider\">";
      echo "</form>";
    }
  echo"</div>";
echo '</section>';

include("../view/footer.php");
?>
