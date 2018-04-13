<html>
<head>
		<!-- titre de la page -->
		<title>BDE DLS Covoiturages</title>
		<!-- type d'encodage de la page -->
		<meta charset="utf-8" />
		<!-- taille et échelle de la page -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
		<!-- liens avec les fichiers css de bootstrap -->
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
		<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
		<link rel="stylesheet" href="../styles/style.css">
		<!-- par défaut les tableaux occupent 100% de la page; le width fixe la largeur à 600 pixels -->
	</head>
<body>
<div id=conteneur class="container">
	<div id=contenu>
		<?php 
		// affichage de la liste des covoiturages 
			include("../include/_inc_parametres.php"); 
			include("../include/_inc_connexion.php");
				
		// préparation de la requête : recherche d'un covoiturage particulier
			$req_pre = $cnx->prepare("SELECT * FROM covoiturage WHERE  numCo = :id");
		// liaison de la variable à la requête préparée
			$req_pre->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
			$req_pre->execute();
		//le résultat est récupéré sous forme d'objet
			$covoit=$req_pre->fetch(PDO::FETCH_OBJ);
			
		?>
        <span id="return-arrow" class="glyphicon glyphicon-arrow-left"></span>
        <h2>Caractéristiques du covoiturage</h2>
        <table class="table table-striped table-bordered">
    <!--			<td></td><td></td><td><a href='covoiturage.php' class="glyphicon glyphicon-share-alt"> Retour à la liste</a><td>-->
            <tr>
                <td>Nombre de places :<?php echo $covoit->nbPlaces; ?></td>
                <td>Prix : <?php echo $covoit->prix; ?> €</td>
            </tr>

            <tr>
                <td>Ville départ : <?php echo utf8_encode($covoit->villeDepart); ?></td>
                <td>Point départ : <?php echo utf8_encode($covoit->pointDepart); ?></td>
            </tr>

            <tr>
                <td>Ville arrivée : <?php echo utf8_encode($covoit->villeArrive); ?></td>
                <td>Point arrivée : <?php echo utf8_encode($covoit->pointArrive); ?></td>
            </tr>
            <td><a href='envoiMail.php?id=<?php echo $covoit->numCo; ?>' class="glyphicon glyphicon-envelope"> Envoyer mail</a></td>
        </table>
        <div id="side-choice">
            <button type="button" class="btn btn-success">Valider</button>
            <button type="button" class="btn btn-danger">Refuser</button>
        </div>
        <br />
	</div>
</div>

<?php include('../include/footer.php'); ?>

<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
	<!-- Intégration de la libraire jQuery -->
	<script src="../bootstrap/js/jquery.js"></script>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>