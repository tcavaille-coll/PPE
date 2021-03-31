<?php
require_once "entete.php";

// Récupération de l'id du revenus depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idRevenu = $_GET["id"];
} 

// Redirecton vers la page d'acceuil si on a pas l'id du revenus
else {
    header("location:listeGains.php");
}

if (isset($_POST["idRevenu"]) && !empty($_POST["idRevenu"]))
{
    // Test de la suppression du revenus
    try
    {   
        $requete = getBDD()->prepare("DELETE FROM revenus WHERE idRevenu = ?");
        $requete->execute([$_POST["idRevenu"]]);

        $requete = getBDD()->prepare("UPDATE revenus SET idRevenu = NULL WHERE idRevenu = ?");
        $requete->execute([$_POST["idRevenu"]]);
        ?>

        <div class="alert alert-success">
            La catégorie n°<?=$_POST["idRevenu"];?> a bien été supprimé<br>
            Vous allez être redirigé vers la page d'acceuil<br>
            <a href="index.php">Cliquez ici si vous êtes impatient</a>
        </div>
    <?php   
    header("refresh:5;listeGains.php");

    // Gestion des erreurs éventuelles
    } catch(Exception $e) {
        ?>
        <div class="alert alert-danger">
            Erreur de suppression de la catégorie<br>
        </div>
        <?php
    }
} else {

$requete = getBDD()->prepare("SELECT idRevenu, nomRevenu FROM revenus WHERE idRevenu = ? LIMIT 1");
$requete->execute([$idRevenu]);
$revenus = $requete->fetch(PDO::FETCH_ASSOC);

$nomRevenu = $revenus["nomRevenu"];

?>

<h2>Êtes vous sûr de vouloir supprimer la catégorie n°<?=$idRevenu?>, <?=$nomRevenu?></h2>

<form method="post">
    <input type="hidden" name="idRevenu" value="<?=$idRevenu;?>"/>
    <button type="submit" name="idRevenu" class="btn btn-danger" 
    value="<?=$revenus["idRevenu"];?>">Supprimer la catégorie</button>
    <a href="index.php" class="btn btn-secondary">Non, retourner à l'acceuil</a>
</form>


<?php
}
require_once "pied.php";
?>

