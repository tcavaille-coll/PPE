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
&& isset($_POST["idSecteur"]) && !empty($_POST["idSecteur"])
) {

// Récupération des données du formulaire dans des variables plus claires
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$poste = $_POST["poste"];
$salaire = $_POST["salaire"];
$idSecteur = $_POST["idSecteur"];

// Insertion des données
    try {
        $requete = getBDD()->prepare("INSERT INTO employes(nom, prenom, poste, salaire, idSecteur)
        VALUES(?, ?, ?, ?, ?)");
        $requete->execute([$nom, $prenom, $poste, $salaire, $idSecteur]);
        ?>
    <div class="alert alert-success">
            L'employé <?=$_POST["nom"];?> a bien été ajouté<br>
            Vous allez être redirigé vers la page d'accueil<br>
            <a href="index.php">Cliquez ici si vous êtes impatient</a>
        </div>
        <?php
        header("refresh:3;index.php");
        // Si le try génère une erreur PHP, alors on entre dans le catch
    } catch (Exception $e) {
        ?>
        <div class ="alert alert-danger mt-3"> Erreur : le formulaire n'a pas été enregistré fhgfdhfgh<br>
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
            <label for="idSecteur">idSecteur</label>
            <input type="number" class="form-control" name="idSecteur" id="idSecteur" placeholder="Entrez le idSecteur mensuel"/>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Ajouter l'employé</button>
        </div>
    </form>
</div>

<?php
require_once "pied.php";