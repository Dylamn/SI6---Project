﻿<?php include('../include/head.php');
include('../include/menu.php');
?>
    <div class="container">
        <?php /* si le membre est connecte*/
        if (isset($_SESSION['numMembre']))        {
        echo '<h1>Mon Espace Membre</h1><hr>';
        echo '<h3>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</h3><br>';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>Erasmus Day : <a href="vote.php">Votez pour la meilleur photo !</a></h3>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Changer d'adresse email</h3>
                            <p>Vous pouvez modifier votre email pour être informé sur votre adresse personnelle :</p>
                            <form action="modification_membre.php" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="<?php echo $_SESSION['email'] ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3>Proposer une idée</h3>
                            <p>Vous pouvez pouvez envoyer une idée à faire parvenir au Bureau des étudiants :</p>
                            <?php
                            if (!empty($_POST)) {
                                if (!empty($_POST['texte']) && !empty($_POST['hashtag']) && !empty($_POST['classe']) && !empty($_POST['auteur'])) {
                                    require '../include/connectbdd.php';
                                    $req = $bdd->prepare('INSERT INTO idee (texte, hashtag, auteur, classe, date) VALUES (:texte,:hashtag,:auteur,:classe,CURDATE())');
                                    $req->execute(array('texte' => $_POST['texte'], 'hashtag' => $_POST['hashtag'], 'auteur' => $_POST['auteur'], 'classe' => $_POST['classe']));
                                    $req->closeCursor();
                                    echo '<div class="alert alert-success">                           
    										 <strong>Succès :</strong> Votre idée a été envoyée ! Elle est en cours de validation.                      
    										 </div>';
                                } else {
                                    echo '<div class="alert alert-danger">                        
    										                 	<strong>Erreur :</strong> Vous n\'avez pas rempli tous les champs !                    
    										                 	</div>';
                                }
                            }
                            ?>
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" placeholder="Texte" name="texte">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text"
                                               placeholder="Hashtag | Exemple : #bde #etudiant #lycéedelasalle"
                                               name="hashtag">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" placeholder="Votre classe" name="classe"
                                               maxlength="255">
                                    </div>
                                </div>
                                <br>
                                <input class="form-control" type="hidden"
                                       value="<?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?>" name="auteur"
                                       maxlength="255">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-large btn-primary" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                            ';
                            <?php }
                            else {
                                ?>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Erreur : Vous n'êtes pas connecté</div>
                                    <div class="panel-body"> Connectez-vous pour accéder à votre compte. Si vous n'avez
                                        pas encore de compte, vous pouvez dès à présent vous inscrire !<br><br><br>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-danger" href="login.php">Connexion</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
<?php include('../include/footer.php'); ?>