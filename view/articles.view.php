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
    <!-- <h1>La Moucherie</h1> -->
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
              echo "<li><a href=\"../controler/afficherArticles.ctrl.php\">Mon panier</a></li>";
              echo "<li><a href=\"../controler/afficherArticles.ctrl.php?deconnexion=1\">Déconnexion</a></li>";
            echo "</ul>";
          echo "</li>";
        }else{
      ?>
      <li><a href="../controler/afficherArticles.ctrl.php?inscription=1">S'inscrire</a></li>
      <li><form action="../controler/afficherArticles.ctrl.php" method="get">Se connecter
        <ul>
          <li><input type="email" name="user_mail" placeholder="e-mail"></li>
          <li><input type="password" name="user_password" placeholder="mot de passe"></li>
          <li><input type="submit" value="valider"></li>
        </ul>
      </form></li>


  <?php
      } /*ATTENTION : fin du if précédent*/
      echo"</ul>";
    echo"</nav>"; /*ATTENTION : fin du nav précédent*/

    //////////////////////////////////
    //création du menu
    //////////////////////////////////
    echo"<nav class=\"menu\">";
      echo"<ul>";
        echo"<li><a href=\"../controler/afficherArticles.ctrl.php\">accueil</a></li>";
        //affichage des catégories
        foreach ($listeCategorie as $key => $value) {
          if (sizeof($value)>1){
            $catPere = $value[0]->nom;
            $numCat = $value[0]->id;
            echo"<li><a href=\"../controler/afficherArticles.ctrl.php?cat=$numCat\">$catPere</a>";
            //affichage des sous-catégories
            echo"<ul>";
              for ($i = 1; $i<sizeof($value); $i++){
                $sousCat = $value[$i]->nom;
                $numSousCat = $value[$i]->id;
                echo"<li><a href=\"../controler/afficherArticles.ctrl.php?cat=$numSousCat\">$sousCat</a></li>";
              }
            echo"</ul>";
            echo"</li>";
          }else{
            $catPere = $value[0]->nom;
            $numCat = $value[0]->id;
            echo"<li><a href=\"../controler/afficherArticles.ctrl.php?cat=$numCat\">$catPere</a></li>";
          }
        }
      echo"</ul>";
    echo"</nav>";
  ?>

  <?php
      //affiche les boutons précédent/suivant
      //si le controler à verfier que c'était possible d'effectuer ces actions
      echo '<section>';
        if ($okPrec){
          $refFirst = $articles[0]->ref;
          echo "<a href=\"../controler/afficherArticles.ctrl.php?pred=1&cat=$cat&ref=$refFirst\"><img src=\"design/home.png\" alt=\"Précédents\"></a>";
        }
        if ($okNext){
          $refEnd = end($articles)->ref;
          echo "<a href=\"../controler/afficherArticles.ctrl.php?next=1&cat=$cat&ref=$refEnd\"><img src=\"design/right-arrow.png\" alt=\"Suivants\"></a>";
        }
      echo '</section>';
  ?>

  <?php
    //////////////////////////////////
    //affichage des articles
    //////////////////////////////////
      echo '<section>';
      $PATH = '../view/imgArticles/';
      foreach ($articles as $key => $article) {
        $img = $PATH.$article->image;
        echo '<a href="./articleDetaille.view.php?art=$article->libelle">';
        echo '<article>';
          echo "<p>$article->libelle</p>";
          echo "<p><img src='$img' /></p>";
          echo "<p>$article->prix</p>";
          if ($userConnected){
            echo"<a href=\"../controler/afficherArticles.ctrl.php?refArticle=$article->ref\"><input type=\"submit\" value=\"Ajouter\"></a>";
          }

        echo '</article>';
        echo '</a>';
      }
      echo '</section>';

  ?>

<footer>
</footer>
</body>
</html>
