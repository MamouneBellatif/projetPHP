<?php
include("../view/header.php");

  echo '<section>';
    echo"<fieldset>";
      if (isset($user)){
        echo"<legend> Information d'un utilisateur </legend>";
        $currentUser = $user;
      }else{
        echo"<legend> Vos information </legend>";
      }
          echo "<table>";
            echo "<tr>";
              echo "<td>E-mail :</td>";
              echo "<td>$currentUser->mail</td>";
              if ($autre)
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&mailCompte=$currentUser->mail&modif=mail\">Modifier</a></td>";
              else
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&modif=mail\">Modifier</a></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>Nom :</td>";
              echo "<td>$currentUser->nom</td>";
              if ($autre)
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&mailCompte=$currentUser->mail&modif=nom\">Modifier</a></td>";
              else
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&modif=nom\">Modifier</a></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>Prenom :</td>";
              echo "<td>$currentUser->prenom</td>";
              if ($autre)
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&mailCompte=$currentUser->mail&modif=prenom\">Modifier</a></td>";
              else
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&modif=prenom\">Modifier</a></td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>Statut :</td>";
              echo "<td>$currentUser->statut</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>Mot de passe</td>";
              echo "<td></td>";
              if ($autre)
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&mailCompte=$currentUser->mail&modif=mdp\">Modifier</a></td>";
              else
                echo "<td><a href=\"../controler/main.ctrl.php?infocompte=1&modif=mdp\">Modifier</a></td>";
            echo "</tr>";
          echo "</table>";
    echo"</fieldset>";
  echo '</section>';
  if (isset($modification)){
    echo '<section>';
      echo"<fieldset>";
        echo"<legend> Modification $modification </legend>";
        if ($modification == 'mail'){
          echo "<form>";
            echo "<input type=\"hidden\" name=\"infocompte\" value=\"1\">";
            if ($autre){
              echo "<input type=\"hidden\" name=\"mailCompte\" value=\"$currentUser->mail\">";
            }
            echo "<input type=\"hidden\" name=\"id\" value=\"$currentUser->id\">";
            echo "<input type=\"email\" name=\"modifMail\" placeholder=\"e-mail\">";
            echo "<input type=\"submit\" value=\"Valider\">";
          echo "</form>";
        }else if ($modification == 'nom'){
          echo "<form>";
            echo "<input type=\"hidden\" name=\"id\" value=\"$currentUser->id\">";
            if ($autre){
              echo "<input type=\"hidden\" name=\"mailCompte\" value=\"$currentUser->mail\">";
            }
            echo "<input type=\"hidden\" name=\"infocompte\" value=\"1\">";
            echo "<input type=\"text\" name=\"modifNom\" placeholder=\"nom\">";
            echo "<input type=\"submit\" value=\"Valider\">";
          echo "</form>";
        }else if ($modification == 'prenom'){
          echo "<form>";
            echo "<input type=\"hidden\" name=\"id\" value=\"$currentUser->id\">";
            if ($autre){
              echo "<input type=\"hidden\" name=\"mailCompte\" value=\"$currentUser->mail\">";
            }
            echo "<input type=\"hidden\" name=\"infocompte\" value=\"1\">";
            echo "<input type=\"text\" name=\"modifPrenom\" placeholder=\"prenom\">";
            echo "<input type=\"submit\" value=\"Valider\">";
          echo "</form>";
        }else if ($modification == 'mdp'){
          echo "<form>";
            echo "<input type=\"hidden\" name=\"id\" value=\"$currentUser->id\">";
            if ($autre){
              echo "<input type=\"hidden\" name=\"mailCompte\" value=\"$currentUser->mail\">";
            }
            echo "<input type=\"hidden\" name=\"infocompte\" value=\"1\">";
            echo "<input type=\"password\" name=\"modifMdp\" placeholder=\"mot de passe\">";
            echo "<input type=\"submit\" value=\"Valider\">";
          echo "</form>";
        }
      echo"</fieldset>";
    echo '</section>';
  }
include("../view/footer.php");
?>
