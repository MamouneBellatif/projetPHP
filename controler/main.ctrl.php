<?php
include_once("../model/DAO.class.php");

session_start();

//on vérifie si l'utilisateur veut se déconnecter
//si oui on supprime la session
if (isset($_GET['deconnexion'])){
  session_destroy();
  header('Location: main.ctrl.php');
}

//on vérifie si l'utilisateur est connecté (alors la variable globale $_SESSION  possède un mail étant dans la base de données)
//$userConnected permet à la vue d'afficher ou non les boutons inscription/connxion ou l'utlisateur courant
if ( isset($_SESSION["mail"]) && $dao->verifMail($_SESSION["mail"]) ){
  $userConnected = true;
}else{
  $userConnected = false;
}

//si l'utilisateur souhaite se connecter
//on le connecte et l'ajoute à la session pour qu'il puisse le rester
if ( isset($_GET['user_mail']) && isset($_GET['user_password'])){
  if ($dao->verifUser($_GET['user_mail'], $_GET["user_password"]) == 1){
    $currentUser = $dao->getUser($_GET['user_mail']);
    $_SESSION['mail'] = $currentUser->mail;
    $_SESSION['statut'] = $currentUser->statut;
    $_SESSION['panier'] = array();
    $userConnected = true;
  }else{
    $userConnected = false;
  }
}

//liste de toutes les catégories
$listeCategorie = $dao->getAllCat();

if (isset($_GET['inscription'])){
  include('inscription.ctrl.php');
}else if(isset($_GET['admin'])){
  include('admin.ctrl.php');
}else if(isset($_GET['panier'])){
  include('panier.ctrl.php');
}else if(isset($_GET['infocompte'])){
  include('infoCompte.ctrl.php');
}else if(isset($_GET['refArticle'])){
  include('article.ctrl.php');
}else{
  include('articles.ctrl.php');
}

?>
