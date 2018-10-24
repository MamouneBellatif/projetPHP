<html>
<head>
<title>Bricomachin</title>
<meta charset="UTF-8"/>
<meta http-equiv="content-type" content="text/html;" />
<meta name="author" content="Jean-Pierre Chevallet" />
<link rel="stylesheet" type="text/css" href="../view/design/style.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
</head>

<body>
<header>
<h1>Bricomachin, le bricolage malin </h1>
<p><img src="../view/design/pub.png"/></p>
</header>
<?php
    /////////////////////////////////////////
    // A Completer pour afficher la liste des catégories
    /////////////////////////////////////////
    foreach ($listeCategorie as $id => $cat) {
      echo $cat->nom." | ";
    }
    ?>
<footer>
</p>Site fictif, issus de données réelles du Web</p>
</footer>
</body>
</html>
