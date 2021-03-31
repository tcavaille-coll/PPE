<?php
require_once "../traitements/entete.php";
$utilisateur = suppEmploye();
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
<?php if (!empty($_GET["success"]) && $_GET["success"] == "utilisateur") {?>
    <h2>Êtes vous sûr de vouloir supprimer l'employé n°<?=$idEmploye?>, <?=$nom?>, <?=$prenom?></h2>

    <form method="post">
        <input type="hidden" name="idEmploye" value="<?=$idEmploye;?>"/>

        <button type="submit" name="idEmploye" class="btn btn-danger" 
        value="<?=$secteur["idEmploye"];?>">Supprimer l'employé</button>

        <a href="listeEmployes.php" class="btn btn-secondary">Non, retourner à la liste des employés</a>
    </form>
<?php
}
?>
<?php switch ($_GET["error"]) {case "employeid": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
                <?php break;?>
            <?php case "employenom": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du nom"; ?>
                <?php break;?>
            <?php case "employeprenom": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du prénom"; ?>
                <?php break;?>
            <?php case "employeposte": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du poste"; ?>
                <?php break;?>
            <?php case "employeidSecteur": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id Secteur"; ?>
                <?php break;?>
            <?php case "employeidentifiant": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'identifiant"; ?>
                <?php break;?>
            <?php case "employemdp": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du mots de passe"; ?>
                <?php break;?>
            <?php case "employeidRole": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id role"; ?>
                <?php break;?>
            <?php case "employesalaire": ?>
                <?php echo "Une erreur s'est produite lors de la récupération du salaire"; ?>
                <?php break;?>
        <?php }?>



</body>