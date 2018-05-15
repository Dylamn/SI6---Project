<html>
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
    <link rel="stylesheet" href="../styles/temp.css">
</head>
<body>

<?php
    include("../include/_inc_parametres.php");
    include("../include/_inc_connexion.php");
    include("../include/dateFrancais.php");
    include('../include/head.php');
    include('../include/menu.php');
?>
<div class="container">
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

        <h2>Covoiturage</h2>
        <p>Sur cette page, vous pouvez rechercher un covoiturage.</p>
        
        
        <!-- <a href="RechercheCovoiturage.php?action=rechercher&amp;depart= <?php //$res->numCo; ?>" 
                        class = "glyphicon glyphicon-pencil"> Rechercher</a> -->
</div>
<?php include('../include/footer.php'); ?>
<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
<!-- Intégration de la libraire jQuery -->
<script src="bootstrap/js/jquery.js"></script>
<!-- Intégration de la libraire de composants du Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>