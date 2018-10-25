<html>
<head>
  <title>La Moucherie</title>
  <meta charset="UTF-8"/>
  <meta http-equiv="content-type" content="text/html;" />
  <meta name="author" content="BELLELATIFDECHEVEUX Mamoune, VACHIER Camille, BARRERSONNOM Dorian"/>
  <link rel="stylesheet" type="text/css" href="../view/design/style.css"
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

  <?php
    //création du menu
    echo"<nav>";
      echo"<ul>";
        echo"<li><a href=\"../controler/afficherArticles.ctrl.php\">accueil</a></li>";
        //affichage des catégories
        foreach ($listeCategorie as $key => $value) {
          if (sizeof($value)>1){
            $catPere = $value[0]->nom;
            echo"<li><a href=\"../controler/afficherArticles.ctrl.php\">$catPere</a>";
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
    echo '<section>';
    $PATH = '../view/imgArticles/';
    foreach ($articles as $key => $article) {
      $img = $PATH.$article->image;
      echo '<article>';
        echo "<p>$article->libelle</p>";
        echo "<p><img src='$img' /></p>";
        echo "<p>$article->prix</p>";
      echo '</article>';
    }
    echo '</section>';
    ?>

  <footer>
  </p>Site fictif, issus de données réelles du Web</p>
</footer>
</body>
</html>
