<html>

<head>
	<!-- titre de la page -->
	<title>BDE DLS - Ajout Covoiturage</title>
	<!-- type d'encodage de la page -->
	<meta charset="utf-8" />
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
	<nav class="navbar-covoit">
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu">
				<a href="covoiturage.php">
					<span class="glyphicon glyphicon-th-list"></span> Liste des covoiturages
				</a>
            </button>
        </span>
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu">
                <a href="AjoutCovoiturage.php">
                    <span class="glyphicon glyphicon-calendar"></span> Proposer un trajet
                </a>
            </button>
        </span>
        <span class="navbar-covoit-item">
            <button type="button" class="btn-menu">
				<a href="MesCovoiturages.php">
					<span class = "glyphicon glyphicon-road"></span> Mes trajets
				</a>
            </button>
        </span>
    </nav>
	<h1>
        Ajout d'un covoiturage
        <svg height="10" width="100%">
            <line x1="0%" y1="10" x2="100%" y2="10" style="stroke:#6399cd; stroke-width:4"/>
        </svg>
    </h1>
	<p>
		Sur cette page, vous pouvez ajouter un covoiturage. 
		<br />
		(*) Champs obligatoires.
	</p>

	<form method="post" action="MesCovoiturages_action.php?action=nouveau">
		<input type="hidden" name="numMembre" value="<?php echo $_SESSION['numMembre']; ?>" />
		<table class="table table-striped">
			<tr>
				<td>Prix : *</td>
				<td>
					<input type='text' name='prix' pattern="[0-9]{1,2}+[.,]{1,1}?[0-9]{1,2}*" required>
				</td>
			</tr>
			<tr>
				<td>Description :</td>
				<td>
					<textarea cols="30" name='description'></textarea>
			</tr>
			<tr>
				<td>Ville de départ : * </td>
				<td>
					<input type='text' name='villeDepart' pattern="[a-zA-Z -]+" required>
				</td>
			</tr>
			<tr>
				<td>Ville d'arrivé : * </td>
				<td>
					<input type='text' name='villeArrive' pattern="[a-zA-Z -]+" required>
				</td>
			</tr>
			<tr>
				<td>Point de départ : * </td>
				<td>
					<input type='text' name='pointDepart' pattern="[a-zA-Z -]+" required>
				</td>
			</tr>
			<tr>
				<td>Point d'arrivé : * </td>
				<td>
					<input type='text' name='pointArrive' pattern="[a-zA-Z -]+" required>
				</td>
			</tr>
			<tr>
				<td>Heure de départ : * </td>
				<td>
					<input type='time' name='heureDepart' pattern="([0-1][0-9]:[0-5][0-9]|[2][0-4]:[0-5][0-9])" required>
				</td>
			</tr>
			<tr>
				<td>Heure d'arrivé : * </td>
				<td>
					<input type='time' name='heureArrive' pattern="([0-1][0-9]:[0-5][0-9]|[2][0-4]:[0-5][0-9])" required>
				</td>
			</tr>
			<tr>
				<td>Jour de départ : * </td>
				<td>
					<input type='date' name='jourDepart' required>
				</td>
			</tr>

			<tr>
				<td>Jour d'arrivé : * </td>
				<td>
					<input type='date' name='jourArrive' required>
				</td>
			</tr>
			<tr>
				<td>Nombre de places : * </td>
				<td>
					<input type='number' name='nbPlaces'  pattern="[0-9]{1,2}" required>
				</td>
			</tr>
			<tr>
				<td>Place pour les bagages : * </td>
				<td>
					<input type='text' name='placeBagage' required>
				</td>
			</tr>
			<tr>
				<td>Type de voiture :</td>
				<td>
					<input type='text' name='voiture' pattern="[a-zA-Z0-9 -]+">
				</td>
			</tr>
			<tr>
				<td>Couleur de la voiture :</td>
				<td>
					<input type='text' name='couleur' pattern="[a-zA-Z0-9]+">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type='submit' class="btn btn-success" value='Ajouter'>
				</td>
			</tr>
		</table>
	</form>
</div>
	<?php include('../include/footer.php'); ?>
	<!-- Obligatoirement avant la balise de fermeture de l'élément body  -->
	<!-- Intégration de la libraire jQuery -->
	<script src="bootstrap/js/jquery.js"></script>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>