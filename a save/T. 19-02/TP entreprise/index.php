<?php
require_once "entete.php";
?>


<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark">Gestion de Budget</h1>
        <p class="lead text-muted">Vous aides a géré vos revenues</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Connexion</a>
          <a href="#" class="btn btn-secondary my-2">Deconnexion</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://assets.stickpng.com/images/585d3610cb11b227491c334b.png" width="100%" height="250"/>

            <div class="card-body">
              <p class="card-text">Les gains d'Acubis</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="listeGains.php" type="button" class="btn btn-sm btn-outline-secondary">Afficher info</a>
                  <a href="ajouterGains.php" type="button" class="btn btn-sm btn-outline-secondary">Ajouter info</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
          <img src="https://static.lexpress.fr/medias_10870/w_2048,h_1146,c_crop,x_0,y_41/w_480,h_270,c_fill,g_north/v1458147064/istock-lentreprise-calculatrice-calculette-salaire-paie-taxe-impot_5565887.jpg" width="100%" height="250"/>

            <div class="card-body">
              <p class="card-text">Les charges</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="listeCharges.php" type="button" class="btn btn-sm btn-outline-secondary">Voir la liste des charges</a>
                  <a href="ajoutCharge.php" type="button" class="nav-item nav-link">Ajouter charges</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
          <img src="https://i-df.unimedias.fr/2014/10/30/employes-bureauv.jpg?auto=format%2Ccompress&crop=faces&cs=tinysrgb&fit=crop&h=700&w=1200" width="100%" height="250"/>
            <div class="card-body">
              <p class="card-text">Vos employés</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="listeEmployes.php" type="button" class="btn btn-sm btn-outline-secondary">Voir employés</a>
                  <a type="button" class="btn btn-sm btn-outline-secondary">Ajouter employés</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
          <img src="https://cdn.statcdn.com/Statistic/475000/476672-blank-754.png" width="100%" height="100%"/>

            <div class="card-body">
              <p class="card-text">Répartition budget</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" class="btn btn-sm btn-outline-secondary">Voir la répartition</a>
                  <a type="button" class="btn btn-sm btn-outline-secondary">Modifier répartition</a>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>

</main>

<?php
require_once "pied.php";