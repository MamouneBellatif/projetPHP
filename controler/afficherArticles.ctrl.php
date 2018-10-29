<?php
  // Inclusion du modèle
  include_once("../model/DAO.class.php");

  //on démarre une session
  session_start();

  //si pas "inscription" afficher les articles
  //sinon redirection vers la vue d'Inscription
  if (!(isset($_GET['inscription']))) {

      //on vérifie si l'utilisateur veut se déconnecter
      //si oui on supprime la session
      if (isset($_GET['deconnexion'])){
        session_destroy();
      }

      //on vérifie si l'utilisateur est connecté (connecter sur la variable globale $_SESSION  possède un mail )
      //$userConnected permet à la vue d'afficher ou non les boutons inscription/connxion ou l'utlisateur courant
      if ( isset($_SESSION['mail']) ){
        $userConnected = true;
      }else{
        $userConnected = false;
      }

      //si l'utilisateur souhaite se connecter
      //on le connecte et l'ajoute à la session pour qu'il puisse le rester
      if ( isset($_GET['user_mail']) && isset($_GET['user_password'])){
        if ($dao->verifUser($_GET['user_mail'], $_GET["user_password"]) == 1){
          $_SESSION['mail'] = $_GET['user_mail'];
          $userConnected = true;
        }else{
          $userConnected = false;
        }
      }

      //pour identifier la catégorie en train d'être visité
      // rien ou 0 signifie qu'on est sur la page d'accueil
      if (isset($_GET['cat']))
        $cat = $_GET['cat'];
      else
        $cat = 0;

      $nbArticle = $dao->getNbArticle($cat);

      //si une référence est présente en $_GET
      //alors on regarde si l'utilisateur veut voir les articles suivant ou précédent
      //sinon on lui affiche les premiers articles de la catégorie défini précédemment
      if (isset($_GET['ref'])){
        $ref = $_GET['ref'];
        if (isset($_GET['pred'])){
          $articles = $dao->prec($ref, $cat);
        }elseif (isset($_GET['next'])){
          $articles = $dao->next($ref, $cat);
        }
      }else{
        $articles = $dao-> firstN($cat);
      }

      //permet à la vue de savoir si l'utilisateur doit pouvoir choisir de voir
      //les articles précédents ou suivant les articles courants
      $prec = $dao->prec($articles[0]->ref, $cat);
      $okPrec = (sizeof($prec)>0) ? true : false;
      $next = $dao->next(end($articles)->ref, $cat);
      $okNext = (sizeof($next)>0) ? true : false;

      //liste de toutes les catégories
      $listeCategorie = $dao->getAllCat();


      // Charge la vue
      include("../view/articles.view.php");

  } else {
    //permet à la vue inscription de savoir si l'utlisateur a été ajouter avec succés
    $ajouter = false;

    //permet à la vue inscription de savoir si l'utlisateur a déjà tenter une inscription et c'est trompé
    //ainsi il si false alors la vue doit afficher les conseilles/erreurs potentielles
    $first = true;

    //pour différencier les erreurs liées au MDP ou mail
    $badMail = false;
    $goodPw = true;

    //on vérifie que l'utilisateur a bien rentré tous les champs
    if ( isset($_GET["inscription"]) && isset($_GET["password"]) && isset($_GET["passwordConfirm"]) ){

      $first = false;

      //on vérifie que l'adresse mail soit bonne
      //0 si disponible
      $badMail = $dao->verifMail($_GET["inscription"]);
      if (!$badMail){
        //on vérifie que le MDP et le MDP de confirmation soit le même
        //assure à l'utilisateur de ne pas avoir fait une faute de frappe
        $goodPw = ( ($_GET["password"]) == ($_GET["passwordConfirm"]) );
        if ($goodPw){
          //on peut rajouter un hashage du MDP pour la sécurité avec password_hash()
          $dao->addUser($_GET["inscription"], $_GET["passwordConfirm"]);
          //ajout du mail de session pour qu'il reste connecter durant toute la navigation sur le site
          $_SESSION['mail'] = $_GET["inscription"];

          $ajouter = true;
        }
      }
    }
    include("../view/inscription.view.php");

  }
?>
