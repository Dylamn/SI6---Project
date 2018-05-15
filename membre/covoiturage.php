<html>

<head>
    <!-- titre de la page -->
    <title>BDE DLS Covoiturages</title>
    <!-- type d'encodage de la page -->
    <meta charset="utf-8"/>
    <!-- taille et échelle de la page -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- liens avec les fichiers css de bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/temp.css">
    <!-- par défaut les tableaux occupent 100% de la page; le width fixe la largeur à 600 pixels -->
</head>

<body>
<?php
// affichage de la liste des covoiturages
require_once("../include/_inc_parametres.php");
require_once("../include/_inc_connexion.php");
require_once("../include/dateFrancais.php");
require_once('../include/head.php');
require_once('../include/menu.php');

//	on récupère toutes les lignes
$ad_waiting = $cnx->query("SELECT * FROM nbAnnonces_en_attente;");
//les résultats sont récupérés sous forme d'objet
$ad_waiting->setFetchMode(PDO::FETCH_OBJ);
$nombre = $ad_waiting->fetch();
?>
<div class="container">
    <nav class="navbar-covoit">
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu">
                <a href="covoiturage.php">
                    <span class="item-brand glyphicon glyphicon-th-list"></span> Liste des covoiturages
                </a>
            </button>
        </span>
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu" data-toggle="collapse" data-target="#itineraire">
                <span class="glyphicon glyphicon-transfer"></span> Itinéraire
            </button>
        </span>
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu">
                <a href="AjoutCovoiturage.php">
                    <span class="item-brand glyphicon glyphicon-calendar"></span> Proposer un trajet
                </a>
            </button>
        </span>
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu">
                <a href="MesCovoiturages.php">
                <span class = "item-brand glyphicon glyphicon-road" ></span> Mes trajets
                </a>
            </button>
        </span>
    </nav>
    <div class="collapse" id="itineraire">
        <form class="form-group text-center" method="get" action="searchCovoits.php">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <label for="depart">Départ</label>
                    <input type="text" class="form-control" id="depart" name="d" required>
                </div>
                <div class="col-md-3">
                    <label for="destination" >Destination</label>
                    <input type="text" class="form-control" id="destination" name="a" required>
                </div>
                <div class="col-md-3">
                    <span class="glyphicon glyphicon-calendar"></span>
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required
                           min="<?= date("Y-m-d")?>">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <h1>
        Liste des covoiturages
        <svg height="10" width="100%">
            <line x1="0%" y1="10" x2="100%" y2="10" style="stroke:#6399cd; stroke-width:4px"/>
        </svg>
    </h1>
    <?php if ($_SESSION['privilege'] == "admin") {
        if ($nombre->annonces > 0) { ?>
            <h3 class=" text-center">À confirmer
                <div id="parent-pulse" class="glyphicon glyphicon-exclamation-sign">
                    <div class="btn-pulse"></div>
                </div>
            </h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Conducteur</td>
                        <td>Départ</td>
                        <td>Destination</td>
                        <td>Date départ</td>
                        <td>Heure départ</td>
                        <td>Voir en détail</td>
                    </tr>
                    </thead>
                    <?php
                    $resultat = $cnx->query("SELECT covoiturage.*, nom, prenom FROM covoiturage, membre 
										 WHERE covoiturage.numMembre = membre.numMembre AND etat = 0 ORDER BY dateDepot DESC;");
                    $resultat->setFetchMode(PDO::FETCH_OBJ);

                    while ($covoit = $resultat->fetch()) { ?>
                        <tr class="danger">
                            <td>
                                <?= utf8_encode($covoit->prenom) . "  " . substr($covoit->nom, 0, 1); ?>
                            </td>
                            <td>
                                <?= utf8_encode($covoit->villeDepart); ?>
                            </td>
                            <td>
                                <?= utf8_encode($covoit->villeArrive); ?>
                            </td>
                            <td>
                                <?= dateFrancais($covoit->jourDepart); ?>
                            </td>
                            <td>
                                <?= $covoit->heureDepart; ?>
                            </td>
                            <td>
                                <a href='detailCovoit.php?id=<?= $covoit->numCo; ?>'
                                   class="glyphicon glyphicon-new-window"> En savoir plus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    $resultat->closeCursor(); ?>
                </table>
            </div>    <!-- Fin de la table des covoiturages en attentes -->
            <?php
        } else {
            echo '<h3 class=" text-center">Aucune demande à confirmer</h3>';
        }
        $ad_confirm = $cnx->query("SELECT COUNT(*) AS annonces_confirmes FROM covoiturage WHERE etat = 1;");
        $ad_confirm->setFetchMode(PDO::FETCH_OBJ);
        $nombre = $ad_confirm->fetch();

        if ($nombre->annonces_confirmes > 0) { ?>
            <h3 class=" text-center text-center">
                <svg height="5" width="100%">
                    <line x1="5%" y1="0" x2="95%" y2="0" style="stroke:#A4A4A4;stroke-width:4px"/>
                </svg>
                <br/>
                <br/> Confirmées
                <span style="color:green" class="glyphicon glyphicon-ok"></span>
            </h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Conducteur</td>
                        <td>Départ</td>
                        <td>Destination</td>
                        <td>Date départ</td>
                        <td>Heure départ</td>
                        <td>Voir en détail</td>
                    </tr>
                    </thead>
                    <?php
                    $resultat = $cnx->query("SELECT covoiturage.*, nom, prenom FROM covoiturage, membre 
					WHERE covoiturage.numMembre = membre.numMembre AND etat = 1 ORDER BY dateDepot DESC;");
                    $resultat->setFetchMode(PDO::FETCH_OBJ);

                    while ($covoit = $resultat->fetch()) { ?>
                        <tr>
                            <td>
                                <?= utf8_encode($covoit->prenom) . "  " . substr($covoit->nom, 0, 1); ?>
                            </td>
                            <td>
                                <?= utf8_encode($covoit->villeDepart); ?>
                            </td>
                            <td>
                                <?= utf8_encode($covoit->villeArrive); ?>
                            </td>
                            <td>
                                <?= dateFrancais($covoit->jourDepart); ?>
                            </td>
                            <td>
                                <?= $covoit->heureDepart; ?>
                            </td>
                            <td>
                                <a href='detailCovoit.php?id=<?= $covoit->numCo; ?>'
                                   class="glyphicon glyphicon-new-window"> En savoir plus</a>
                            </td>
                        </tr>
                        <?php
                    } ?>
                </table>
            </div>
            <?php
        } else {
            echo '<svg height="5" width="100%">';
            echo '	<line x1="5%" y1="0" x2="95%" y2="0" style="stroke:#A4A4A4;stroke-width:4px" />';
            echo '</svg>';
            echo '<h3 class=" text-center">Aucun covoiturages actifs</h3>';
        }
    } ?>
</div>
<?php
if ($_SESSION['privilege'] == "eleve")
{ ?>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Conducteur</td>
            <td>Départ</td>
            <td>Destination</td>
            <td>Date départ</td>
            <td>Heure départ</td>
            <td>En savoir plus</td>
        </tr>
        </thead>
        <?php
        $resultat = $cnx->query("SELECT covoiturage.*, nom, prenom FROM covoiturage, membre 
										 WHERE covoiturage.numMembre = membre.numMembre AND etat = 1 ORDER BY dateDepot DESC;");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while ($covoit = $resultat->fetch()) { ?>
            <tr>
                <td>
                    <?= utf8_encode($covoit->prenom) . "  " . substr($covoit->nom, 0, 1); ?>
                </td>
                <td>
                    <?= utf8_encode($covoit->villeDepart); ?>
                </td>
                <td>
                    <?= utf8_encode($covoit->villeArrive); ?>
                </td>
                <td>
                    <?= dateFrancais($covoit->jourDepart); ?>
                </td>
                <td>
                    <?= $covoit->heureDepart; ?>
                </td>
                <td>
                    <a href='detailCovoit.php?id=<?= $covoit->numCo; ?>' class="glyphicon glyphicon-new-window"> En
                        savoir plus</a>
                </td>
            </tr>
            <?php
        }
        } ?>
    </table>
</div>
<?php include('../include/footer.php'); ?>

<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
<!-- Intégration de la libraire jQuery -->
<script src="../bootstrap/js/jquery.js"></script>
</body>

</html>