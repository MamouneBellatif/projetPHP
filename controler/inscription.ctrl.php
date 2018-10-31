<?php
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
        $_SESSION['panier'] = array();
        //$ajouter = true;

        header('Location: main.ctrl.php');
      }
    }
  }
  include("../view/inscription.view.php");

?>
