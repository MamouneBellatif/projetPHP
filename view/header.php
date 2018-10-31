<html>
<head>
  <title>La Moucherie</title>
  <meta charset="UTF-8"/>
  <meta http-equiv="content-type" content="text/html;" />
  <meta name="author" content="BELLELATIFDECHEVEUX Mamoune, VACHIER Camille, BARRER Dorian"/>
  <link rel="stylesheet" type="text/css" href="../view/design/style.css">
</head>

<body class="bridge">
  <header>
    <img src="../view/design/logo-moucherieTrans.png" alt="logo-moucherieTrans">
    <form class="formulaire" action="index.html" method="post">
      <input class="champ" type="text" placeholder="Recherche"/>
      <input class="bouton" type="button" value=" " />
    </form>

  </header>

  <nav class="connexion">
    <ul>
      <?php
          if ($userConnected){
            echo "<li>MON COMPTE";
              echo "<ul>";
                echo "<li><a href=\"../controler/main.ctrl.php?panier=1\">Mon panier</a></li>";
                echo "<li><a href=\"../controler/main.ctrl.php?infocompte=1\">Information compte</a></li>";
                echo "<li><a href=\"../controler/main.ctrl.php?deconnexion=1\">Déconnexion</a></li>";
              echo "</ul>";
            echo "</li>";
          }else{

            echo "<li><a href=\"../controler/main.ctrl.php?inscription=1\">S'inscrire</a></li>";
            echo "<li><form action=\"../controler/main.ctrl.php\" method=\"get\">Se connecter";
              echo "<ul>";
                echo "<li><input type=\"email\" name=\"user_mail\" placeholder=\"e-mail\"></li>";
                echo "<li><input type=\"password\" name=\"user_password\" placeholder=\"mot de passe\"></li>";
                echo "<li><input type=\"submit\" value=\"valider\"></li>";
              echo "</ul>";
            echo "</form></li>";
          }
       ?>

    </ul>
  </nav>

  <nav class="menu">
    <ul>
      <li><a href="../controler/main.ctrl.php">accueil</a></li>

      <?php
        foreach ($listeCategorie as $key => $value) {
          if (sizeof($value)>1){
            $catPere = $value[0]->nom;
            $numCat = $value[0]->id;
            echo"<li><a href=\"../controler/main.ctrl.php?cat=$numCat\">$catPere</a>";
            //affichage des sous-catégories
            echo"<ul>";
              for ($i = 1; $i<sizeof($value); $i++){
                $sousCat = $value[$i]->nom;
                $numSousCat = $value[$i]->id;
                echo"<li><a href=\"../controler/main.ctrl.php?cat=$numSousCat\">$sousCat</a></li>";
              }
            echo"</ul>";
            echo"</li>";
          }else{
            $catPere = $value[0]->nom;
            $numCat = $value[0]->id;
            echo"<li><a href=\"../controler/main.ctrl.php?cat=$numCat\">$catPere</a></li>";
          }
        }
      ?>

    </ul>
  </nav>
