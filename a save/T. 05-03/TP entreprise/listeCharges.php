<?php
require_once "entete.php";

$requete = getBDD()->prepare("SELECT * FROM depenses");
$requete->execute();
$depenses = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<h1> Liste des charges : </h1>

<ul class="list-group">
    <?php
foreach($depenses as $depense){
    ?>
        <li class="list-group-item">
            <?=$depense["nomDepense"] . " " . " " . $depense["depense"] . "€ " . $depense["date"];?></li>
            <span style="float:right">
                <a href="modifierCharge.php?id=<?=$depense["idDepense"];?>" class="btn btn-warning btn-sm">Modifier</a>
                <a href="supprimerCharge.php?id=<?=$depense["idDepense"];?>" class="btn btn-danger btn-sm">Payer</a>
            </span>
        </li>
        <?php
}
?>
</ul>
<?php
require_once "pied.php";
?>
