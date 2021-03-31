<?php
require_once "entete.php";

if (!empty($_GET["success"]) && $_GET["success"] == "charge") {?>
    <div class="alert alert-success">
        La charge <?=$_POST["nomDepense"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la page d'acceuil<br>
        <a href="index.php">Cliquez ici si vous êtes impatient</a>
    </div>


<?php
}?>
    <?php switch ($_GET["error"]) {case "erreurid": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
                <?php break;?>
            <?php case "erreursuppr": ?>
                <?php echo "Une erreur s'est produite lors de la suppression"; ?>
                <?php break;?>
    <?php }?>

<h2>Êtes vous sûr de vouloir supprimer la dépense</h2>
<form method="post">
        <input type="hidden" name="idDepense" value="<?=$idDepense;?>"/>
        <button type="submit" name="idDepense" class="btn btn-danger" 
        value="<?=$depenses["idDepense"];?>">Supprimer la dépense</button>
        <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
</form>