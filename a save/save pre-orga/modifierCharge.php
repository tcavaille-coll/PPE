<?php
require_once "entete.php";

// Récupération de l'id du produit depuis l'URL
if (!empty($_GET["id"])) 
{
    $idDepense = $_GET["id"];
} 

// Redirecton vers la page d'acceuil si on a pas l'id du produit
else {
    header("location:index.php");
}

// Vérification du formulaire
if (!empty($_POST["nomDepense"]) && !empty($_POST["depense"]) && !empty($_POST["date"]))
{
    try
    {   // Test de la mise à jour du produit
        $requete = getBDD()->prepare("UPDATE depenses SET nomDepense=?, depense=?, date=? 
        WHERE idDepense = ?");
        $requete->execute([$nomDepense, $depense, $date, $idDepense]);
        ?>

        <div class="alert alert-success">
            La dépense : <?=$depenses["nomDepense"];?> a bien été modifiée<br>
            Vous allez être redirigé vers la liste des charges<br>
            <a href="listeCharges.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php   
        header("refresh:5;listeEmployes.php");
    } catch(Exception $e) {
        // Gestion des erreurs éventuelles
        ?>

        <div class="alert alert-danger">
            Erreur de modification des informations de la charge<br>
        </div>

        <?php
    }
}

$requete = getBDD()->prepare("SELECT * FROM depenses WHERE idDepense = ?");
$requete->execute([$idDepense]);
$depense = $requete->fetch(PDO::FETCH_ASSOC);

$nomDepense = $depense["nomDepense"];
?>

<h1>Modification des informations de la charge n°<?=$idDepense;?>, <?=$nomDepense;?></h1>
<form method="post">
        <div class="form-group">
            <label for="nomDepense">Nom de la dépense :</label>
            <input type="text" class="form-control" name="nomDepense" id="nomDepense" placeholder="Saisissez le nom de la dépense" value="<?=$depense["nomDepense"];?>"/>
        </div>
        <div class="form-group">
            <label for="depense">Somme à payer :</label>
            <input type="number" class="form-control" name="depense" id="depense" placeholder="Saisissez la somme à payer" value="<?=$depense["depense"];?>"/>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date" value="<?=$depense["date"];?>"/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Confirmer la modification</button>
        </div>
    </form>
<?php
require_once "pied.php";
?>