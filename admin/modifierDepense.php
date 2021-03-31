<?php
require_once "../admin/entete.php";

if (!empty($_GET["id"])) 
{
    $idDepense = $_GET["id"];

} else {
    header("location:/admin/listeDepenses.php");
}

$depense = recupererDepense($idDepense);

$nomDepense = $depense["nomDepense"];
$montantDepense = $depense["depense"];
$date = $depense["date"];
?>
<div class="container">

<?php if(!empty($_GET["success"]) && $_GET["success"] == "modification") 
{
    ?>
    <div class="alert alert-success mt-2">La dépense : "<?=$nomDepense;?>" à bien été modifié <br>
    Vous allez être redirigé vers la liste des dépenses <br>
    <a href="../admin/listeDepenses.php">Cliquez ici pour une redirection manuelle</a>
    </div>
    <?php
    header("refresh:3;../admin/listeDepenses.php");
}
?>
    
<?php if (!empty($_GET["error"])) 
{
    ?>
    <p style="color:red">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Au moins un des champs est vide"; ?>
            <?php break;?>
        <?php case "erreurmodif": ?>
            <?php echo "Une erreur s'est produite lors de la modification"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </p>
<?php 
}
?>

<h1> Modification de la dépense : <?=$nomDepense;?></h1>
<form method="post" action="../traitements/modifierDepense.php?id=<?=$depense["idDepense"];?>">
    <div class="form-group">
        <label for="nomDepense">Libellé de la dépense :</label>
        <input type="text" class="form-control" name="nomDepense" id="nomDepense" placeholder="Saisissez le libellé de la dépense" value="<?=$depense['nomDepense'];?>"/>
    </div>
    <div class="form-group">
        <label for="depense">Somme à payer :</label>
        <input type="number" class="form-control" name="depense" id="depense" placeholder="Saisissez la somme à payer" value="<?=$depense['depense'];?>"/>
    </div>
    <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date" value="<?=$depense['date'];?>"/>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-outline-primary">Modifier la dépense</button>
        <a href="../admin/listeDepenses.php" class="btn btn-outline-secondary">Revenir à la liste</a>
    </div>
</form>

    
<?php

require_once "pied.php";
