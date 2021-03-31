<?php
require_once "../admin/entete.php";
?>


<div class="container">

<?php
if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <div class="alert alert-success mt-3">Le revenu a bien été ajouté <br> 
        Vous allez être redirigé vers la liste des revenus<br>
        <a href="../admin/listeRevenus.php">Cliquez ici pour une redirection manuelle</a>
    </div>
        <?php
        header("refresh:5;../admin/listeRevenus.php");
}

if (!empty($_GET["error"])) 
{
    ?>
    <p style="color:red">
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
    </p>
<?php 
}
if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2)
{
?>

    <div class="row">
    <div class="col-md-12">
    <div class="card card-white">
    <div class="card-body">

        <h1>Ajout d'un nouveau revenu</h1>
        <form method="post" action="../traitements/ajoutRevenu.php">
        <div class="form-group">
            <label for="nomRevenu">Nom du revenu :</label>
            <input type="text" class="form-control" name="nomRevenu" id="nomRevenu" placeholder="Saisissez le nom du revenu"/>
        </div>
        <div class="form-group">
            <label for="gains">Gains :</label>
            <input type="number" class="form-control" name="gains" id="gains" placeholder="Saisissez les gains engrangés"/>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date"/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-outline-primary">Ajouter le revenu</button>
            <a href="listeRevenus.php" class="btn btn-outline-danger">Annuler</a>
        </div>
    </form>

<?php
}
?>

<?php
require_once "pied.php";

    








