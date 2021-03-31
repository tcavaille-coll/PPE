<?php
require_once "entete.php";
$erreurs=0;

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $idRevenu = $_GET["id"];
} else {
    header("location:listeGains.php");
}

try{   
    // récupérer les infos de la catégorie
    $requete = getBDD()->prepare("SELECT * FROM revenus WHERE idRevenu = ?");
    $requete->execute([$idRevenu]);
    $revenus = $requete->fetch(PDO::FETCH_ASSOC);

} catch(Exception $e) {
    //gérer Les erreurs éventuelles
    $erreurs++;
    ?>
        <div class="alert alert-danger">
            Erreur la catégorie n'a pas pu être récupérée.<br>
            Vous allez être redirigé vers la liste des catégories<br>
            <a href="listeGains.php">Cliquez ici si vous ne voulez pas attendre</a>
        </div>
    <?php
}

if($erreurs === 0){
    if (isset($_POST["nomRevenu"]) && !empty($_POST["nomRevenu"])
    && isset($_POST["gains"]) && !empty($_POST["gains"]) 
    && isset($_POST["date"]) && !empty($_POST["date"]))
    {
        extract($_POST);
        try
        {   
        $requete = getBDD()->prepare("UPDATE revenus SET nomRevenu = ?, gains=?, date=? WHERE idRevenu = ?");
        $requete->execute([$nomRevenu, $gains, $date, $idRevenu]);
        $revenus = $requete->fetch(PDO::FETCH_ASSOC);

        ?>
        <div class="alert alert-success">
            La catégorie <?=$revenus["nomRevenu"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des catégories<br>
            <a href="listeGains.php">Cliquez ici si vous êtes impatient</a>
        </div>
        <?php 
        header("refresh:5;listeGains.php");
        

        } catch (Exception $e) {
        ?>
        <div class="alert alert-success">
            La catégorie <?=$revenus["nomRevenu"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des catégories<br>
            <a href="listeGains.php">Cliquez ici si vous êtes impatient</a>
        </div>
        <?php
        }

    } else {
    ?>
    <h1> Ajout d'un nouveau gain</h1>
    <form method="post">
        <div class="form-group">
            <label for="nomRevenu">nom de la dépense</label>
            <input type="text" class="form-control" name="nomRevenu" id="nomRevenu" placeholder="Saisissez le gain à payé" value="<?=$revenus['nomRevenu'];?>"/>
        </div>
        <div class="form-group">
            <label for="gains">somme gagner</label>
            <input type="number" class="form-control" name="gains" id="gains" placeholder="Saisissez la somme gagner" value="<?=$revenus['gains'];?>"/>
        </div>
        <div class="form-group">
            <label for="date">date</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date" value="<?=$revenus['date'];?>"/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Ajouter la catégorie</button>
        </div>
    </form>
    <?php
    }
}
require_once "pied.php";
?>