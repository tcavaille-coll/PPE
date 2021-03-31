<?php
require_once "entete.php";

if (!empty($_GET["id"]))
{
    $idSecteur = $_GET["id"];
} else {
    header("location:listeSecteurs.php");
}

$secteur = recupererSecteur($idSecteur);
$domaine = $secteur["domaine"];
$budget = $secteur["budget"];
?>




<?php if(!empty($_GET["success"]) && $_GET["success"] == "suppression") 
{
    ?>
    <div class="alert alert-success">
            Le secteur n°<?=$idSecteur;?> a bien été supprimé<br>
            Vous allez être redirigé vers la liste des secteurs<br>
            <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        
<?php
    header("refresh:3;../admin/listeSecteurs.php");

}
?>
    
<?php if (!empty($_GET["error"])) 
{
    ?>
    <p style="color:red">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'idSecteur"; ?>
            <?php break;?>
        <?php case "erreursuppression": ?>
            <?php echo "Une erreur s'est produite lors de la suppression"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </p>
<?php 
}
?>
<h2>Êtes vous sûr de vouloir supprimer le secteur n°<?=$idSecteur;?>, <?=$domaine;?></h2>
    <form method="post" action="../traitements/supprimerSecteur.php?id=<?=$idSecteur;?>">
            <input type="hidden" name="idSecteur" value="<?=$idSecteur;?>"/>

            <div class="form-group text-center">
                <button type="submit" name="idSecteur" class="btn btn-outline-danger">Supprimer le secteur</button>       
                <a href="listeSecteurs.php" class="btn btn-outline-secondary">Non, retourner à la liste</a>
            </div>
    </form>

<?php
require_once "pied.php";