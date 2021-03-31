<?php
require_once "../traitements/entete.php";
?>

<!-- MESSAGE D'ACCUEIL SI PAS CONNECTE -->
<section class="py-3 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-dark">Gestion de Budget<h1>
            <p class="lead text-muted">Vous devez être connecté pour utiliser l'application</p>
            <p>
            <a href="inscription.php" class="btn btn-outline-success my-2">Inscription</a>
            <a href="connexion.php" class="btn btn-outline-primary my-2">Connexion</a>
            </p>
      </div>
    </div>
</section>

<?php
require_once "../visiteur/pied.php";