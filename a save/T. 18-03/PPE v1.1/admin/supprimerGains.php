<?php
require_once "../traitements/entete.php";
$gain = suppGain();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer employé</title>
</head>
<body>

<?php if (!empty($_GET["success"]) && $_GET["success"] == "revenu") {?>
    <h2>Êtes vous sûr de vouloir supprimer la catégorie n°<?=$idRevenu?>, <?=$nomRevenu?></h2>

    <form method="post">
        <input type="hidden" name="idRevenu" value="<?=$idRevenu;?>"/>
        <button type="submit" name="idRevenu" class="btn btn-danger" 
        value="<?=$revenus["idRevenu"];?>">Supprimer la catégorie</button>
        <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
    </form>
<?php
}
?>
<?php switch ($_GET["error"]) {case "gainid": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
                <?php break;?>
            <?php case "gainom": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du nom du gain"; ?>
                <?php break;?>
            <?php case "gain": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du gain"; ?>
                <?php break;?>
            <?php case "gaindate": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de la date du gain"; ?>
                <?php break;?>
        <?php }?>

    

</body>