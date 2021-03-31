<?php
require_once "entete.php";
$erreurs=0;

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $idRevenu = $_GET["id"];
} else {
    header("location:listeGains.php");
}

try{   
    // récupérer les infos du gains
    $requete = getBDD()->prepare("SELECT * FROM revenus WHERE idRevenu = ?");
    $requete->execute([$idRevenu]);
    $revenus = $requete->fetch(PDO::FETCH_ASSOC);

} catch(Exception $e) {
    //gérer Les erreurs éventuelles
    $erreurs++;
    ?>
        <div class="alert alert-danger">
            Erreur de l'enregistrement du gains
        </div>
    <?php
}


if (isset($_POST["nomRevenu"]) && !empty($_POST["nomRevenu"])
&& isset($_POST["gains"]) && !empty($_POST["gains"]) 
&& isset($_POST["date"]) && !empty($_POST["date"]))
{
        extract($_POST);
        try
        {   
        $requete = getBDD()->prepare("UPDATE revenus SET nomRevenu = ?, gains=?, date=? WHERE idRevenu = ?");
        $requete->execute([$nomRevenu, $gains, $date, $idRevenu]);
        ?>
        <div class="alert alert-success">
            La gain <?=$revenus["nomRevenu"];?> a bien été modifié<br>
            Vous allez être redirigé vers la liste des gains<br>
            <a href="listeGains.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php 
        header("refresh:5;listeGains.php");
        

        } catch (Exception $e) {
        ?>
        <div class="alert alert-danger">
            Erreur de modification des informations de l'employé<br>
            <?= $e->getMessage()?>
        </div>

        <?php
        header("refresh:5;listeGains.php");
        }

}
    ?>
    <h1> Modification du revenu</h1>
    <form method="post">
        <div class="form-group">
            <label for="nomRevenu">Libellé du revenu :</label>
            <input type="text" class="form-control" name="nomRevenu" id="nomRevenu" placeholder="Saisissez le libellé du revenu" value="<?=$revenus['nomRevenu'];?>"/>
        </div>
        <div class="form-group">
            <label for="gains">Somme gagnée :</label>
            <input type="number" class="form-control" name="gains" id="gains" placeholder="Saisissez la somme gagnée" value="<?=$revenus['gains'];?>"/>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date" value="<?=$revenus['date'];?>"/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Modifier le revenu</button>
        </div>
    </form>

    <?php

require_once "pied.php";
?>