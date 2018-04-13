<html>
<head>
		<!-- titre de la page -->
		<title>BDE DLS Covoiturages</title>
		<!-- type d'encodage de la page -->
		<meta charset="utf-8" />
		<!-- taille et échelle de la page -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
		<!-- liens avec les fichiers css de bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
		<link rel="stylesheet" href="../styles/style.css">
		<!-- par défaut les tableaux occupent 100% de la page; le width fixe la largeur à 600 pixels -->
	</head>
<body>
<div id=conteneur>
	<div id=contenu>
		<?php 
		// affichage de la liste des covoiturages 
			include("../include/_inc_parametres.php"); 
			include("../include/_inc_connexion.php");
			include("../include/dateFrancais.php");
			include('../include/head.php');
			include('../include/menu.php');
			
		//	on récupère toutes les lignes 
			$resultat = $cnx->query("SELECT covoiturage.*, nom, prenom FROM covoiturage, membre 
                                               WHERE covoiturage.numMembre = membre.numMembre ORDER BY dateDepot DESC;");
			
		//le résultat est récupéré sous forme d'objet
			$resultat->setFetchMode(PDO::FETCH_OBJ);
		
		if ($_SESSION['privilege'] == "admin")
				{ ?>
					<h2 class="covoit-table-title">Liste des covoiturages (à confirmer)
						<div id="parent-pulse" class="glyphicon glyphicon-exclamation-sign"> 
							<div class="btn-pulse">
							</div>
						</div>
					</h2>
					
					<table class="table table-striped">
						<thead>
							<tr>
								<td>Nom</td>
								<td>Prenom</td>
								<td>Départ</td>
								<td><b>Destination</td>
								<td>Date départ</td>
								<td>Heure départ</td>
								<td>En savoir plus</td>
							</tr>
						</thead>
					<?php 
					while ($covoit = $resultat->fetch())
					{
						$init = false; // Permet de créer l'entête pour le tableau des covoiturages confirmés

						if ($covoit->etat == 0)
						{ ?>
							<tr class="danger">
								<td><?= utf8_encode($covoit->prenom); ?> </td>
								<td><?= utf8_encode($covoit->nom); ?> </td>
								<td><?= utf8_encode($covoit->villeDepart); ?> </td>
								<td><?= utf8_encode($covoit->villeArrive); ?> </td>
								<td><?= dateFrancais($covoit->jourDepart); ?> </td>
								<td><?= $covoit->heureDepart; ?> </td>
								<td><a href='detailCovoit.php?id=<?= $covoit->numCo; ?>' class="glyphicon glyphicon-new-window"> En savoir plus</a></td>
							</tr>

						<?php
						}
						else if ($covoit->etat == 1)
						{
							if ($init == false)
							{ ?>
								</table> <!-- Fin de la table des covoiturages en attentes -->
								<h2 class="covoit-table-title">
									<span id="separator-table">___________________________________________________________________________________________</span>
									<br />
									<br />
									Liste des covoiturages (confirmés)
								</h2>
								
								<table class="table table-striped">
									<thead>
										<tr>
											<td>Conducteur</td>
											<td>Départ</td>
											<td><b>Destination</td>
											<td>Date départ</td>
											<td>Heure départ</td>
											<td>En savoir plus</td>
										</tr>
									</thead>
								<?php
								$init = true;
							} ?>
									<tr>
										<td><?= utf8_encode($covoit->prenom) . "  " . substr($covoit->nom, 0, 1); ?> </td>
										<td><?= utf8_encode($covoit->villeDepart); ?> </td>
										<td><?= utf8_encode($covoit->villeArrive); ?> </td>
										<td><?= dateFrancais($covoit->jourDepart); ?> </td>
										<td><?= $covoit->heureDepart; ?> </td>
										<td><a href='detailCovoit.php?id=<?= $covoit->numCo; ?>' class="glyphicon glyphicon-new-window"> En savoir plus</a></td>
									</tr>
								<?php
						}
					} ?>
					</table>
					<?php
				} 
				else if ($_SESSION['privilege'] == "user")
				{
					if ($covoit->etat == 1)
					{
					?>
					<tr>
						<td><?= utf8_encode($covoit->villeDepart); ?> </td>
						<td><?= dateFrancais($covoit->jourDepart); ?> </td>
						<td><?= $covoit->heureDepart; ?> </td>
						<td><a href='detailCovoit.php?id=<?= $covoit->numCo; ?>' class="glyphicon glyphicon-zoom-in"> En savoir plus</a></td>
					</tr>
					<?php 
					}
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