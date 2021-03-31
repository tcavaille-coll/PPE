<?php
require_once "../admin/entete.php";

?>

<div class="container">

<?php if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <p style="color:green">La dépense à bien été ajouté</p>
<?php
}
?>
    
<?php if (!empty($_GET["error"])) 
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
?>

<h1> Ajout d'une nouvelle dépense</h1>
<form method="post">
    <div class="form-group">
        <label for="nomDepense">Nom de la dépense :</label>
        <input type="text" class="form-control" name="nomDepense" id="nomDepense" placeholder="Saisissez le nom de la dépense"/>
    </div>
    <div class="form-group">
        <label for="depense">Somme à payer :</label>
        <input type="number" class="form-control" name="depense" id="depense" placeholder="Saisissez la somme à payer"/>
    </div>
    <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date"/>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-outline-primary">Ajouter la charge</button>
        <a href="listeDepenses.php" class="btn btn-outline-danger">Annuler</a>
    </div>
</form>

<?php
require_once "pied.php";
