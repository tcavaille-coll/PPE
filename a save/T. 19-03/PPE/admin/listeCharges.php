<?php
require_once "../admin/entete.php";
require_once "../modeles/modele.php";

$depenses=listeDepenses();

?>

<h1> Liste des charges : </h1>

<ul class="list-group">
    <?php
    foreach($depenses as $depense)
    {
        $depense["date"]=list($annee,$mois,$jour)=explode('-',$depense['date']);
        $date = $jour.'/'.$mois.'/'.$annee;
        ?>
        
        <li class="list-group-item">
            Libellé de la charge : <?=$depense["nomDepense"]?>
        </li>
        <li class="list-group-item">
            Montant de la charge : <?=$depense["depense"]?> €
        </li>
        <li class="list-group-item">
            A payer avant le <?=$date;?>
        </li>

        <span style="float:right">
            <a href="../traitement/modifierCharge.php?id=<?=$depense["idDepense"];?>" class="btn btn-warning btn-sm">Modifier</a>
            <a href="../traitements/supprimerCharge.php?id=<?=$depense["idDepense"];?>" class="btn btn-danger btn-sm">Payer</a>
        </span>
        
        <?php
    }
    ?>

</ul>

