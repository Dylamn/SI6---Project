<?php
include("../include/_inc_parametres.php");
include("../include/_inc_connexion.php");
if (isset ($_GET['action'])) {
    if ($_GET['action'] == 'modifier') {
        // préparation de la requête : recherche d'un covoiturage particulier
        $req_pre = $cnx->prepare("UPDATE covoiturage SET etat=0, prix=:prix, 
		description=:description, villeDepart=:villeDepart, villeArrive=:villeArrive, pointDepart=:pointDepart, pointArrive=:pointArrive, 
		heureDepart=:heureDepart, heureArrive=:heureArrive, jourDepart=:jourDepart, jourArrive=:jourArrive, nbPlaces=:nbPlaces, 
		placeBagage=:placeBagage, voiture=:voiture, couleur=:couleur
		WHERE numCo= :id ");

        // liaison de la variable à la requête préparée
        $req_pre->bindValue(':id', $_POST['numCo'], PDO::PARAM_INT);
        $req_pre->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
        $req_pre->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $req_pre->bindValue(':villeDepart', $_POST['villeDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':villeArrive', $_POST['villeArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':pointDepart', $_POST['pointDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':pointArrive', $_POST['pointArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':heureDepart', $_POST['heureDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':heureArrive', $_POST['heureArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':jourDepart', $_POST['jourDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':jourArrive', $_POST['jourArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':nbPlaces', $_POST['nbPlaces'], PDO::PARAM_INT);
        $req_pre->bindValue(':placeBagage', $_POST['placeBagage'], PDO::PARAM_STR);
        $req_pre->bindValue(':voiture', $_POST['voiture'], PDO::PARAM_STR);
        $req_pre->bindValue(':couleur', $_POST['couleur'], PDO::PARAM_STR);
        $req_pre->execute();


        ?>
        <html>
        <head>
            <meta http-equiv="refresh" content="0 ; url=../membre/MesCovoiturages.php">
        </head>
        <body>
        </body>
        </html>
        <?php
    }
    if ($_GET['action'] == 'nouveau') {
        // recherche du dernier numéro de covoiturage


        // préparation de la requête : recherche d'un covoiturage particulier
        $req_pre = $cnx->prepare("INSERT INTO covoiturage (numMembre,dateDepot,etat,prix,description,villeDepart,villeArrive,pointDepart,pointArrive,
		heureDepart,heureArrive,jourDepart,jourArrive,nbPlaces,placeBagage,voiture,couleur) 
		VALUES (:numMembre,now(),0,:prix,:description,:villeDepart,:villeArrive,:pointDepart,:pointArrive,
		:heureDepart,:heureArrive,:jourDepart,:jourArrive,:nbPlaces,:placeBagage,:voiture,:couleur)");
        // liaison de la variable à la requête préparée
        $req_pre->bindValue(':numMembre', $_POST['numMembre'], PDO::PARAM_INT);
        $req_pre->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
        $req_pre->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $req_pre->bindValue(':villeDepart', $_POST['villeDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':villeArrive', $_POST['villeArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':pointDepart', $_POST['pointDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':pointArrive', $_POST['pointArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':heureDepart', $_POST['heureDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':heureArrive', $_POST['heureArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':jourDepart', $_POST['jourDepart'], PDO::PARAM_STR);
        $req_pre->bindValue(':jourArrive', $_POST['jourArrive'], PDO::PARAM_STR);
        $req_pre->bindValue(':nbPlaces', $_POST['nbPlaces'], PDO::PARAM_INT);
        $req_pre->bindValue(':placeBagage', $_POST['placeBagage'], PDO::PARAM_STR);
        $req_pre->bindValue(':voiture', $_POST['voiture'], PDO::PARAM_STR);
        $req_pre->bindValue(':couleur', $_POST['couleur'], PDO::PARAM_STR);
        $req_pre->execute();
        ?>
        <html>
        <head>
            <meta http-equiv="refresh" content="0 ; url=../membre/MesCovoiturages.php">
        </head>
        <body>
        </body>
        </html>
        <?php
    }
    if ($_GET['action'] == 'supprimer') {
        // préparation de la requête : recherche d'un covoiturage particulier
        $req_pre = $cnx->prepare("DELETE FROM covoiturage WHERE numCo = :id");
        // liaison de la variable à la requête préparée
        $req_pre->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $req_pre->execute();

        ?>
        <html>
        <head>
            <meta http-equiv="refresh" content="0 ; url=../membre/MesCovoiturages.php">
        </head>
        <body>
        </body>
        </html>
        <?php
    }
    if ($_GET['action'] == 'supprimerancien') {
        //$actuel = date();
        //$requete = "DELETE FROM covoiturage WHERE DateFin < '$actuel'";
        //mysql_query ($requete,$cnx) or die("erreur suppression anciens covoiturages");
        ?>
        <html>
        <head>
            <meta http-equiv="refresh" content="0 ; url=../membre/MesCovoiturages.php">
        </head>
        <body>
        </body>
        </html>
        <?php
    }
} else {
}