<?php
require_once "../charges/header.php";
$articles = suppCharges();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer la charge</title>
</head>
<body>
    <h2>Êtes vous sûr de vouloir supprimer la catégorie n°<?=$idDepense?></h2>

    <form method="post">
        <input type="hidden" name="idDepense" value="<?=$idDepense;?>"/>
        <button type="submit" name="idDepense" class="btn btn-danger" 
        value="<?=$depenses["idDepense"];?>">Supprimer la catégorie</button>
        <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
    </form>
    <?php switch ($_GET["error"]) {case "depensid": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
                <?php break;?>
            <?php case "depense": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de la dépense"; ?>
                <?php break;?>
            <?php case "depensenom": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du nom de la dépense"; ?>
                <?php break;?>
            <?php case "depensedate": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de la date de la dépense"; ?>
                <?php break;?>
        <?php }?>
</body>