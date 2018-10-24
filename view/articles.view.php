<html>
<head>
  <title>Bricomachin</title>
  <meta charset="UTF-8"/>
  <style media='screen'>
    section{
      display: flex;
      margin: 40px;
      flex-wrap: wrap;
    }
    div{
      display: flex;
      flex-direction: column;
      width: 200px;
      height: 200px;
    }
    div img{
      width: 100px;
      height: 100px;
    }
  </style>
  <meta http-equiv="content-type" content="text/html;" />
  <meta name="author" content="Jean-Pierre Chevallet" />
  <link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>

<body>
  <header>
    <h1>WarFly, ça dépote </h1>
    <p><img src="../view/design/pub.png"/></p>
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
      <li><a href="index.html">Cat1</a></li>
      <li><a href="index.html">Cat2</a></li>
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
