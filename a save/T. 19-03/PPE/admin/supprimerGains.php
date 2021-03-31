<?php
require_once "entete.php";
?>

<?php if (!empty($_GET["success"]) && $_GET["success"] == "revenu") {?>
    <div class="alert alert-success">
        La revenu <?=$_POST["nomRevenu"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la page d'acceuil<br>
        <a href="index.php">Cliquez ici pour une redirection manuelle</a>
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

<h2>Êtes vous sûr de vouloir supprimer la revenu  <?=$_POST["nomRevenu"]?></h2>
<form method="post">
        <input type="hidden" name="idRevenu" value="<?=$idRevenu;?>"/>
        <button type="submit" name="idRevenu" class="btn btn-danger">Supprimer le revenu</button>
        <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
        
</form>