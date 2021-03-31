<?php
require_once "../admin/entete.php";
require_once "../modeles/modele.php";

$secteurs=recupererSecteurs();
?>
<!-- ------------------------ PENSER A RAJOUTER LE HAMBURGER BOOTSTRAP ------------------------ -->

<!-- ------------------------ AJOUT D'UN NOUVEAU REVENU ------------------------ -->
<div class="container">

<?php
if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <div class="alert alert-success mt-3">Le secteur a bien été ajouté</div>
        <?php
        header("refresh:2;../admin/listeSecteurs.php");
}

if (!empty($_GET["error"])) 
{
    ?>
    <div class="alert alert-danger mt-2">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Au moins un des champs est vide"; ?>
            <?php break;?>
        <?php case "erreurajout": ?>
            <?php echo "Une erreur s'est produite lors de l'ajout"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </div>
<?php 
}

if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2 && empty($_GET["success"]))
{
?>

    <div class="row">
    <div class="col-md-12">
    <div class="card card-white">
    <div class="card-body">


    <nav class="navbar navbar-7 mb-4">
            <h1 class="navbar-brand" href="#">Ajout d'un nouveau secteur: </h1>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent11" aria-controls="navbarSupportedContent11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent11">
                <form method="post" action="../traitements/ajoutSecteur.php">
                    <div class="form-group">
                        <label for="domaine">Nom du secteur :</label>
                        <input type="text" class="form-control" name="domaine" id="domaine" placeholder="Saisissez le nom du secteur"/>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget alloué :</label>
                        <input type="number" class="form-control" name="budget" id="budget" placeholder="Saisissez le budget alloué"/>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-primary">Ajouter le secteur</button>
                        <a href="listeSecteurs.php" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </form>
            </div>
    </nav>


<?php
}
?>
<!-- ------------------------ FIN AJOUT NOUVEAU REVENU ------------------------ -->
<h1> Liste des secteurs : </h1>

<ul class="list-group">
<div class="container-fluid">
<div class="row">

    <?php
    foreach($secteurs as $secteur)
    {
        ?>
        <div class="col-8 col-md-9 mb-4">
            <li class="list-group-item">
                idSecteur : <?=$secteur["idSecteur"];?>
            </li>
            <li class="list-group-item">
                Libellé du secteur: <?=$secteur["nomSecteur"];?>
            </li>
            <li class="list-group-item">
                Budget alloué: <?=$secteur["budget"];?>%
            </li>
        </div>
        <div class="float:right mb-4">
            <a href="modifierSecteur.php?id=<?=$secteur["idSecteur"];?>" class="btn btn-outline-primary w-100 p-2 h-50" id="bouton2">Modifier</a>
            <br>
            <a href="supprimerSecteur.php?id=<?=$secteur["idSecteur"];?>" class="btn btn-outline-danger w-100 p-2 h-50" id="bouton2">Supprimer</a>
        </div>
    <?php
    }
    ?>
</div>
</div>
</ul>
</div>

<?php
require_once "pied.php";

