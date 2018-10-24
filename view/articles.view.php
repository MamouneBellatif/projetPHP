<html>
<head>
  <title>La Moucherie</title>
  <meta charset="UTF-8"/>
  <meta http-equiv="content-type" content="text/html;" />
  <meta name="author" content="Jean-Pierre Chevallet" />
  <link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>

<body class="bridge">
  <header>
    <h1>La Moucherie</h1>
    <form class="formulaire" action="index.html" method="post">
      <input class="champ" type="text" placeholder="Recherche"/>
      <input class="bouton" type="button" value=" " />
    </form>

  </header>

  <nav id="menu">
    <ul>
      <li><a href="afficherArticles.ctrl.php">ACCUEIL</a></li>
      <li><a href="afficherArticles.ctrl.php">COMBAT</a>
        <ul>
            <li><a href="afficherArticles.ctrl.php">Soutiens</a></li>
            <li><a href="afficherArticles.ctrl.php">Dégats</a></li>
            <li><a href="afficherArticles.ctrl.php">Tank</a></li>
        </ul>
      </li>
      <li><a href="afficherArticles.ctrl.php">COMPAGNIE</a></li>
      <li><a href="afficherArticles.ctrl.php">ASSISTANCE</a></li>
      <li><a href="afficherArticles.ctrl.php">ELEVAGE</a></li>
    </ul>
  </nav>

    <?php
    echo '<section>';
    $PATH = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/bricomachin/img/';
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
