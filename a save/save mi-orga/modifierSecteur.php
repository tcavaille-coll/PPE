<?php
require_once "entete.php";
$erreurs=0;

if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idSecteur = $_GET["id"];
} 
else 
{
    header("location:listeSecteurs.php");
}
try
{   
    $requete = getBDD()->prepare("SELECT * FROM secteurs WHERE idSecteur = ? LIMIT 1");
    $requete->execute([$idSecteur]);
    $secteur = $requete->fetch(PDO::FETCH_ASSOC);

    $domaine = $secteur["domaine"];

}   catch(Exception $e) {
    $erreurs++;
    ?>

    <div class="alert alert-danger">
        Erreur de modification du secteur<br>
    </div>
    <?php
}

if($erreurs === 0)
{
    if(!empty($_POST["domaine"]) && !empty($_POST["budget"]))
    {
        try
        {   
        $requete = getBDD()->prepare("UPDATE secteurs SET domaine = ?, budget = ? WHERE idSecteur = ?");
        $requete->execute([$_POST["domaine"], $_POST["budget"], $idSecteur]);
        $secteur = $requete->fetch(PDO::FETCH_ASSOC);

        ?>
        <div class="alert alert-success">
            Le secteur <?=$secteur["domaine"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des secteurs<br>
            <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php 
        header("refresh:5;listeSecteurs.php");
        

        } catch (Exception $e) {
        ?>
        <div class="alert alert-success">
            Le secteur <?=$secteur["domaine"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des secteurs<br>
            <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php
        header("refresh:5;listeSecteurs.php");
        }

    } else {
    ?>
    <h2>Modification du secteur n°<?=$idSecteur;?>, <?=$domaine;?></h2>
        <form method="post">
            <div class="form-group">
                <label for="domaine">Libellé :</label>
                <input type="text" class="form-control" name="domaine" id="domaine" placeholder="Saisissez le nouveau libellé" 
                value="<?= gererGuillemets($secteur["domaine"]);?>"/>
                <label for="budget">Budget :</label>
                <input type="text" class="form-control" name="budget" id="budget" placeholder="Saisissez le nouveau budget" 
                value="<?=($secteur["budget"]);?>"/>
            </div>
        
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Modifier le secteur</button>
            </div>
        </form>
    <?php
}
}
require_once "pied.php";
?>