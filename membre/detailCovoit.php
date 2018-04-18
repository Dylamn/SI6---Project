<?php include('../include/head.php'); ?>
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
		<h1>Caractéristiques du covoiturage</h1>
	</div>
	<div class="container">
			<?php 
		// affichage de la liste des covoiturages 
			include("../include/_inc_parametres.php");
			include("../include/_inc_connexion.php");
				
		// préparation de la requête : recherche d'un covoiturage particulier
			$req_pre = $cnx->prepare("SELECT covoiturage.*, nom, prenom, classe FROM covoiturage, membre WHERE numCo = :id AND covoiturage.numMembre = membre.numMembre");
		// liaison de la variable à la requête préparée
			$req_pre->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
			$req_pre->execute();
		//le résultat est récupéré sous forme d'objet
			$covoit=$req_pre->fetch(PDO::FETCH_OBJ);
			
		?>
		<section>
			<div class="table-responsive">
				<table class="table tables-striped">
					<th scope="row" colspan="5" class="text-center">Places & prix</th>
					<tr id="main-info">
						<td scope="col" colspan="3" class="text-left">
							<span class="glyphicon glyphicon-user"></span>	3 places
						</td>
						<td scope="col" colspan="2" class="text-right">
							5.00 <span class="glyphicon glyphicon-euro"></span>
						</td>
					</tr>
					<th scope="row" colspan="5" class="text-center">
						<br />Infos sur le trajet
					</th>
					<tr id="path-info">
						<td scope="col" class="text-left">
							<span class="glyphicon glyphicon-home"></span> | <?= utf8_encode($covoit->villeDepart) . '<br />' . 
							'<span id="sub-path-info">' . utf8_encode($covoit->pointDepart) . '</span>' ?>
						</td>
						<td scope="col" colspan="3">
							<svg id="road-dash" width="100%" height="100">
								<line id="dash-road"  x1="0%" y1="50" x2="100%" y2="50" stroke-width="3" />
								<circle cx="1.9%" cy="50" r="10" stroke="grey" stroke-width="2" fill="#6399cd" />
								<circle cx="98.1%" cy="50" r="10" stroke="grey" stroke-width="2" fill="#6399cd" />
								Sorry, your browser does not support inline SVG.
							</svg>
						</td>
						<td scope="col" class="text-right">
							<span class="glyphicon glyphicon-flag"></span> | <?= utf8_encode($covoit->villeArrive) . '<br />' .
							'<span id="sub-path-info">' . utf8_encode($covoit->pointArrive) . '</span>' ?>
						</td>
					</tr>
				</table>
			</div>
		</section>
		<br />
		<article id="info-driver" class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr> 
						<td><h2>Conducteur</h2></td>
						<td><h2>Voiture</h2></td>
						<td><h2>Informations complémentaires</h2></td>
					</tr>
				</thead>
				<tr>
					<td scope="col">
						<p style="line-height: 27px;">
							<?= utf8_encode($covoit->prenom) . "  " . substr($covoit->nom, 0, 1) . "<br />(" . utf8_encode($covoit->classe) . ")"; ?>
						</p>
					</td>
					<td scope="col">
						<p>
							<?= $covoit->voiture ?> <br />
							Couleur : <?= $covoit->couleur ?>
						</p>
					</td>
					<td scope="col" colspan="3">
						<p>
							<?= $covoit->description ?>
						</p>
					</td>
				</tr>
			</table>	
			<button type="button" class="btn btn-primary"><a style="color: #fff;" href='envoiMail.php?id=<?php echo $covoit->numCo; ?>' class="glyphicon glyphicon-envelope"> Envoyer mail</a></button>
		</article>

		<div id="booking" class="text-center">
			<p>Veuillez effectuer votre choix ici :</p>
			<form action="manage_ad.php" method="post">
				<input type="hidden" name="idCovoit" value=" <?= $_GET['id']; ?>" />
				<input type="submit" name="validate" class="btn btn-success" value="Valider" />
				<input type="submit" name="refuse" class="btn btn-danger" value="Refuser" />
			</form>
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