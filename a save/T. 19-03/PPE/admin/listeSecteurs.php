<?php
require_once "entete.php";
require_once "../modeles/modele.php";
$secteurs=listeSecteur();
?>

<h1> Liste des secteurs : </h1>
<ul class="list-group">
    <?php
    foreach($secteurs as $secteur)
    {
        ?>
        <li class="list-group-item">Id : <?=$secteur["idSecteur"]?></li>
        <li class="list-group-item">Libellé : <?=$secteur["domaine"]?></li>
        <li class="list-group-item">Budget : <?=$secteur["budget"]?>%</li>
        

        <span style="float:right">
            <a href="modifierSecteur.php?id=<?=$secteur["idSecteur"];?>" class="btn btn-primary btn-sm">Modifier</a>
            <a href="supprimerSecteur.php?id=<?=$secteur["idSecteur"];?>" class="btn btn-danger btn-sm">Supprimer</a>
        </span>
        
    <?php
    }
    ?>
</ul>


