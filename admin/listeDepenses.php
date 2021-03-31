<?php
require_once "../admin/entete.php";
require_once "../modeles/modele.php";
$depenses = recupererDepenses();
?>

<!-- ------------------------ PENSER A RAJOUTER LE HAMBURGER BOOTSTRAP ------------------------ -->

<!-- ------------------------ AJOUT D'UN NOUVEAU REVENU ------------------------ -->
<div class="container">

<?php
if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <div class="alert alert-success mt-3">La dépense a bien été ajoutée</div>
        <?php
        header("refresh:2;../admin/listeDepenses.php");
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

if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2 && empty($_GET["error"]) && empty($_GET["success"]))
{
?>

    <div class="row">
    <div class="col-md-12">
    <div class="card card-white">
    <div class="card-body">

        <nav class="navbar navbar-7 mb-4">
            <h1 class="navbar-brand" href="#">Ajout d'une nouvelle dépense : </h1>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent11" aria-controls="navbarSupportedContent11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent11">
                <form method="post" action="../traitements/ajoutDepense.php">
                    <div class="form-group">
                        <label for="nomDepense">Nom de la dépense :</label>
                        <input type="text" class="form-control" name="nomDepense" id="nomDepense" placeholder="Saisissez le nom de la dépense"/>
                    </div>
                    <div class="form-group">
                        <label for="depense">Montant :</label>
                        <input type="number" class="form-control" name="depense" id="depense" placeholder="Saisissez le montant de la dépense"/>
                    </div>
                    <div class="form-group">
                        <label for="date">Date :</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date"/>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-primary">Ajouter la dépense</button>
                    </div>
                </form>
            </div>
        </nav>

<?php
}
?>
<!-- ------------------------ FIN AJOUT NOUVEAU REVENU ------------------------ -->


<h1> Liste des depenses : </h1>

<ul class="list-group">
<div class="container-fluid">
<div class="row">

    <?php
    foreach($depenses as $depense)
    {
        $depense["date"]=list($annee,$mois,$jour)=explode('-',$depense['date']);
        $date = $jour.'/'.$mois.'/'.$annee;
        ?>
        
        <div class="col-8 col-md-9 mb-4">
            <li class="list-group-item">
                Libellé de la charge : <?=$depense["nomDepense"]?>
            </li>
            <li class="list-group-item">
                Montant de la charge : <?=$depense["depense"]?> €
            </li>
            <li class="list-group-item">
                A payer avant le <?=$date;?>
            </li>
        </div>
        <div class="float-right mb-4">
            <a href="modifierDepense.php?id=<?=$depense["idDepense"];?>" class="btn btn-outline-primary w-100 p-2 h-50" id="bouton">Modifier</a>
            <br>
            <a href="supprimerDepense.php?id=<?=$depense["idDepense"];?>" class="btn btn-outline-danger w-100 p-2 h-50" id="bouton">Supprimer</a>
        </div>
        
        <?php
    }
    ?>

</div>
</div>
</ul>

<?php
require_once "pied.php";
