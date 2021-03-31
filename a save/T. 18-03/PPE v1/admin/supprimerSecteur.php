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
    <title>supprimer secteur</title>
</head>
<body>

    <h2>Êtes vous sûr de vouloir supprimer le secteur n°<?=$idSecteur?>, <?=$domaine?></h2>

    <form method="post">
        <input type="hidden" name="idSecteur" value="<?=$idSecteur;?>"/>
        <button type="submit" name="idSecteur" class="btn btn-danger" 
        value="<?=$secteur["idSecteur"];?>">Supprimer le secteur</button>
        <a href="listeSecteurs.php" class="btn btn-secondary">Non, retourner à la liste des secteurs</a>
    </form>


</body>