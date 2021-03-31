<?php
require_once "entete.php";
$erreurs=0;

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $idDepense = $_GET["id"];
} else {
    header("location:listeCharges.php");
}

try{   
    // récupérer les infos de la catégorie
    $requete = getBDD()->prepare("SELECT * FROM depenses WHERE idDepense = ?");
    $requete->execute([$idDepense]);
    $depenses = $requete->fetch(PDO::FETCH_ASSOC);

} catch(Exception $e) {
    //gérer Les erreurs éventuelles
    $erreurs++;
    ?>
        <div class="alert alert-danger">
            Erreur la catégorie n'a pas pu être récupérée.<br>
            Vous allez être redirigé vers la liste des catégories<br>
            <a href="listeCharges.php">Cliquez ici pour une redirection manuelle</a>
        </div>
    <?php
}

if($erreurs === 0){
    if (isset($_POST["nomDepense"]) && !empty($_POST["nomDepense"])
    && isset($_POST["depense"]) && !empty($_POST["depense"]) 
    && isset($_POST["date"]) && !empty($_POST["date"]))
    {
        extract($_POST);
        try
        {   
        $requete = getBDD()->prepare("UPDATE depenses SET nomDepense = ?, depense=?, date=? WHERE idDepense = ?");
        $requete->execute([$nomDepense, $depense, $date, $idDepense]);
        $depenses = $requete->fetch(PDO::FETCH_ASSOC);

        ?>
        <div class="alert alert-success">
            La dépense <?=$depenses["nomDepense"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des charges<br>
            <a href="listeCharges.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php 
        header("refresh:5;listeCharges.php");
        

        } catch (Exception $e) {
        ?>
        <div class="alert alert-success">
            La dépense <?=$depenses["nomDepense"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des charges<br>
            <a href="listeCharges.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php
        }

    } else {
    ?>
    <h1> Modifier la dépense :</h1>
    <form method="post">
        <div class="form-group">
            <label for="nomDepense">Nom de la dépense :</label>
            <input type="text" class="form-control" name="nomDepense" id="nomDepense" placeholder="Saisissez le nom de la dépense"/>
        </div>
        <div class="form-group">
            <label for="depense">Somme à payer :</label>
            <input type="number" class="form-control" name="depense" id="depense" placeholder="Saisissez la somme à payer"/>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date"/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Confirmer la modification</button>
        </div>
    </form>
    <?php
    }
}
require_once "pied.php";
?>