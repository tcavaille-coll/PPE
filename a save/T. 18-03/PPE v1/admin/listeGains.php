<?php
require_once "entete.php";

$requete = getBDD()->prepare("SELECT * FROM revenus");
$requete->execute();
$revenus = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<h1> Liste des gains : </h1>

<ul class="list-group">
<div class="container-fluid">
<div class="row">

<?php

foreach($revenus as $revenu){
    $revenu["date"]=list($annee,$mois,$jour)=explode('-',$revenu['date']);
    $date = $jour.'/'.$mois.'/'.$annee;
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
        <div class="float-right mb-4" style="height:148px">
            <a href="modifierGains.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-outline-primary w-100 p-1 h-50" id="bouton2">Modifier</a>
            <br>
            <a href="supprimerGains.php?id=<?=$revenu["idRevenu"];?>" class="btn btn-outline-danger w-100 p-1 h-50" id="bouton2">Supprimer</a>
        </div>
        
        <?php
}
?>
</div>
</div>
</ul>
<?php
require_once "pied.php";
