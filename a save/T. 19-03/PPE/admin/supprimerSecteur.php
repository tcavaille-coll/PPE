<?php
require_once "entete.php";
if (!empty($_GET["success"]) && $_GET["success"] == "secteur") {?>
    <div class="alert alert-success">
        Le secteur n°<?=$_POST["idSecteur"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la liste des secteurs<br>
        <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
    </div>
    
<?php
}
?>
<?php switch ($_GET["error"]) {case "erreurid": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
            <?php break;?>
            <?php case "erreursuppr": ?>
            <?php echo "Une erreur s'est produite lors de la suppression"; ?>
            <?php break;?>
<?php }?>

<h2>Êtes vous sûr de vouloir supprimer le secteur n°<?=$idSecteur?>, <?=$domaine?></h2>

    <form method="post">
        <input type="hidden" name="idSecteur" value="<?=$idSecteur;?>"/>
        <button type="submit" name="idSecteur" class="btn btn-danger" 
        value="<?=$secteur["idSecteur"];?>">Supprimer le secteur</button>
        <a href="listeSecteurs.php" class="btn btn-secondary">Non, retourner à la liste des secteurs</a>
        
    </form>