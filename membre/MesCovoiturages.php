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
    <link rel="stylesheet" href="../styles/temp.css">
</head>
<body>
<?php
    require_once("../include/_inc_parametres.php");
    require_once("../include/_inc_connexion.php");
    require_once("../include/dateFrancais.php");
    require_once('../include/head.php');
    require_once('../include/menu.php');
?>
<div class="container">
    <?php if (empty($_GET['action']) == true)
    { ?>
        <nav class="navbar-covoit">
            <span class="navbar-covoit-item">
                <a href='covoiturage.php'>
                    <span class = "item-brand glyphicon glyphicon-th-list" ></span> Liste des covoiturages 
                </a>
            </span>
            <span class="navbar-covoit-item">
                <a href='RechercheCovoiturage.php'>
                    <span class = "item-brand glyphicon glyphicon-transfer" ></span> Itinéraire 
                </a>
            </span>
            <span class="navbar-covoit-item">
                <a href='AjoutCovoiturage.php'>
                    <span class = "item-brand glyphicon glyphicon-calendar" ></span> Proposer un trajet 
                </a>
            </span>
            <span class="navbar-covoit-item">
                <a href='MesCovoiturages.php'>
                    <span class = "item-brand glyphicon glyphicon-road" ></span> Mes trajets
                </a>
            </span>
        </nav>
        <?php
    } ?>
    <h1>
    <?php if (empty($_GET['action']) == true) {
        echo 'Mes covoiturages';
    } else {
        echo 'Mon covoiturage';
    } ?>
        <svg height="10" width="100%">
            <line x1="0%" y1="10" x2="100%" y2="10" style="stroke:#6399cd; stroke-width:4"/>
        </svg>
    </h1>
    <?php
    if (isset ($_GET['action']))
    {
        if ($_GET['action'] == 'modifier') // sur clic du bouton pour modifier un covoiturage sélectionné
        {
            // préparation de la requête : recherche d'un covoiturage particulier
            $req_pre = $cnx->prepare("SELECT * FROM covoiturage WHERE numCo = :id");
            // liaison de la variable à la requête préparée
            $req_pre->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
            $req_pre->execute();
            //le résultat est récupéré sous forme d'objet
            $covoiturage = $req_pre->fetch(PDO::FETCH_OBJ);

            if ($_SESSION['numMembre'] == $covoiturage->numMembre)
            { ?>
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
                        <td><textarea cols="60" name='description'><?php echo utf8_encode($covoiturage->description); ?></textarea>
                    </tr>
                    <tr>
                        <td>Ville de départ :</td>
                        <td><input type='text' name='villeDepart'
                                    value='<?php echo utf8_encode($covoiturage->villeDepart); ?>'></td>
                    </tr>
                    <tr>
                        <td>Ville d'arrivé :</td>
                        <td><input type='text' name='villeArrive'
                                    value='<?php echo utf8_decode($covoiturage->villeArrive); ?>'></td>
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
                        <td><input type='submit' value='Modifier' class="btn btn-success"/></td>
                    </tr>
                </table>
                </form>
            <?php
            }
            else
            {
                echo '<center><h1>Le covoiturage correspondant ne vous appartient pas.</h1></center>';
            }
        }
    }
    else
    {
    // affichage de la liste des covoiturages
    //	on récupère toutes les lignes
    $resultat = $cnx->query("select covoiturage.* FROM covoiturage, membre 
        WHERE membre.numMembre = " . $_SESSION['numMembre'] . " AND covoiturage.numMembre = membre.numMembre ORDER BY dateDepot DESC;");

    //le résultat est récupéré sous forme d'objet
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    ?>
    <a href="MesCovoiturages.php?action=nouveau">Ajouter un covoiturage</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Départ</td>
                    <td>Destination</td>
                    <td>Date départ</td>
                    <td>Heure départ</td>
                    <td>Voir en détail</td>
                    <td>Modifier</td>
                    <td>Supprimer</td>
                </tr>
            </thead>
            <?php
            while ($covoit = $resultat->fetch()) 
            { ?>
                <tr>
                    <td><?php echo utf8_encode($covoit->villeDepart); ?> </td>
                    <td><?php echo utf8_encode($covoit->villeArrive); ?> </td>
                    <td><?php echo dateFrancais($covoit->jourDepart); ?> </td>
                    <td><?php echo $covoit->heureDepart; ?> </td>
                    <td><a href='detailCovoit.php?id=<?php echo $covoit->numCo; ?>'
                            class="glyphicon glyphicon-new-window"> En savoir plus</a></td>
                    <td><a href='MesCovoiturages.php?action=modifier&amp;id=<?php echo $covoit->numCo; ?>'
                            class="glyphicon glyphicon-pencil"></a></td>
                    <td><a href='MesCovoiturages_action.php?action=supprimer&amp;id=<?php echo $covoit->numCo; ?>'
                            class="glyphicon glyphicon-remove"></a></td>
                </tr>
                <?php
            }
        } ?>
        </table>
    </div>
</div>
<?php require_once('../include/footer.php'); ?>
<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
<!-- Intégration de la libraire jQuery -->
<script src="bootstrap/js/jquery.js"></script>
<!-- Intégration de la libraire de composants du Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>