<?php
require_once "entete.php";
require_once "../modeles/modele.php";

$employes=listeUtilisateur();

?>
<h1> Liste des employés : </h1>

<ul class="list-group">
<div class="container-fluid">
<div class="row">
    
<?php
foreach($employes as $employe)
{
?>
        
    <div class="col-8 col-md-9 mb-4">
        
    <li class="list-group-item">Nom : <?=$employe["nom"]?></li>
    <li class="list-group-item">Prénom : <?=$employe["prenom"]?></li>
    <li class="list-group-item">Poste : <?=$employe["poste"]?></li>
    <li class="list-group-item">Salaire mensuel brut: <?=$employe["salaire"]?>€</li>
    <li class="list-group-item">Secteur : <?=$employe["domaine"]?></li>
    </div>

        
    <div class="float-right mb-4">

    <a href="modifierEmploye.php?id=<?=$employe["idEmploye"];?>" class="btn btn-outline-primary w-100 p-2 h-50" id="bouton">Modifier</a>
    <br>
    <a href="supprimerEmploye.php?id=<?=$employe["idEmploye"];?>" class="btn btn-outline-danger w-100 p-2 h-50" id="bouton">Supprimer</a>

    </div>
        
    <?php
}
    ?>
</div>
</div>
</ul>




