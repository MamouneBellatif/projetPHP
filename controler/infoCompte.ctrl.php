 <?php
  $currentUser = $dao->getUser($_GET[$_SESSION['mail']]);

  include('infoCompte.view.php');
 ?>
