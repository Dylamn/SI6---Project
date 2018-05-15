<?php
require_once("../include/_inc_parametres.php");
require_once("../include/_inc_connexion.php");
require_once("../include/dateFrancais.php");
require_once('../include/head.php');
require_once('../include/menu.php');

if (isset($_POST['idAnnonce'], $_POST['objet'], $_POST['message']) == true) {
    $query = $cnx->prepare("SELECT email FROM membre WHERE numMembre = (SELECT numMembre FROM covoiturage 
                               WHERE numCo = :id);");
    $query->bindValue(':id', $_POST['idAnnonce'], PDO::PARAM_INT);
    $query->execute();
    $destinataire = $query->fetch();
    $query->closeCursor();

    $query = $cnx->query("SELECT email FROM membre WHERE numMembre = " . $_SESSION['numMembre']);
    $expediteur = $query->fetch();

    $success = Outils::envoyerMail($destinataire[0], $_POST['objet'], $_POST['message'], $expediteur[0]);

    if ($success == true) {
        echo '<div class="alert alert-success">';
        echo    '<strong>Succès :</strong> Votre mail a été envoyé !';
        echo '</div>';
    }
    else {
        echo '<div class="alert alert-danger">';
        echo    '<strong>Erreur :</strong> Une erreur s\'est produite !';
        echo '</div>';
    }
}
else {
    ?>
    <div class="container">
        <h1>Envoi d'un mail</h1>
        <svg height="10" width="100%">
            <line x1="0%" y1="10" x2="100%" y2="10" style="stroke:#6399cd; stroke-width:4px"/>
            SVG was not supported by your browser.
        </svg>
        <div class="row">
            <div class="col-md-12">
                <p>Sur cette page, vous pouvez envoyer un mail au propriétaire de l'annonce concernée.</p>
            </div>
        </div>
        <div class="row">
            <form action="envoiMail.php" method="post">
                <input type="hidden" name="idAnnonce" value="<?= $_GET['id']; ?>">
                <div class="col-md-12" style="margin-bottom: 25px;">
                    <label for="objet">Objet :</label>
                    <input type="text" id="objet" name="objet" class="form-control" placeholder="Ajouter un objet"
                           required>
                </div>
                <div class="col-md-12" style="margin-bottom: 25px">
                    <label for="message">Votre message :</label>
                    <textarea name="message" id="message" placeholder="Ajoutez un message" rows="10"
                              class="form-control" required></textarea>
                </div>
                <div class="col-md-offset-11 col-md-1">
                    <input type="submit" value="Envoyer" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <?php
}
require_once('../include/footer.php');
?>
