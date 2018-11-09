<?php
include("../view/header.php");

echo '<section class="article">';
  echo"<div>";
    echo "<h2>$article->libelle</h2>";
    echo "<p><img src='$img' /></p>";
    echo "<p>$article->description</p>";
    echo "<p>Prix unitaire : $article->prix</p>";
    /*if(  isset($_SESSION['statut']) && $_SESSION['statut'] == 'admin'){
      echo "<p>Référence : $article->ref</p>";
    }*/
    echo"<fieldset>";
      echo"<legend> Ajouter au panier </legend>";
      if ($userConnected){
        echo "<form action=\"../controler/main.ctrl.php\" method=\"get\">";
          echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
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

if(  isset($_SESSION['statut']) && $_SESSION['statut'] == 'admin'){
  echo '<section>';
    echo"<fieldset>";
      echo"<legend> Information de l'article </legend>";
      echo "<table>";
        echo "<tr>";
          echo "<td>Libelle :</td>";
          echo "<td>$article->libelle</td>";
          echo "<td><a href=\"../controler/main.ctrl.php?cat=$article->categorie&refArticle=$article->ref&modif=libelle\">Modifier</a></td>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>Description :</td>";
          echo "<td>$article->description</td>";
          echo "<td><a href=\"../controler/main.ctrl.php?cat=$article->categorie&refArticle=$article->ref&modif=description\">Modifier</a></td>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>Image :</td>";
          echo "<td>$img</td>";
          echo "<td><a href=\"../controler/main.ctrl.php?cat=$article->categorie&refArticle=$article->ref&modif=image\">Modifier</a></td>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>Prix :</td>";
          echo "<td>$article->prix</td>";
          echo "<td><a href=\"../controler/main.ctrl.php?cat=$article->categorie&refArticle=$article->ref&modif=prix\">Modifier</a></td>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>Référence :</td>";
          echo "<td>$article->ref</td>";
        echo "</tr>";
      echo "</table>";
    echo"</fieldset>";
  echo '</section>';
}

if (isset($modification)){
echo '<section>';
  echo"<fieldset>";
    echo"<legend> Modification $modification de l'article</legend>";
    if ($modification == 'libelle'){
      echo "<form>";
        echo "<input type=\"hidden\" name=\"cat\" value=\"$article->categorie\">";
        echo "<input type=\"hidden\" name=\"refArticle\" value=\"$article->ref\">";
        echo "<input type=\"text\" name=\"modifLibelle\" placeholder=\"libelle\">";
        echo "<input type=\"submit\" value=\"Valider\">";
      echo "</form>";
    }else if ($modification == 'description'){
      echo "<form>";
        echo "<input type=\"hidden\" name=\"cat\" value=\"$article->categorie\">";
        echo "<input type=\"hidden\" name=\"refArticle\" value=\"$article->ref\">";
        echo "<input type=\"text\" name=\"modifDesc\" placeholder=\"description\">";
        echo "<input type=\"submit\" value=\"Valider\">";
      echo "</form>";
    }else if ($modification == 'image'){
      echo "<form>";
        echo "<input type=\"hidden\" name=\"cat\" value=\"$article->categorie\">";
        echo "<input type=\"hidden\" name=\"refArticle\" value=\"$article->ref\">";
        echo "<input type=\"text\" name=\"modifImg\" placeholder=\"image\">";
        echo "<input type=\"submit\" value=\"Valider\">";
      echo "</form>";
    }else if ($modification == 'prix'){
      echo "<form>";
        echo "<input type=\"hidden\" name=\"cat\" value=\"$article->categorie\">";
        echo "<input type=\"hidden\" name=\"refArticle\" value=\"$article->ref\">";
        echo "<input type=\"number\" name=\"modifPrix\" min=0 placeholder=\"prix\">";
        echo "<input type=\"submit\" value=\"Valider\">";
      echo "</form>";
    }
  echo"</fieldset>";
echo '</section>';
}

include("../view/footer.php");
?>
