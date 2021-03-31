<?php
require_once "entete.php";

try
{
    $requete = getBDD()->prepare("SELECT * FROM employes");
    $requete->execute();

    $secteurs=$requete->fetchAll(PDO::FETCH_ASSOC);
}
catch(Exception $e)
{
    ?>
    <div class ="alert alert-danger mt-3"> Erreur : le formulaire n'a pas été enregistré<br>
    <?php
}

// Vérification des données du formulaire
if (isset($_POST["nom"]) && !empty($_POST["nom"]) 
&& isset($_POST["prenom"]) && !empty($_POST["prenom"])
&& isset($_POST["poste"]) && !empty($_POST["poste"])
&& isset($_POST["salaire"]) && !empty($_POST["salaire"])
&& isset($_POST["secteur"]) && !empty($_POST["secteur"])
) {

// Récupération des données du formulaire dans des variables plus claires
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$poste = $_POST["poste"];
$salaire = $_POST["salaire"];
$secteur = $_POST["secteur"];

// Insertion des données
    try {
        creerEmploye($nom, $prenom, $poste, $salaire, $secteur);
        ?>
        
    <div class="alert alert-success">
            L'employé <?=$_POST["nom"];?> a bien été ajouté<br>
            Vous allez être redirigé vers la page d'accueil<br>
            <a href="index.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php
        header("refresh:3;index.php");
        // Si le try génère une erreur PHP, alors on entre dans le catch
    } catch (Exception $e) {
        ?>
        <div class ="alert alert-danger mt-3"> Erreur : le formulaire n'a pas été enregistré <br>
        <?php $e->getMessage(); ?>
    </div>
    <?php
    }
}
?>

<div class="container">
    <h1> Ajout d'un nouvel employé</h1>
    <form method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisissez le nom"/>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisissez le prenom"/>
        </div>
        <div class="form-group">
            <label for="poste">Poste</label>
            <input type="text" class="form-control" name="poste" id="poste" placeholder="Saisissez le poste"/>
        </div>
        <div class="form-group">
            <label for="salaire">Salaire mensuel</label>
            <input type="number" class="form-control" name="salaire" id="salaire" placeholder="Entrez le salaire mensuel"/>
        </div>
        <div class="form-group">
            <label for="secteur">Secteur</label>
            <select name="secteur" id="secteur" class="form-control">
            <?php
                try 
                {
                    $requete = getBDD()->prepare("SELECT * FROM secteurs");
                    $requete->execute();

                    $secteurs = $requete->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($secteurs as $secteur)
                    {
                        ?>
                        <option value="<?=$secteur["idSecteur"];?>">

                        <?=$secteur["domaine"];?>
                        </option>
                        <?php
                    }
                } catch (Exception $e)
                {
                    ?>
                    <div class ="alert alert-danger mt-3"> Erreur : le formulaire n'a pas été enrengistré<br>
                    <?php $e->getMessage(); ?>
                    <?php
                }
                ?>
                </select>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Ajouter l'employé</button>
        </div>
    </form>
</div>

<?php
require_once "pied.php";