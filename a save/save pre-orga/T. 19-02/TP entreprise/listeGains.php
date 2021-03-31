<?php
require_once "entete.php";

$requete = getBDD()->prepare("SELECT * FROM revenus");
$requete->execute();
$revenus = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<h1> Liste des catégories : </h1>

<ul class="list-group">
    <?php
foreach($revenus as $revenu){
    ?>
        <li class="list-group-item">
            <?=$revenu["nomRevenu"] . " " . " " . $revenu["gains"] . "€ " . $revenu["date"];?></li>
            <span style="float:right">
                <a href="corrigerGains.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-warning btn-sm">Corriger</a>
                <a href="supprimerGains.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-danger btn-sm">Annuler</a>
            </span>
        </li>
        <?php
}
?>
</ul>
<?php
require_once "pied.php";
?>
