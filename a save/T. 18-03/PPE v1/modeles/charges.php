<?php
function suppCharges(){   
    $idDepense = $_GET["id"];
    $requete = getBDD()->prepare("DELETE FROM depenses WHERE idDepense = ?");
    $requete->execute([$_POST["idDepense"]]);

    $requete = getBDD()->prepare("UPDATE depenses SET idDepense = NULL WHERE idDepense = ?");
    $requete->execute([$_POST["idDepense"]]);
    ?>

    <div class="alert alert-success">
        La catégorie n°<?=$_POST["idDepense"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la page d'acceuil<br>
        <a href="index.php">Cliquez ici pour une redirection manuelle</a>
    </div>
<?php   
header("refresh:5;listeCharges.php");

// Gestion des erreurs éventuelles
} 
function listCharge(){
    $requete = getBDD()->prepare("SELECT idDepense, nomDepense, depense, date FROM depenses");
    $requete->execute();
    $depenses = $requete->fetchAll(PDO::FETCH_ASSOC);

}