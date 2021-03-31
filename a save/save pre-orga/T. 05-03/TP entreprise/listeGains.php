<?php
require_once "entete.php";

$requete = getBDD()->prepare("SELECT * FROM revenus");
$requete->execute();
$revenus = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<h1> Liste des gains : </h1>

<ul class="list-group">
    <?php
foreach($revenus as $revenu){
    $revenu["date"]=list($annee,$mois,$jour)=explode('-',$revenu['date']);
        $date = $jour.'-'.$mois.'-'.$annee;
    ?>
       <div class="col-8 col-md-9 mb-4">
            <li class="list-group-item">
                <?= "Nom: " . $revenu["nomRevenu"]?>
            </li>
            <li class="list-group-item">
                <?= "Gains: " . $revenu["gains"]. "€ ";?>
            </li>
            <li class="list-group-item">
                <?= "Date: " .  $date;?>
            </li>
        </div>
        <div class="col-10 offset-9">
            <a href="modifierGains.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-outline-primary w-40 p-1 h-30" id="bouton">Modifier</a>
            <br>
            <a href="supprimerGains.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-outline-danger w-20 p-1 h-30" id="bouton">Supprimer</a>
        </div>
        
        <?php
}
?>
</ul>
<?php
require_once "pied.php";
