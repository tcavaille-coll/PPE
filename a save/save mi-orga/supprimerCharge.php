<?php
require_once "entete.php";

// Récupération de l'id du depenses depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idDepense = $_GET["id"];
} 

// Redirecton vers la page d'acceuil si on a pas l'id du depenses
else {
    header("location:listeCharges.php");
}

if (isset($_POST["idDepense"]) && !empty($_POST["idDepense"]))
{
    // Test de la suppression du depenses
    try
    {   
        $requete = getBDD()->prepare("DELETE FROM depenses WHERE idDepense = ?");
        $requete->execute([$_POST["idDepense"]]);

        $requete = getBDD()->prepare("UPDATE depenses SET idDepense = NULL WHERE idDepense = ?");
        $requete->execute([$_POST["idDepense"]]);
        ?>

        <div class="alert alert-success">
            La catégorie n°<?=$_POST["idDepense"];?> a bien été supprimé<br>
            Vous allez être redirigé vers la page d'acceuil<br>
            <a href="index.php">Cliquez ici si vous êtes impatient</a>
        </div>
    <?php   
    header("refresh:5;listeCharges.php");

    // Gestion des erreurs éventuelles
    } catch(Exception $e) {
        ?>
        <div class="alert alert-danger">
            Erreur de suppression de la catégorie<br>
        </div>
        <?php
    }
} else {

$requete = getBDD()->prepare("SELECT idDepense FROM depenses WHERE idDepense = ? LIMIT 1");
$requete->execute([$idDepense]);
$depenses = $requete->fetch(PDO::FETCH_ASSOC);

?>

<h2>Êtes vous sûr de vouloir supprimer la catégorie n°<?=$idDepense?></h2>

<form method="post">
    <input type="hidden" name="idDepense" value="<?=$idDepense;?>"/>
    <button type="submit" name="idDepense" class="btn btn-danger" 
    value="<?=$depenses["idDepense"];?>">Supprimer la catégorie</button>
    <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
</form>


<?php
}
require_once "pied.php";
?>

