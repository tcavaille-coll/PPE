<?php
require_once "../gains/header.php";
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

    <h2>Êtes vous sûr de vouloir supprimer la catégorie n°<?=$idRevenu?>, <?=$nomRevenu?></h2>

    <form method="post">
        <input type="hidden" name="idRevenu" value="<?=$idRevenu;?>"/>
        <button type="submit" name="idRevenu" class="btn btn-danger" 
        value="<?=$revenus["idRevenu"];?>">Supprimer la catégorie</button>
        <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
    </form>


    

</body>