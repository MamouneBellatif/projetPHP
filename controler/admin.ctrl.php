<?php

  $listeArticle = $dao->getAllArticle();
  $listeUser = $dao->getAlluSER();
  $listeAdmin = $dao->getAllAdmin();

  //ajout d'un utilisateur
  if (isset($_GET["mail"]) && isset($_GET["pass"]) && isset($_GET["name"]) && isset($_GET["prenom"]) && isset($_GET["statut"])){
    $dao->addUser($_GET["mail"], $_GET["pass"],$_GET["name"],$_GET["prenom"], $_GET["statut"]);
    header('Location: main.ctrl.php?admin=1');
  }
  //modif utilisateur
  if (isset($_GET['mailCompte'])){
    $mail = $_GET['mailCompte'];
    header("Location: main.ctrl.php?infocompte=1&mailCompte=$mail");
  }
  //suppression d'un utilisateur
  if ( isset($_GET['idSuppr']) ){
    $dao->removeUser($_GET['idSuppr']);
    header('Location: main.ctrl.php?admin=1');
  }

  //suppression d'un article
  if ( isset($_GET['refSuppr']) ){
    $dao->removeArticle($_GET['refSuppr']);
    header('Location: main.ctrl.php?admin=1');
  }

  //modif d'un Article
  if (isset($_GET["refA"])){
    $article = $dao->getArticle($_GET['refA']);
    header("Location: main.ctrl.php?cat=$article->categorie&refArticle=$article->ref");
  }

  //ajout d'un article
  if ( isset($_GET["libelle"]) && isset($_GET["description"]) && isset($_GET["prix"]) && isset($_GET["image"]) && isset($_GET["categorie"]) ){
    $dao->addArticle($_GET["libelle"], $_GET["description"], $_GET["categorie"], $_GET["prix"], $_GET["image"]);
    header('Location: main.ctrl.php?admin=1');
  }

include("../view/admin.view.php");
?>
