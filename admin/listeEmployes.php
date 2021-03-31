<?php
require_once "../admin/entete.php";
require_once "../modeles/modele.php";

$employes=recupererUtilisateurs();
?>
<!-- ------------------------ PENSER A RAJOUTER LE HAMBURGER BOOTSTRAP ------------------------ -->

<!-- ------------------------ AJOUT D'UN NOUVEAU REVENU ------------------------ -->
<div class="container">

<?php
if(!empty($_GET["success"]) && $_GET["success"] == "ajout") 
{
    ?>
    <div class="alert alert-success mt-3">L'employés a bien été ajouté</div>
        <?php
        header("refresh:2;../admin/listeEmployes.php");
}

if (!empty($_GET["error"])) 
{
    ?>
    <div class="alert alert-danger mt-2">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Au moins un des champs est vide"; ?>
            <?php break;?>
        <?php case "erreurajout": ?>
            <?php echo "Une erreur s'est produite lors de l'ajout"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </div>
<?php 
}

if(!empty($_SESSION["identifiant"]) && $_SESSION["idRole"] == 2 && empty($_GET["success"]))
{
?>

    <div class="row">
    <div class="col-md-12">
    <div class="card card-white">
    <div class="card-body">

        
        <nav class="navbar navbar-7 mb-4">
            <h1 class="navbar-brand" href="#">Ajout d'un nouvelle employe : </h1>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent11" aria-controls="navbarSupportedContent11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent11">
                <form method="post" action="../traitements/ajoutEmploye.php" class="navbar-nav mr-auto">

                    <div class="form-group nav-item active">
                        <label for="prenom">Prénom :</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisissez le prénom de l'utilisateur" value="<?=(isset($_POST["prenom"]) ? $_POST["prenom"] : "")?>" required/>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisissez le nom de l'utilisateur" value="<?=(isset($_POST["nom"]) ? $_POST["nom"] : "")?>" required/>
                    </div>

                    <div class="form-group">
                        <label for="poste">Poste :</label>
                        <input type="text" class="form-control" name="poste" id="poste" placeholder="Saisissez le poste du salarié" value="<?=(isset($_POST["poste"]) ? $_POST["poste"] : "")?>" required/>
                    </div>

                    <div class="form-group">
                        <label for="salaire">Salaire :</label>
                        <input type="number" class="form-control" name="salaire" id="salaire" placeholder="Saisissez le salaire (optionnel)" value="<?=(isset($_POST["salaire"]) ? $_POST["salaire"] : "")?>"/>
                    </div>

                    <div class="form-group">
                        <label for="idSecteur">Secteur :</label> <!-- SELECT -->
                        <input type="number" class="form-control" name="idSecteur" id="idSecteur" placeholder="Saisissez le secteur d'affectation" value="<?=(isset($_POST["idSecteur"]) ? $_POST["idSecteur"] : "")?>" required/>
                    </div>

                    <div class="form-group">
                        <label for="idRole">Rôle :</label> <!-- SELECT -->
                        <input type="number" class="form-control" name="idRole" id="idRole" placeholder="Saisissez le niveau d'accréditation du compte (1 par défaut)" value="<?=(isset($_POST["idSecteur"]) ? $_POST["idRole"] : "")?>" />
                    </div>

                    <div class="form-group">
                        <label for="mdp">Mot de passe (6 caractères minimum):</label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Créer un mot de passe" required/>
                    </div>
                    <div class="form-group">
                        <label for="verifMdp">Vérifier votre mot de passe :</label>
                        <input type="password" class="form-control" name="verifMdp" id="verifMdp" placeholder="Saisissez à nouveau le mot de passe" required/>
                    </div>

                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-primary">Créer le compte</button>
                        <a href="listeDepense.php" class="btn btn-outline-secondary">Non</a>

                    </div>
                </form>
            </div>
        </nav>

<?php
}
?>
<!-- ------------------------ FIN AJOUT NOUVEAU REVENU ------------------------ -->

<h1> Liste des employés : </h1>

<ul class="list-group">
<div class="container-fluid">
<div class="row">
    
<?php
foreach($employes as $employe)
{
?>
        
    <div class="col-8 col-md-9 mb-4">
        
    <li class="list-group-item">Nom : <?=$employe["nom"]?></li>
    <li class="list-group-item">Prénom : <?=$employe["prenom"]?></li>
    <li class="list-group-item">Poste : <?=$employe["poste"]?></li>
    <li class="list-group-item">Salaire mensuel brut: <?=$employe["salaire"]?>€</li>
    <li class="list-group-item">Secteur : <?=$employe["idSecteur"]?></li>
    </div>

        
    <div class="float-right mb-4">

    <a href="modifierEmploye.php?id=<?=$employe["idEmploye"];?>" class="btn btn-outline-primary w-100 p-2 h-50" id="bouton">Modifier</a>
    <br>
    <a href="supprimerEmploye.php?id=<?=$employe["idEmploye"];?>" class="btn btn-outline-danger w-100 p-2 h-50" id="bouton">Supprimer</a>

    </div>
        
    <?php
}
    ?>
</div>
</div>
</ul>

<?php
require_once "pied.php";