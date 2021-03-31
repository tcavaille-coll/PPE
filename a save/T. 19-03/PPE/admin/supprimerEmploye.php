<?php
require_once "entete.php";
?>

<?php if (!empty($_GET["success"]) && $_GET["success"] == "utilisateur") {?>
    
    <div class="alert alert-success">
        L'employé n°<?=$idUtilisateur;?> a bien été supprimé<br>
        Vous allez être redirigé vers la liste des employés<br>
        <a href="listeEmployes.php">Cliquez ici pour une redirection manuelle</a>
    </div>  
<?php
}
?>
<?php switch ($_GET["error"]) {case "erreurid": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
            <?php break;?>
            <?php case "erreursuppr": ?>
            <?php echo "Une erreur s'est produite lors de la suppression"; ?>
            <?php break;?>
    <?php }?>
<h2>Êtes vous sûr de vouloir supprimer l'employé <?=$_POST["nom"];?>, <?=$_POST["prenom"];?></h2>
<form method="post">
        <button type="submit" name="idEmploye" class="btn btn-danger">Supprimer l'employé</button>

        <a href="listeEmployes.php" class="btn btn-secondary">Non, retourner à la liste des employés</a>
    </form>