<?php
require_once "entete.php";

// Récupération de l'id du produit depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idEmploye = $_GET["id"];
} 

// Redirecton vers la page d'acceuil si on a pas l'id du produit
else {
    header("location:index.php");
}

// Vérification du formulaire
if (isset($_POST["nom"]) && !empty($_POST["nom"]) && 
    isset($_POST["prenom"]) && !empty($_POST["prenom"]) && 
    isset($_POST["poste"]) && !empty($_POST["poste"]) && 
    isset($_POST["salaire"]) && !empty($_POST["salaire"]) && 
    isset($_POST["secteur"]) && !empty($_POST["secteur"])
) 
{
    try
    {   // Test de la mise à jour du produit
        $requete = getBDD()->prepare("UPDATE employes SET nom = ?, prenom = ?, poste = ?, salaire = ?, idSecteur = ? WHERE idEmploye = ?");

        $requete->execute([$_POST["nom"], $_POST["prenom"], $_POST["poste"], $_POST["salaire"], $_POST["secteur"], $idEmploye]);
        ?>

        <div class="alert alert-success">
            Les informations de l'employé <?=$_POST["nom"];?> ont bien été modifiées<br>
            Vous allez être redirigé vers la liste des employés<br>
            <a href="listeEmployes.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php   
        header("refresh:5;listeEmployes.php");
    } catch(Exception $e) {
        // Gestion des erreurs éventuelles
        ?>

        <div class="alert alert-danger">
            Erreur de modification des informations de l'employé<br>
            <?= $e->getMessage()?>
        </div>

        <?php
    }
}

$requete = getBDD()->prepare("SELECT * FROM employes WHERE idEmploye = ? LIMIT 1");
$requete->execute([$idEmploye]);
$employe = $requete->fetch(PDO::FETCH_ASSOC);

$nom = $employe["nom"];
$prenom = $employe["prenom"];
?>

<h1>Modification des informations de l'employé n°<?=$idEmploye;?>, <?=$nom;?> <?=$prenom?></h1>
    <form method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisissez le nom" 
            value="<?=$employe["nom"];?>"/>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisissez le prénom" 
            value="<?=$employe["prenom"];?>"/>
        </div>
        <div class="form-group">
            <label for="poste">Poste :</label>
            <input type="text" class="form-control" name="poste" id="poste" placeholder="Saisissez le poste" 
            value="<?=$employe["poste"];?>"/>
        </div>
        <div class="form-group">
            <label for="salaire">Salaire brut:</label>
            <input type="number" class="form-control" name="salaire" id="salaire" placeholder="Saisissez le salaire"
            value="<?=$employe["salaire"];?>"/>
        </div>
        <div class="form-group">
            <label for="categorie">Secteur :</label>
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
                    <option 
                        value="<?=$secteur["idSecteur"];?>"
                         

                        <?=
                        ($secteur["idSecteur"] === $employe["idSecteur"] ? "selected" : "");?>
                        
                        >

                        <?=$secteur["domaine"];?>
                        
                        </option>
                        <?php
                }
            } catch (Exception $e)
            {
                ?>
                <div class ="alert alert-danger mt-3"> Erreur : le formulaire n'a pas été enregistré<br>
                <?php
            }
        ?>
        </select>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Modifier les informations</button>
        </div>
    </form>
<?php
require_once "pied.php";
?>