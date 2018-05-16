<?php
require_once('../include/_inc_parametres.php');
require_once('../include/_inc_connexion.php');
require_once('../include/Outils.php');

if (isset($_POST['validate']) == true) {
    $req = $cnx->query("SELECT email FROM membre 
                      WHERE membre.numMembre = (SELECT numMembre FROM covoiturage WHERE numCo = " . $_POST['idCovoit'] .")");
    $data = $req->fetch();
    $email = $data['email'];

    $req = $cnx->query("UPDATE covoiturage SET etat = 1 WHERE numCo = " . $_POST['idCovoit']);

    $objet = "Validation - Covoiturage";
    $message = "Bonjour, votre annonce de covoiturage postée sur le site du BDE à été validé.\n\nCordialement,\nM. Guérin";

    Outils::envoyerMail($email, $objet, $message, 'delasalle.sio.vallee.d@gmail.com');
    header('location: covoiturage.php');
} else {
    $req = $cnx->query("SELECT email FROM membre 
                      WHERE membre.numMembre = (SELECT numMembre FROM covoiturage WHERE numCo = " . $_POST['idCovoit']);
    $data = $req->fetch();
    $email = $data['email'];

    $req = $cnx->query("DELETE * FROM covoiturage WHERE numCo = " . $_POST['idCovoit']);

    $objet = "Refus - Covoiturage";
    $message = "Bonjour, votre annonce à été refusée car ses critères ne sont pas en corrélation avec ceux attendus. 
    Cordialement. M. Guérin";

    Outils::envoyerMail($email, $objet, $message, $_SESSION['email'] );
    header('location: covoiturage.php');
}