<?php
require_once "../employe/header.php";
$articles = suppCharges();
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
    <h2>Êtes vous sûr de vouloir supprimer l'employé n°<?=$idEmploye?>, <?=$nom?>, <?=$prenom?></h2>

    <form method="post">
        <input type="hidden" name="idEmploye" value="<?=$idEmploye;?>"/>

        <button type="submit" name="idEmploye" class="btn btn-danger" 
        value="<?=$secteur["idEmploye"];?>">Supprimer l'employé</button>

        <a href="listeEmployes.php" class="btn btn-secondary">Non, retourner à la liste des employés</a>
    </form>



</body>