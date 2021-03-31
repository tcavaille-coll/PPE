<?php
require_once "../admin/entete.php";

if (!empty($_GET["id"]))
{
    $idRevenu = $_GET["id"];
} else {
    header("location:listeRevenus.php");
}

$revenu = recupererRevenu($idRevenu);
    
$nomRevenu = $revenu["nomRevenu"];
$gains = $revenu["gains"];
$date = $revenu["date"];
?>

<?php if(!empty($_GET["success"]) && $_GET["success"] == "suppression") 
{
    ?>
        <div class="alert alert-success mt-2">Le revenu a bien été supprimé <br>
            Vous allez être redirigé vers la liste des revenus <br>
            <a href="../admin/listeRevenus.php">Cliquez ici pour vous rediriger manuellement</a>
        </div>
    <?php
    header("refresh:3;../admin/listeRevenus.php");
}
?>  
        
<?php if (!empty($_GET["error"])) 
{
    ?>
    <div class="alert alert-danger mt-2">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'idRevenu"; ?>
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
<h2 class="display-4">Êtes vous sûr de vouloir supprimer le revenu n°<?=$idRevenu?> : <?=$nomRevenu?> ?</h2>

<form method="post" action="../traitements/supprimerRevenu.php?id=<?=$idRevenu;?>">
        <input type="hidden" name="idRevenu" value="<?=$idRevenu;?>"/>
<br>
        <div class="form-group text-center">
            <button type="submit" name="idRevenu" class="btn btn-outline-danger">Supprimer le revenu</button>       
            <a href="../admin/listeRevenus.php" class="btn btn-outline-secondary">Non, retourner à la liste</a>
        </div>
</form>
</div>

<?php
require_once "pied.php";

