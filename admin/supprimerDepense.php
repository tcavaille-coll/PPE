<?php
require_once "entete.php";

if (!empty($_GET["id"]))
{
    $idDepense = $_GET["id"];
} else {
    header("location:listeDepenses.php");
}

$depense = recupererDepense($idDepense);

$nomDepense = $depense["nomDepense"];
$montantDepense = $depense["depense"];
$date = $depense["date"];
?>

<?php if(!empty($_GET["success"]) && $_GET["success"] == "suppression") 
{
    ?>
    <div class="alert alert-success mt-2">La dépense a bien été supprimée <br>
        Vous allez être redirigé vers la liste des dépenses <br>
        <a href="../admin/listeDepenses.php">Cliquez ici pour vous rediriger manuellement</a>
    </div>
    <?php
    header("refresh:3;../admin/listeDepenses.php");
}
?>
    
<?php if(!empty($_GET["error"])) 
{
    ?>
    <div class="alert alert-danger mt-2">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'idDepense"; ?>
            <?php break;?>
        <?php case "erreursuppression": ?>
            <?php echo "Une erreur s'est produite lors de la suppression"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </div>
<?php 
}
?>
<div class="container">
<h2 class="display-4">Êtes vous sûr de vouloir supprimer la dépense n°<?=$idDepense?> : <?=$nomDepense?></h2>
    <form method="post" action="../traitements/supprimerDepense.php?id=<?=$idDepense;?>">
        <input type="hidden" name="idDepense" value="<?=$idDepense;?>"/>

        <div class="form-group text-center">
            <button type="submit" name="idDepense" class="btn btn-outline-danger">Supprimer l'employé</button>       
            <a href="listeDepenses.php" class="btn btn-outline-secondary">Non</a>
        </div>
    </form>
</div>

<?php
require_once "pied.php";