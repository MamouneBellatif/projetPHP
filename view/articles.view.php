<html>
<head>
  <title>Bricomachin</title>
  <meta charset="UTF-8"/>
  <meta http-equiv="content-type" content="text/html;" />
  <meta name="author" content="Jean-Pierre Chevallet" />
  <link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>

<body class="bridge">
  <header>
    <h1>La Moucherie</h1>
    <div class="head">
    </div>
  </header>
  <?php


  ///////////////////////////////////////////////////////
  //   A COMPLETER
  //////////////////////////////////////////////////////
  // Si une categorie est définie

  ?>

  <nav>
    <ul>
      <li><a href="index.html">Accueil</a></li>
      <li><a href="index.html">Combat</a></li>
      <li><a href="index.html">Compagnie</a></li>
      <li><a href="index.html">Assistance</a></li>
      <li><a href="index.html">Elevage</a></li>
    </ul>
  </nav>

  <?php
  ///////////////////////////////////////////////////////
  //  A COMPLETER
  ///////////////////////////////////////////////
  echo '<section>';
  $PATH = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/bricomachin/img/';
  foreach ($articles as $key => $article) {
    $img = $PATH.$article->image;
    echo '<div>';
      echo "$article->libelle";
      echo "<img src='$img' />";
      echo "$article->prix";
    echo '</div>';
  }
  echo '</section>';
  ?>
  <footer>
  </p>Site fictif, issus de données réelles du Web</p>
</footer>
</body>
</html>
