<?php
require_once "../admin/entete.php";
require_once "../modeles/modele.php";
$revenus = recupererRevenus();
?>

<!-- ------------------------ PENSER A RAJOUTER LE HAMBURGER BOOTSTRAP ------------------------ -->

<!-- ------------------------ AJOUT D'UN NOUVEAU REVENU ------------------------ -->
<div class="container">

<?php
if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <div class="alert alert-success mt-3">Le revenu a bien été ajouté</div>
        <?php
        header("refresh:2;../admin/listeRevenus.php");
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
        <nav class="navbar  navbar-7  mb-4">
            <h1 class="navbar-brand" href="#">Ajout d'un nouveau revenu : </h1>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent11" aria-controls="navbarSupportedContent11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent11">
                <form method="post" action="../traitements/ajoutRevenu.php">
                    <div class="form-group">
                        <label for="nomRevenu">Nom du revenu :</label>
                        <input type="text" class="form-control" name="nomRevenu" id="nomRevenu" placeholder="Saisissez le nom du revenu" value="<?=(isset($_POST["nomRevenu"]) ? $_POST["nomRevenu"] : "")?>"/>
                    </div>
                    <div class="form-group">
                        <label for="gains">Gains :</label>
                        <input type="number" class="form-control" name="gains" id="gains" placeholder="Saisissez les gains engrangés" value="<?=(isset($_POST["gains"]) ? $_POST["gains"] : "")?>"/>
                    </div>
                    <div class="form-group">
                        <label for="date">Date :</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date" value="<?=(isset($_POST["date"]) ? $_POST["date"] : "")?>"/>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-primary">Ajouter le revenu</button>
                    </div>
                </form>
            </div>
        </nav>
<?php
}
?>
<!-- ------------------------ FIN AJOUT NOUVEAU REVENU ------------------------ -->


<h1> Liste des revenus : </h1>

<ul class="list-group">
<div class="container-fluid">
<div class="row">

<?php
foreach($revenus as $revenu)
{
    $revenu["date"]=list($annee,$mois,$jour)=explode('-',$revenu['date']);
    $date = $jour.'/'.$mois.'/'.$annee;
        ?>

       <div class="col-8 col-md-9 mb-4">
            <li class="list-group-item">
                Libelle du revenu : <?= $revenu["nomRevenu"]?>
            </li>
            <li class="list-group-item">
                Montant du revenu : <?= $revenu["gains"]. "€ ";?>
            </li>
            <li class="list-group-item">
                Reçu le : <?= "Date: " .  $date;?>
            </li>
        </div>
        <div class="float-right mb-4">
            <a href="modifierRevenu.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-outline-primary w-100 p-2 h-50" id="bouton2">Modifier</a>
            <br>
            <a href="supprimerRevenu.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-outline-danger w-100 p-2 h-50" id="bouton2">Supprimer</a>
        </div>
        
        <?php
}
?>
</div>
</div>
</ul>

<?php
require_once "pied.php";

