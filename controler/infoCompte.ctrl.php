 <?php
  $currentUser = $dao->getUser($_GET[$_SESSION['mail']]);

  include('../view/infoCompte.view.php');
 ?>
