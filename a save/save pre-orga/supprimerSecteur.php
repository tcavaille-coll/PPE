<?php
require_once "entete.php";

// Récupération de l'id du produit depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idSecteur = $_GET["id"];
} 

else {
    header("location:listeSecteurs.php");
}

if (isset($_POST["idSecteur"]) && !empty($_POST["idSecteur"]))
{
    try
    {   
        $requete = getBDD()->prepare("DELETE FROM secteurs WHERE idSecteur = ?");
        $requete->execute([$_POST["idSecteur"]]);

        $requete = getBDD()->prepare("UPDATE employes SET idSecteur = NULL WHERE idSecteur = ?");
        $requete->execute([$_POST["idSecteur"]]);

        ?>

        <div class="alert alert-success">
            Le secteur n°<?=$_POST["idSecteur"];?> a bien été supprimé<br>
            Vous allez être redirigé vers la liste des secteurs<br>
            <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
        </div>
    <?php   
    header("refresh:5;listeSecteurs.php");

    // Gestion des erreurs éventuelles
    } catch(Exception $e) {
        ?>
        <div class="alert alert-danger">
            Erreur de suppression du secteur<br>
        </div>
        <?php
        header("refresh:3;listeSecteurs.php");
    }
} else {

$requete = getBDD()->prepare("SELECT idSecteur, domaine FROM secteurs WHERE idSecteur = ? LIMIT 1");
$requete->execute([$idSecteur]);
$secteur = $requete->fetch(PDO::FETCH_ASSOC);

$domaine = $secteur["domaine"];
?>

<h2>Êtes vous sûr de vouloir supprimer le secteur n°<?=$idSecteur?>, <?=$domaine?></h2>

<form method="post">
    <input type="hidden" name="idSecteur" value="<?=$idSecteur;?>"/>
    <button type="submit" name="idSecteur" class="btn btn-danger" 
    value="<?=$secteur["idSecteur"];?>">Supprimer le secteur</button>
    <a href="listeSecteurs.php" class="btn btn-secondary">Non, retourner à la liste des secteurs</a>
</form>


<?php
}
require_once "pied.php";
?>
