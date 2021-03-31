<?php
require_once "entete.php";

// Récupération de l'id du produit depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idEmploye = $_GET["id"];
} 

else {
    header("location:listeEmployes.php");
}

if (isset($_POST["idEmploye"]) && !empty($_POST["idEmploye"]))
{
    try
    {   
        $requete = getBDD()->prepare("DELETE FROM employes WHERE idEmploye = ?");
        $requete->execute([$_POST["idEmploye"]]);
        ?>

        <div class="alert alert-success">
            L'employé n°<?=$_POST["idEmploye"];?> a bien été supprimé<br>
            Vous allez être redirigé vers la liste des employés<br>
            <a href="listeEmployes.php">Cliquez ici pour une redirection manuelle</a>
        </div>
    <?php   
    header("refresh:5;listeEmployes.php");

    // Gestion des erreurs éventuelles
    } catch(Exception $e) {
        ?>
        <div class="alert alert-danger">
            Erreur de suppression de l'employé<br>
        </div>
        <?php
        header("refresh:3;listeEmployes.php");
    }
} else {

$requete = getBDD()->prepare("SELECT idEmploye, nom, prenom FROM employes WHERE idEmploye = ? LIMIT 1");
$requete->execute([$idEmploye]);
$secteur = $requete->fetch(PDO::FETCH_ASSOC);

$nom = $secteur["nom"];
$prenom = $secteur["prenom"];
?>

<h2>Êtes vous sûr de vouloir supprimer l'employé n°<?=$idEmploye?>, <?=$nom?>, <?=$prenom?></h2>

<form method="post">
    <input type="hidden" name="idEmploye" value="<?=$idEmploye;?>"/>

    <button type="submit" name="idEmploye" class="btn btn-danger" 
    value="<?=$secteur["idEmploye"];?>">Supprimer l'employé</button>

    <a href="listeEmployes.php" class="btn btn-secondary">Non, retourner à la liste des employés</a>
</form>


<?php
}
require_once "pied.php";
?>
