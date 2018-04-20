﻿<html>
<head>
    <!-- titre de la page -->
    <title>BDE DLS - Ajout Covoiturage</title>
    <!-- type d'encodage de la page -->
    <meta charset="utf-8"/>
    <!-- taille et échelle de la page -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <!-- liens avec les fichiers css de bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <!-- par défaut les tableaux occupent 100% de la page; le width fixe la largeur à 600 pixels -->
    <style> .boite {
            border: 2px solid #dea
        } </style>
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
            <a href='listeCovoiturage.php' class = "menu">
                <span class = "item-brand glyphicon glyphicon-th-list" ></span>  Liste des covoiturages 
            </a>
        </span>
    </nav>
        <?php
        if ($_GET['action'] == 'rechercher') {


        }
        ?>
        <?php
        include("../include/_inc_parametres.php");
        include("../include/_inc_connexion.php");
        include("../include/dateFrancais.php");
        include('../include/head.php');
        include('../include/menu.php');
        ?>
        <h2>Covoiturage</h2>
        <p>Sur cette page, vous pouvez rechercher un covoiturage.</p>


        <form method="get" action="RechercheCovoiturages.php">
            <input type="hidden" name="numMembre" value="<?php echo $_SESSION['numMembre']; ?>"/>
            <table class="table table-striped">
                <tr>
                    <td>Départ</td>
                    <td><input type='text' name='depart' required></td>
                </tr>
                <tr>
                    <td>Arrivé :</td>
                    <td><textarea cols="60" name='arrive'></textarea>
                </tr>
                <tr>
                    <td>Date :</td>
                    <td><input type='date' name='jourDepart' required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="RechercheCovoiturage.php?action=rechercher&depart=<?php echo $covoit->numCo; ?>' class = "
                           glyphicon glyphicon-pencil">Rechercher</a></td>
                </tr>
            </table>
        </form>

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