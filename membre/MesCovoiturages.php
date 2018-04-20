<html>
<head>
    <!-- titre de la page -->
    <title>BDE DLS - Mes covoiturages</title>
    <!-- type d'encodage de la page -->
    <meta charset="utf-8"/>
    <!-- taille et échelle de la page -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <!-- liens avec les fichiers css de bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<div id=conteneur class="boite">
    <div id=contenu>
        <nav class="navbar-covoit">
            <span class="navbar-covoit-item">
                <a href='MesCovoiturages.php' class = "menu">
                    <span class = "item-brand glyphicon glyphicon-road" ></span>  <span>Mes trajets</span> 
                </a>
            </span>
            <span class="navbar-covoit-item">
                <a href='AjoutCovoiturage.php' class = "menu">
                    <span class = "item-brand glyphicon glyphicon-calendar" ></span>  Proposer un trajet 
                </a>
            </span>
            <span class="navbar-covoit-item">
                <a href='RechercheCovoiturage.php' class = "menu">
                    <span class = "item-brand glyphicon glyphicon-transfer" ></span>  Itinéraire 
                </a>
            </span>
            <span class="navbar-covoit-item ">
                <a href='covoiturage.php' class = "menu">
                    <span class = "item-brand glyphicon glyphicon-th-list" ></span>  Liste des covoiturages 
                </a>
            </span>
        </nav>
        <?php
        if (isset ($_GET['action']))
        {
            if ($_GET['action'] == 'modifier') // sur clic du bouton pour modifier un covoiturage sélectionné
            {
                include("../include/_inc_parametres.php");
                include("../include/_inc_connexion.php");
                include("../include/dateFrancais.php");
                include('../include/head.php');
                include('../include/menu.php');

                // préparation de la requête : recherche d'un covoiturage particulier
                $req_pre = $cnx->prepare("SELECT * FROM covoiturage WHERE numCo = :id");
                // liaison de la variable à la requête préparée
                $req_pre->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $req_pre->execute();
                //le résultat est récupéré sous forme d'objet
                $covoiturage = $req_pre->fetch(PDO::FETCH_OBJ);
                ?>

                <h2>Covoiturage</h2>
                <p>Sur cette page, vous pouvez modifier un covoiturage existant.</p>

                <form method="post" action="MesCovoiturages_action.php?action=modifier">
                <!-- numéro du covoiturage sélectionné caché -->
                <input type="hidden" name="numCo" value="<?php echo $covoiturage->numCo; ?>"/>
                <table class="table table-striped">
                    <tr>
                        <td>Prix :</td>
                        <td><input type='text' name='prix' value='<?php echo utf8_encode($covoiturage->prix); ?>'/></td>
                    </tr>
                    <tr>
                        <td>Description :</td>
                        <td><textarea cols="60" name='description'
                                      value='<?php echo utf8_encode($covoiturage->description); ?>'></textarea>
                    </tr>
                    <tr>
                        <td>Ville de départ :</td>
                        <td><input type='text' name='villeDepart'
                                   value='<?php echo utf8_encode($covoiturage->villeDepart); ?>'></td>
                    </tr>
                    <tr>
                        <td>Ville d'arrivé :</td>
                        <td><input type='text' name='villeArrive'
                                   value='<?php echo utf8_encode($covoiturage->villeArrive); ?>'></td>
                    </tr>
                    <tr>
                        <td>Point de départ :</td>
                        <td><input type='text' name='pointDepart'
                                   value='<?php echo utf8_encode($covoiturage->pointDepart); ?>'></td>
                    </tr>
                    <tr>
                        <td>Point d'arrivé :</td>
                        <td><input type='text' name='pointArrive'
                                   value='<?php echo utf8_encode($covoiturage->pointArrive); ?>'></td>
                    </tr>
                    <tr>
                        <td>Heure de départ :</td>
                        <td><input type='time' name='heureDepart'
                                   value='<?php echo utf8_encode($covoiturage->heureDepart); ?>'></td>
                    </tr>
                    <tr>
                        <td>Heure d'arrivé :</td>
                        <td><input type='time' name='heureArrive'
                                   value='<?php echo utf8_encode($covoiturage->heureArrive); ?>'></td>
                    </tr>
                    <tr>
                        <td>Jour de départ :</td>
                        <td><input type='date' name='jourDepart'
                                   value='<?php echo utf8_encode($covoiturage->jourDepart); ?>'></td>
                    </tr>

                    <tr>
                        <td>Jour d'arrivé :</td>
                        <td><input type='date' name='jourArrive'
                                   value='<?php echo utf8_encode($covoiturage->jourArrive); ?>'></td>
                    </tr>
                    <tr>
                        <td>Nombre de places :</td>
                        <td><input type='number' name='nbPlaces'
                                   value='<?php echo utf8_encode($covoiturage->nbPlaces); ?>'></td>
                    </tr>
                    <tr>
                        <td>Place pour les bagages :</td>
                        <td><input type='text' name='placeBagage'
                                   value='<?php echo utf8_encode($covoiturage->placeBagage); ?>'></td>
                    </tr>
                    <tr>
                        <td>Type de voiture :</td>
                        <td><input type='text' name='voiture' value='<?php echo utf8_encode($covoiturage->voiture); ?>'>
                        </td>
                    </tr>
                    <tr>
                        <td>Couleur de la voiture :</td>
                        <td><input type='text' name='couleur' value='<?php echo utf8_encode($covoiturage->couleur); ?>'>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' value='Modifier'/></td>
                    </tr>
                </table>
                </form><?php
            }
            if ($_GET['action'] == 'nouveau') // sur clic du lien ajouter un covoiturage
            {
                include("../include/_inc_parametres.php");
                include("../include/_inc_connexion.php");
                include("../include/dateFrancais.php");
                include('../include/head.php');
                include('../include/menu.php');
                ?>
                <h2>Covoiturage</h2>
                <p>Sur cette page, vous pouvez ajouter un covoiturage.</p>

                <form method="post" action="MesCovoiturages_action.php?action=nouveau">
                <input type="hidden" name="numMembre" value="<?php echo $_SESSION['numMembre']; ?>"/>
                <table class="table table-striped">
                    <tr>
                        <td>Prix :*</td>
                        <td><input type='text' name='prix' required></td>
                    </tr>
                    <tr>
                        <td>Description :</td>
                        <td><textarea cols="60" name='description'></textarea>
                    </tr>
                    <tr>
                        <td>Ville de départ :*</td>
                        <td><input type='text' name='villeDepart' required></td>
                    </tr>
                    <tr>
                        <td>Ville d'arrivé :*</td>
                        <td><input type='text' name='villeArrive' required></td>
                    </tr>
                    <tr>
                        <td>Point de départ :*</td>
                        <td><input type='text' name='pointDepart' required></td>
                    </tr>
                    <tr>
                        <td>Point d'arrivé :*</td>
                        <td><input type='text' name='pointArrive' required></td>
                    </tr>
                    <tr>
                        <td>Heure de départ :*</td>
                        <td><input type='time' name='heureDepart' required></td>
                    </tr>
                    <tr>
                        <td>Heure d'arrivé :*</td>
                        <td><input type='time' name='heureArrive' required></td>
                    </tr>
                    <tr>
                        <td>Jour de départ :*</td>
                        <td><input type='date' name='jourDepart' required></td>
                    </tr>

                    <tr>
                        <td>Jour d'arrivé :*</td>
                        <td><input type='date' name='jourArrive' required></td>
                    </tr>
                    <tr>
                        <td>Nombre de places :*</td>
                        <td><input type='number' name='nbPlaces' required></td>
                    </tr>
                    <tr>
                        <td>Place pour les bagages :*</td>
                        <td><input type='text' name='placeBagage' required></td>
                    </tr>
                    <tr>
                        <td>Type de voiture :</td>
                        <td><input type='text' name='voiture'></td>
                    </tr>
                    <tr>
                        <td>Couleur de la voiture :</td>
                        <td><input type='text' name='couleur'></td>
                    </tr>


                    <tr>
                        <td></td>
                        <td><input type='submit' value='Ajouter'/></td>
                    </tr>
                </table>
                </form><?php
            }
        }
        else
        {
        // affichage de la liste des covoiturages
        include("../include/_inc_parametres.php");
        include("../include/_inc_connexion.php");
        include("../include/dateFrancais.php");
        include('../include/head.php');
        include('../include/menu.php');

        //	on récupère toutes les lignes
        $resultat = $cnx->query("select covoiturage.* FROM covoiturage, membre 
			WHERE membre.numMembre = " . $_SESSION['numMembre'] . " AND covoiturage.numMembre = membre.numMembre ORDER BY dateDepot DESC;");

        //le résultat est récupéré sous forme d'objet
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        ?>
        <h2>Liste de mes covoiturages</h2>
        <a href="MesCovoiturages.php?action=nouveau">Ajouter un covoiturage</a>

        <table class="table table-striped">
            <thead>
            <tr class="success">
                <td>Départ</td>
                <td>Destination</td>
                <td>Date départ</td>
                <td>Heure départ</td>
                <td>En savoir plus</td>
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
            </thead>

            <?php
            $covoit = $resultat->fetch();
            while ($covoit) { ?>
                <tr>
                    <td><?php echo utf8_encode($covoit->villeDepart); ?> </td>
                    <td><?php echo utf8_encode($covoit->villeArrive); ?> </td>
                    <td><?php echo dateFrancais($covoit->jourDepart); ?> </td>
                    <td><?php echo $covoit->heureDepart; ?> </td>
                    <td><a href='detailCovoit.php?id=<?php echo $covoit->numCo; ?>'
                           class="glyphicon glyphicon-new-window"> Voir en détail</a></td>
                    <td><a href='MesCovoiturages.php?action=modifier&id=<?php echo $covoit->numCo; ?>'
                           class="glyphicon glyphicon-pencil"></a></td>
                    <td><a href='MesCovoiturages_action.php?action=supprimer&id=<?php echo $covoit->numCo; ?>'
                           class="glyphicon glyphicon-remove"></a></td>
                </tr>
                <?php
                // lecture du covoiturage suivant
                $covoit = $resultat->fetch();
            }
            } ?>
        </table>

    </div>
</div>
<?php include('../include/footer.php'); ?>
<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
<!-- Intégration de la libraire jQuery -->
<script src="bootstrap/js/jquery.js"></script>
<!-- Intégration de la libraire de composants du Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>