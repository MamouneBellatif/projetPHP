<?php
  include("../view/header.php");

  echo"<section>";
    /*if ($ajouter == true){
      echo"<a href=\"../controler/main.ctrl.php\"><input type=\"button\" value=\"Terminer\"></a>";
    }else{*/
      echo "<form action=\"../controler/main.ctrl.php\" method=\"get\">";
        echo "<input type=\"email\" name=\"inscription\" placeholder=\"e-mail\">";
        echo "<input type=\"password\" name=\"password\" placeholder=\"mot de passe\">";
        echo "<input type=\"password\" name=\"passwordConfirm\" placeholder=\"répeter\">";
        echo "<input type=\"submit\" value=\"Valider\">";
        if (!$first){
          echo "<p>Une erreur est survenu :</p>";
          if ($badMail)
            echo "<p>   - l'adresse mail est déja utilisé</p>";

          if (!$goodPw)
            echo "<p>   - les deux mots de passe doivent être les même</p>";

        }

      echo "</form>";
    //}
  echo"</section>";

  include("../view/footer.php");
?>
