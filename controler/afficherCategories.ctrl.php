<?php
    // Controleur permettant d'afficher la liste des catégories

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    ///////////////////////////////////////////////////////////
    // A COMPLETER
    ///////////////////////////////////////////////////////////
    $listeCategorie = $dao->getAllCat();
    include_once("../view/categories.view.php");
    ?>
