<html>
<head>
  <title>Inscription - La Moucherie</title>
  <meta charset="UTF-8"/>
  <meta http-equiv="content-type" content="text/html;" />
  <meta name="author" content="BELLELATIFDECHEVEUX Mamoune, VACHIER Camille, BARRER Dorian"/>
  <link rel="stylesheet" type="text/css" href="../view/design/insciption.style.css">
</head>

<body class="bridge">
  <header>
    <img src="../view/design/logo-moucherieTrans.png" alt="logo-moucherieTrans">
  </header>
  <nav class="menu">
    <ul>
      <li><a href="../controler/afficherArticles.ctrl.php">accueil</a></li>
    </ul>
  </nav>


    <?php
      if ($ajouter == true){
        //ajouter cookie de connexion
        /*echo "<input type=\"button\" value=\"Terminer\" action=\"../controler/afficherArticles.ctrl.php\">";*/
        echo"<a href=\"../controler/afficherArticles.ctrl.php\"><input type=\"button\" value=\"Terminer\" action=\"../controler/afficherArticles.ctrl.php\"></a>";
      }else{
        echo "<form action=\"../controler/afficherArticles.ctrl.php\" method=\"get\">";
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
      }
    ?>



  <footer>
</footer>
</body>
</html>
