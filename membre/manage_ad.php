<?php
    require_once('../include/_inc_parametres.php');
    require_once('../include/_inc_connexion.php');

    if (isset($_POST['validate']) == true)
    {
        $req = $cnx->query("UPDATE covoiturage SET etat = 1 WHERE numCo = " . $_POST['idCovoit']);
        header('location: covoiturage.php');
    }
    else
    {
        $req = $cnx->query("DELETE * FROM covoiturage WHERE numCo = " . $_POST['idCovoit']);
        header('location: covoiturage.php');
    }