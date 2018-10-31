 <?php
  $currentUser = $dao->getUser($_SESSION['mail']);

  include('../view/infoCompte.view.php');
 ?>
