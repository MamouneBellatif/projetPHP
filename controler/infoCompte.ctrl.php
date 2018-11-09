 <?php


  if (isset($_GET['modifMail']) && isset($_GET['id'])){
    $badMail = $dao->verifMail($_GET["modifMail"]);
    if (!$badMail){
      $dao->modifEmail($_GET['modifMail'], $_GET['id']);
      if(!isset($_GET['mailCompte'])){
        $_SESSION['mail'] = $_GET['modifMail'];
      }
    }
  }else if(isset($_GET['modifNom']) && isset($_GET['id'])){
    $dao->modifNom($_GET['modifNom'], $_GET['id']);
  }else if(isset($_GET['modifPrenom']) && isset($_GET['id'])){
    $dao->modifPrenom($_GET['modifPrenom'], $_GET['id']);
  }else if(isset($_GET['modifMdp']) && isset($_GET['id'])){
    $dao->modifMdp($_GET['modifMdp'], $_GET['id']);
  }

  if(isset($_GET['modif'])){
    if ($_GET['modif']=='mail'){
      $modification = $_GET['modif'];
    }else if($_GET['modif']=='nom'){
      $modification = $_GET['modif'];
    }else if($_GET['modif']=='prenom'){
      $modification = $_GET['modif'];
    }else if($_GET['modif']=='statut'){
      $modification = $_GET['modif'];
    }else if($_GET['modif']=='mdp'){
      $modification = $_GET['modif'];
    }
  }

  if (isset($_GET['mailCompte'])){
    $user = $dao->getUser($_GET['mailCompte']);
    $autre = 1;
  }else{
    $currentUser = $dao->getUser($_SESSION['mail']);
    $autre = 0;
  }


  include('../view/infoCompte.view.php');
 ?>
