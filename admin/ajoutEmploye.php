<?php
require_once "../admin/entete.php";
?>

<div class="container">
    <h1>Création de compte</h1>

    <?php if (!empty($_GET["success"]) && $_GET["success"] == "ajout") 
    {
        ?>
        <p style="color:green">Le compte à bien été crée</p>
    <?php 
    }
    ?>
    <?php if (!empty($_GET["error"])) 
    {
    ?>
        <p style="color:red">
        <?php switch ($_GET["error"]) 
        {
            case "erreurajout": ?>
                <?php echo "Une erreur s'est produite lors de l'enregistrement"; ?>
                <?php break;?>
            <?php case "mdplength": ?>
                <?php echo "Le mot de passe doit faire au moins 6 caractères"; ?>
                <?php break;?>
            <?php case "mdpnotsame": ?>
                <?php echo "Les deux mots de passe saisies ne sont pas identiques"; ?>
                <?php break;?>
            <?php case "missing": ?>
                <?php echo "Au moins un champ n'a pas été saisi"; ?>
                <?php break;?>
        <?php 
        }
        ?>
        </p>
    <?php 
    }
    ?>

    <form method="post" action="/traitements/ajoutEmploye.php">

        <div class="form-group">
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
            <input type="text" class="form-control" name="salaire" id="salaire" placeholder="Saisissez le salaire (optionnel)" value="<?=(isset($_POST["salaire"]) ? $_POST["salaire"] : "")?>"/>
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

<?php
require_once "pied.php";
