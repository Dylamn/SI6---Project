<html>
<head>
    <title>BDE DLS Covoiturages - Recherche</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=width-device, initial-scale:1.0"/>
    <!-- liens avec les fichiers css de bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/temp.css">
</head>
<body>
<?php
require_once('../include/_inc_parametres.php');
require_once('../include/_inc_connexion.php');
require_once("../include/dateFrancais.php");
require_once('../include/head.php');
require_once('../include/menu.php');
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
                <span class="item-brand glyphicon glyphicon-road"></span> Mes trajets
                </a>
            </button>
        </span>
    </nav>
    <?php
    // Checking if there are unassigned variable
    if (!empty($_GET["d"]) == true) {
        $departure = $_GET["d"];
    } else {
        $departure = null;
    }
    if (!empty($_GET["a"]) == true) {
        $arrival = $_GET["a"];
    } else {
        $arrival = null;
    }
    if (!empty($_GET["date"]) == true) {
        $date = $_GET["date"];
    } else {
        $date = null;
    }
    ?>
    <div class="collapse" id="itineraire">
        <form class="form-group text-center" method="get" action="searchCovoits.php">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <label for="depart">Départ</label>
                    <input type="text" class="form-control" id="depart" name="d" value="<?= $departure ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="destination" >Destination</label>
                    <input type="text" class="form-control" id="destination" name="a" value="<?= $arrival ?>" required>
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
    <?php
    // Transform strings into lowercase
    $departure = strtolower($departure);
    $arrival = strtolower($arrival);

    // Checking the formatting of strings (departure & arrival)
    if (preg_match("#^[a-z ]{1,}$#", $arrival) == true && preg_match("#^[a-z]{1,}#", $departure) == true) {
    $currentDate = date("Y-m-d"); // Get current date

    if ($date == $currentDate) {
        $timezone = +2; //(GMT +2:00) (Central European Summer Time (Paris, Belgique, ect...))
        $currentTime = gmdate("H:i", time() + 3600 * ($timezone + date("I")));

        $response = $cnx->prepare("SELECT covoiturage.*, prenom, nom FROM covoiturage, membre 
                                            WHERE jourDepart = ? AND etat = 1 AND villeDepart = ? AND villeArrive = ? 
                                            AND heureDepart >= HOUR(?) AND membre.numMembre = covoiturage.numCo");

        $response->execute(array($date, $departure, $arrival, $currentTime));
    } else {
        // Select all paths of the day selected
        $response = $cnx->prepare("SELECT covoiturage.*, prenom, nom FROM covoiturage, membre 
                                            WHERE jourDepart = ? AND etat = 1 AND villeDepart = ? AND villeArrive = ? 
                                            AND membre.numMembre = covoiturage.numCo");

        $response->execute(array($date, $departure, $arrival));
    }
    ?>
    <div class="table-responsive">
        <table id="confirm" class="table table-striped">
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
        while ($data = $response->fetch()) { ?>
            <tbody>
                <tr>
                    <td>
                        <?= utf8_encode($data['prenom']) . "  " . substr($data['nom'], 0, 1); ?>
                    </td>
                    <td>
                        <?= utf8_encode($data['villeDepart']); ?>
                    </td>
                    <td>
                        <?= utf8_encode($data['villeArrive']); ?>
                    </td>
                    <td>
                        <?= dateFrancais($data['jourDepart']); ?>
                    </td>
                    <td>
                        <?= $data['heureDepart']; ?>
                    </td>
                    <td>
                        <?php $hrefGet = "&amp;d=" . $departure . "&amp;a=" . $arrival . "&amp;date=" . $date; ?>
                        <a id="search-link" href='detailCovoit.php?id=<?= $data['numCo'] . $hrefGet; ?>'
                           class="glyphicon glyphicon-new-window"> En savoir plus
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
    } ?>
        </table>
    </div>
</div>
<?php
require_once('../include/footer.php');
?>
</body>
</html>