<?php
require_once "entete.php";

if (!empty($_GET["id"]))
{
    $idEmploye = $_GET["id"];
} else {
    header("location:/admin/listeEmployes.php");
}

$employe = recupererUtilisateur($idEmploye);
$nom = $employe["nom"];
$prenom = $employe["prenom"];
?>


<div class="container">
<h2>Êtes vous sûr de vouloir supprimer l'employé n°<?=$idEmploye?> : <?=$nom?> <?=$prenom?></h2>

<?php if(!empty($_GET["success"]) && $_GET["success"] == "suppression") 
{
    ?>
    <p style="color:green">L'employé à bien été supprimé</p>
<?php
    header("refresh:5;listeEmployes.php");

}
?>
    
<?php if (!empty($_GET["error"])) 
{
    ?>
    <p style="color:red">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'idEmploye"; ?>
            <?php break;?>
        <?php case "erreursuppression": ?>
            <?php echo "Une erreur s'est produite lors de la suppression"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </p>
<?php 
}
?>

    <form method="post" action="../traitements/supprimerEmploye.php?id=<?=$idEmploye;?>">
        <input type="hidden" name="idEmploye" value="<?=$idEmploye;?>"/>

        <div class="form-group text-center">
            <button type="submit" name="idEmploye" class="btn btn-outline-danger">Supprimer l'employé</button>       
            <a href="listeEmployes.php" class="btn btn-outline-secondary">Non</a>
        </div>
    </form>
</div>

<?php
require_once "pied.php";