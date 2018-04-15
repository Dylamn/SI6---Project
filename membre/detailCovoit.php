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
	<div class="row" id="ad-head">
		<a href='covoiturage.php'class="glyphicon glyphicon-arrow-left" id="return-arrow"></a>
		<h2>Caractéristiques du covoiturage</h2>
	</div>
	<div id="side-choice" class="text-center">
		<p>Veuillez effectuer votre choix ici :</p>
		<form action="manage_ad.php" method="post">
			<input type="submit" name="validate" class="btn btn-success" value="Valider">
			<input type="submit" name="refuse" class="btn btn-danger" value="Refuser">
		</form>
	</div>
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
			<table class="table table-borderless">
				<th scope="row" colspan="4" class="text-center">Places & prix</th>
				<tr id="main-info">
					<td scope="col" colspan="3" class="text-left">
						<span class="glyphicon glyphicon-user"></span>	3 places
					</td>
					<td scope="col" class="text-right">
						5.00 <span class="glyphicon glyphicon-euro"
					</td>
				</tr>
				<th scope="row" colspan="4" class="text-center">
					<br />Infos sur le trajet
				</th>
				<tr id="path-info">
					<td scope="col" class="text-left">
						<span class="glyphicon glyphicon-home"></span> | <?= $covoit->villeDepart . '<br />' . 
						'<span id="sub-path-info">' . $covoit->pointDepart . '</span>' ?>
					</td>
					<td scope="col" class="text-left">
						<svg width="75" height="75">
   							<circle cx="37" cy="37" r="10" stroke="grey" stroke-width="2" fill="#6399cd" />
   							Sorry, your browser does not support inline SVG.
						</svg> 		
						<!-- <span class="glyphicon glyphicon-arrow-right"></span> -->
					</td>
					<td scope="col" colspan="2"id="trip">
						<span id="dash-road"></span>
					</td>
					<td scope="col" class="text-right">
					<svg width="75" height="75">
   							<circle cx="37" cy="37" r="10" stroke="grey" stroke-width="2" fill="#6399cd" />
   							Sorry, your browser does not support inline SVG.
						</svg> 
					</td>
					<td scope="col" class="text-right">
						<span class="glyphicon glyphicon-flag"></span> | <?= $covoit->villeArrive . '<br />' .
						'<span id="sub-path-info">' . $covoit->pointArrive . '</span>' ?>
					</td>
				</tr>
				<tr>
					<td scope="col"></td>
				</tr>
			</table>
			<table class="table table-striped table-bordered">
				<tr>
					<td class="glyphicon glyphicon-user">	Nombre de places :
						<?php echo $covoit->nbPlaces; ?>
					</td>
					<td>Prix :
						<?php echo $covoit->prix; ?> €</td>
				</tr>

				<tr>
					<td>Ville départ :
						<?php echo utf8_encode($covoit->villeDepart); ?>
					</td>
					<td>Point départ :
						<?php echo utf8_encode($covoit->pointDepart); ?>
					</td>
				</tr>

				<tr>
					<td>Ville arrivée :
						<?php echo utf8_encode($covoit->villeArrive); ?>
					</td>
					<td>Point arrivée :
						<?php echo utf8_encode($covoit->pointArrive); ?>
					</td>
				</tr>
				<td>
					<a href='envoiMail.php?id=<?php echo $covoit->numCo; ?>' class="glyphicon glyphicon-envelope"> Envoyer mail</a>
				</td>
			</table>
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