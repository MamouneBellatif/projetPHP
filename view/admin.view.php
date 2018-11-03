<?php
include("../view/header.php");
  echo '<section>';
    echo"<fieldset>";
      echo"<legend> Information </legend>";
        echo"<p>Vous pouvez voir la référence d'un article en vous rendant sur l'article (en tant qu'administrateur)</p>";
    echo"</fieldset>";
  echo '</section>';
  echo '<section>';
    echo"<fieldset>";
      echo"<legend> Ajouter un article </legend>";
        echo"<form>";
          echo "<input type=\"hidden\" name=\"admin\" value=\"1\">";
          echo "<input type=\"text\" name=\"libelle\" placeholder=\"Nom de l'article\">";
          echo "<input type=\"text\" name=\"description\" placeholder=\"Description de l'article\">";
          echo "<input type=\"text\" name=\"prix\" placeholder=\"Prix\">";
          echo "<input type=\"text\" name=\"image\" placeholder=\"Image\">";
          echo"<p>Catégorie :</p>";
          echo "<SELECT name=\"categorie\">";
            foreach ($listeCategorie as $key => $value) {
              if (sizeof($value)>1){
                $numCatPère = $value[0]->id;
                  for ($i = 1; $i<sizeof($value); $i++){
                    $sousCat = $value[$i]->nom;
                    $numSousCat = $value[$i]->id;
                    echo"<OPTION value=\"$numSousCat\">$sousCat";
                  }
              }else{
                $catPere = $value[0]->nom;
                $numCat = $value[0]->id;
                echo"<OPTION value=\"$numCat\">$catPere";;
              }
            }
          echo "</SELECT>";
          echo "<input type=\"submit\" value=\"Valider\">";
        echo"</form>";
    echo"</fieldset>";

    echo"<fieldset>";
      echo"<legend> Supprimer un article </legend>";
        echo"<form>";
          echo "<input type=\"hidden\" name=\"admin\" value=\"1\">";
          //echo "<input type=\"number\" name=\"refSuppr\" placeholder=\"reférence de l'article\" value=\"1\" min=\"1\" max=\"50\">";
          echo"<p>Référence de l'article :</p>";
          echo "<SELECT name=\"refSuppr\">";
            foreach ($listeArticle as $key => $value) {
                $ref = $value->ref;
                echo"<OPTION>$ref";
            }
          echo "</SELECT>";
          echo "<input type=\"submit\" value=\"Valider\">";
        echo"</form>";
    echo"</fieldset>";

    echo"<fieldset>";
      echo"<legend> Ajouter un utlisateur </legend>";
        echo"<form>";
          echo "<input type=\"hidden\" name=\"admin\" value=\"1\">";
          echo "<input type=\"mail\" name=\"mail\" placeholder=\"Mail de l'utilisateur\">";
          echo "<input type=\"password\" name=\"pass\" placeholder=\"MDP de l'utilisateur\">";
          echo "<input type=\"text\" name=\"name\" placeholder=\"Nom de l'utilisateur\">";
          echo "<input type=\"text\" name=\"prenom\" placeholder=\"Prenom de l'utilisateur\">";
          echo"<p>Statut :</p>";
          echo "<SELECT name=\"statut\">";
            echo "<OPTION>simple";
            echo "<OPTION>admin";
          echo "</SELECT>";
          echo "<input type=\"submit\" value=\"Valider\">";
        echo"</form>";
    echo"</fieldset>";

    echo"<fieldset>";
      echo"<legend> Supprimer un utlisateur </legend>";
        echo"<form>";
          echo "<input type=\"hidden\" name=\"admin\" value=\"1\">";
          echo"<p>Mail d'un utilisateur :</p>";
          echo "<SELECT name=\"refSuppr\">";
            foreach ($listeUser as $key => $value) {
                $mail = $value->mail;
                echo"<OPTION>$mail";
            }
          echo "</SELECT>";
          echo "<input type=\"submit\" value=\"Valider\">";
        echo"</form>";
    echo"</fieldset>";
  echo '</section>';
include("../view/footer.php");
?>
