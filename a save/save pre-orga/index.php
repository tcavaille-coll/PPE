<?php
require_once "entete.php";

// COMPTEUR DIFFERENCE REVENUS/DEPENSES
if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2)
{
  $requete=getBDD()->prepare("SELECT SUM(gains) FROM revenus WHERE date<NOW()");
  $requete->execute();
  $revenus = $requete->fetchAll(PDO::FETCH_ASSOC);

  $requete=getBDD()->prepare("SELECT SUM(depense), date FROM depenses WHERE date<NOW()");
  $requete->execute();
  $depenses = $requete->fetchAll(PDO::FETCH_ASSOC);

  $requete=getBDD()->prepare("SELECT SUM(salaire) FROM employes");
  $requete->execute();
  $salaire = $requete->fetchAll(PDO::FETCH_ASSOC);

  print_r($revenus);
  print_r($depenses);
  function compte($revenus,$depenses, $salaire){
    $compte=$revenus[0]["SUM(gains)"] - $depenses[0]["SUM(depense)"] - $salaire[0]["SUM(salaire)"];
    echo "<br>le solde de mon entreprise possède " . $compte . " €";
  }
  compte($revenus,$depenses, $salaire);
// ---------------- FIN COMPTEUR ---------------- //
}
?>



<main>

<?php
if (empty($_SESSION["identifiant"]))
{
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
} else {
?>

  <div class="album py-3">
    <div class="container">

      <!-- CARD 1 : REVENUS -->
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="card shadow-sm">
            <img src="stonks.png" width="100%" height="250"/>
            <div class="card-body">
            <h5 class="card-title">Les revenus</h5>
            <p class="card-text">Gérez vos entrées de capitaux</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeGains.php" type="button" class="btn btn-sm btn-outline-secondary">Liste des revenus</a>
                  <?php
                  if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2)
                  {
                  ?>
                  <a href="ajouterGains.php" type="button" class="btn btn-sm btn-outline-secondary">Ajouter revenu</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- CARD 2 : CHARGES -->
        <div class="col-12 col-lg-4 col-md-6">
          <div class="card shadow-sm">
          <img src="https://static.lexpress.fr/medias_10870/w_2048,h_1146,c_crop,x_0,y_41/w_480,h_270,c_fill,g_north/v1458147064/istock-lentreprise-calculatrice-calculette-salaire-paie-taxe-impot_5565887.jpg" width="100%" height="250"/>

          <div class="card-body">
          <h5 class="card-title">Les charges</h5>
            <p class="card-text">Gérez vos dépenses</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeCharges.php" type="button" class="btn btn-sm btn-outline-secondary">Liste des charges</a>
                  <?php
                  if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2)
                  {
                  ?>
                  <a href="ajoutCharge.php" type="button" class="btn btn-sm btn-outline-secondary">Ajouter charges</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CARD 3 : EMPLOYES -->
        <div class="col-sm-12 col-lg-4 col-md-6">
          <div class="card shadow-sm">
          <img src="https://i-df.unimedias.fr/2014/10/30/employes-bureauv.jpg?auto=format%2Ccompress&crop=faces&cs=tinysrgb&fit=crop&h=700&w=1200" width="100%" height="250"/>
            <div class="card-body">
              <h5 class="card-title">Les salariés</h5>
              <p class="card-text">Gérez votre personnel</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeEmployes.php" type="button" class="btn btn-sm btn-outline-secondary">Liste des employés</a>
                  <?php
                  if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2)
                  {
                  ?>
                  <a href="ajouterEmploye.php" type="button" class="btn btn-sm btn-outline-secondary">Ajouter employé</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--"col-12 col-sm-6 col-md-4 col-lg-3"
        12 colonnes sur petit écran, 6 colonnes pour demi-écran, etc... 
        -->
        <div class="col-12 col-lg-12 col-md-6">
          <div class="card shadow-sm">
          <img src="https://cdn.statcdn.com/Statistic/475000/476672-blank-754.png" width="100%" height="100%"/>

            <div class="card-body">
              <h5 class="card-title">La répartition du budget</h5>
              <p class="card-text">Gérez le budget alloué aux différents secteurs</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeSecteurs.php" type="button" class="btn btn-sm btn-outline-secondary">Voir la répartition</a>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>

</main>
<?php
}
?>
<?php
require_once "pied.php";