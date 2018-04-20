<html>
<head>
    <!-- titre de la page -->
    <title>BDE DLS Covoiturages</title>
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
        <?php
        // affichage de la liste des covoiturages
        include("../include/_inc_parametres.php");
        include("../include/_inc_connexion.php");
        include("../include/dateFrancais.php");
        include('../include/head.php');
        include('../include/menu.php');

        //	on récupère toutes les lignes
        $resultat = $cnx->query("select * FROM covoiturage ORDER BY dateDepot DESC;");

        //le résultat est récupéré sous forme d'objet
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        ?>
        <h2>Liste des covoiturages</h2>

        <table class="table table-striped">
            <thead>
            <tr class="success">
                <td>Destination</td>
                <td>Date départ</td>
                <td>Heure départ</td>
                <td>En savoir plus</td>
            </tr>
            </thead>

            <?php
            $covoit = $resultat->fetch();
            while ($covoit) { ?>
                <tr>
                    <td><?php echo utf8_encode($covoit->villeDepart); ?> </td>
                    <td><?php echo dateFrancais($covoit->jourDepart); ?> </td>
                    <td><?php echo $covoit->heureDepart; ?> </td>
                    <td><a href='detailCovoit.php?id=<?php echo $covoit->numCo; ?>'
                           class="glyphicon glyphicon-new-window"> En savoir plus</a></td>
                </tr>
                <?php
                // lecture du stage suivant
                $covoit = $resultat->fetch();
            } ?>
        </table>
    </div>
    <?php include('../include/footer.php'); ?>
</div>

<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
<!-- Intégration de la libraire jQuery -->
<script src="bootstrap/js/jquery.js"></script>
<!-- Intégration de la libraire de composants du Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>