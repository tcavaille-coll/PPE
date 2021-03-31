<?php
require_once "../admin/entete.php";

if(!isset($_SESSION["identifiant"]))
{
  header("location:../visiteur/index.php");
}

$solde = soldeEntreprise();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acu'Gestion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylePPE.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
</head>

<!-- COMPTEUR DIFFERENCE REVENUS/DEPENSES -->
<div class="alert alert-primary">Le solde de mon entreprise est de <?=$solde;?> €</div>
 

<main>

<div class="album py-3">
    <div class="container">

      <!-- CARD 1 : REVENUS -->
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
            <h5 class="card-title">Les revenus</h5>
            <p class="card-text">Gérez vos entrées de capitaux</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeRevenus.php">
                    <img src="../images/design/stonks.png" style="width: 100%;" height="153px"/>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- CARD 2 : CHARGES -->
        <div class="col-12 col-lg-4 col-md-6">
          <div class="card shadow-sm">
          <div class="card-body">
          <h5 class="card-title">Les charges</h5>
            <p class="card-text">Gérez vos dépenses</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeDepenses.php">
                  <img src="https://static.lexpress.fr/medias_10870/w_2048,h_1146,c_crop,x_0,y_41/w_480,h_270,c_fill,g_north/v1458147064/istock-lentreprise-calculatrice-calculette-salaire-paie-taxe-impot_5565887.jpg" width="100%"/>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CARD 3 : EMPLOYES -->
        <div class="col-sm-12 col-lg-4 col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Les salariés</h5>
              <p class="card-text">Gérez votre personnel</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeEmployes.php">
                  <img src="https://i-df.unimedias.fr/2014/10/30/employes-bureauv.jpg?auto=format%2Ccompress&crop=faces&cs=tinysrgb&fit=crop&h=700&w=1200" width="100%"/>
                  </a>
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
            <div class="card-body">
              <h5 class="card-title">La répartition du budget</h5>
              <p class="card-text">Gérez le budget alloué aux différents secteurs</p>
              <div class="d-flex justify-content-center">
                <div class="btn-group">
                  <a href="listeSecteurs.php">
                    <img src="https://cdn.statcdn.com/Statistic/475000/476672-blank-754.png" width="100%"/>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>

</main>

<?php
require_once "pied.php";