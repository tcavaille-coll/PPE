<?php
require_once "entete.php";


if (isset($_POST["domaine"]) && !empty($_POST["domaine"]))
{
    $domaine = $_POST["domaine"];
    $budget = 0;

    try  catch (Exception $e) {
        ?>
        <div class ="alert alert-danger mt-3"> Erreur : le secteur n'a pas été enrengistré<br>
        </div>
        <?php
    }
}

?>
<h1> Ajout d'un nouveau secteur :</h1>
<form method="post">
    <div class="form-group">
        <label for="domaine"></label>
        <input type="text" class="form-control" name="domaine" id="domaine" placeholder="Saisissez le libellé du nouveau secteur"/>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Ajouter le secteur</button>
    </div>
</form>

<?php



?>

<h1> Liste des secteurs : </h1>
<label></label>
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



<?php
require_once "pied.php";