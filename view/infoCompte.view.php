<?php
include("../view/header.php");

  echo '<section>';
    echo"<fieldset>";
      echo"<legend> Vos information </legend>";
        echo "<p>E-mail : $currentUser->mail</p>";
        echo "<p></p>";
        echo "<p>Nom : $currentUser->nom</p>";
        echo "<p>Prenom : $currentUser->prenom</p>";
        echo "<p></p>";
        echo "<p>Type de compte : $currentUser->statut</p>";
    echo"</fieldset>";
  echo '</section>';

include("../view/footer.php");
?>
