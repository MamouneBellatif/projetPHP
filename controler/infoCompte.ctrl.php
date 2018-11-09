 <?php
 if (isset($_GET['refA'])){
   $article = $dao->getArticle($_GET['refA']);
   header("Location: main.ctrl.php?cat=$article->categorie&refArticle$article->ref");
 }

 if (isset($_GET['mailCompte'])){
   $autre = 1;
   $mailCompte = $_GET['mailCompte'];
 }else{
   $autre = 0;
 }

  if (isset($_GET['modifMail']) && isset($_GET['id'])){
    $badMail = $dao->verifMail($_GET["modifMail"]);
    if (!$badMail){
      $dao->modifEmail($_GET['modifMail'], $_GET['id']);
      if(!$autre){
        $_SESSION['mail'] = $_GET['modifMail'];
      }else{
        $mailCompte = $_GET['modifMail'];
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
    }else if($_GET['modif']=='mdp'){
      $modification = $_GET['modif'];
    }
  }

  if ($autre){
    $user = $dao->getUser($mailCompte);
  }else{
    $currentUser = $dao->getUser($_SESSION['mail']);
  }


  include('../view/infoCompte.view.php');
 ?>
