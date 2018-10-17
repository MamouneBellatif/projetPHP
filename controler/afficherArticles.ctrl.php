<?php
    // Partie principale

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    ///////////////////////////////////////////////////////
    //  A COMPLETER
    ///////////////////////////////////////////////


    ///////////////////////////////////////////////

    // Article suivant
    $nextRef = $dao->next(end($articles)->ref);

    // Les articles précédents
    $prev = $dao->prevN($articles[0]->ref,12);

    // Charge la vue
    include("../view/articles.view.php")
    ?>
