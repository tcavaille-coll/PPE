<?php
require_once "../admin/entete.php";

if (!empty($_GET["id"]))
{
    $idSecteur = $_GET["id"];
} else {
    header("location:/admin/listeSecteurs.php");
}

$secteur = recupererSecteur($idSecteur);
$domaine = $secteur["domaine"];
$budget = $secteur["budget"];
?>

<div class="container">

<?php if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <p style="color:green">Le secteur <?=$domaine;?> à bien été ajouté</p>
    <?php
}
?>
    
<?php if (!empty($_GET["error"])) 
{
    ?>
    <p style="color:red">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Au moins un des champs est vide"; ?>
            <?php break;?>
        <?php case "erreurajout": ?>
            <?php echo "Une erreur s'est produite lors de l'ajout"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </p>
<?php 
}
?>

<h1>Ajout d'un nouveau secteur</h1>
<form method="post" action="/traitements/ajoutSecteur.php">
    <div class="form-group">
        <label for="domaine">Nom du secteur :</label>
        <input type="text" class="form-control" name="domaine" id="domaine" placeholder="Saisissez le nom du secteur"/>
    </div>
    <div class="form-group">
        <label for="budget">Budget alloué :</label>
        <input type="number" class="form-control" name="budget" id="budget" placeholder="Saisissez le budget alloué"/>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-outline-primary">Ajouter le secteur</button>
        <a href="listeSecteurs.php" class="btn btn-outline-danger">Annuler</a>
    </div>
</form>

<?php
require_once "pied.php";