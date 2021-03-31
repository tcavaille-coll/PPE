<?php
require_once "entete.php";


if(isset($_POST["envoi"]) && !empty($_POST["envoi"]) && $_POST["envoi"] === "1")
{
    $erreurs = [];

    // Vérification des données du formulaire
    if (isset($_POST["identifiant"]) && !empty($_POST["identifiant"]) 
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])
    && isset($_POST["idEmploye"]) && !empty($_POST["idEmploye"]))
    {
        // Récupération des données du formulaire dans des variables plus claires
        $identifiant = $_POST["identifiant"];
        $mdp = $_POST["mdp"];
        $verifMdp = $_POST["verifMdp"];
        $idEmploye = $_POST["idEmploye"];

        // Vérification que le mot de passe fait au moins 6 caractères
        if(strlen($_POST["mdp"]) < 6)
        {
            $erreurs[] = "Le mot de passe doit faire au moins 6 caractères";
        }

        // Vérification que les 2 mots de passe correspondent
        if($_POST["mdp"] !== $_POST["verifMdp"])
        {
        $erreurs[] = "Les deux mots de passe saisies ne sont pas identiques";
        }

    } else {
        $erreurs[] = "Au moins un champ n'a pas été saisi";
    }

    if(count($erreurs) === 0)
    {
        // On extrait les variables de notre post pour en créer des nouvelles
        extract($_POST);

        try
        {   
            // On hash le mot de passe
            $mdp = password_hash($mdp, PASSWORD_BCRYPT);

            $idRole = 1;

            // On effectue l'insertion en bdd
            $requete = getBDD()->prepare("INSERT INTO infosConnexion(identifiant, mdp, idRole, idEmploye) VALUES(?, ?, ?, ?)");

                $requete->execute([$identifiant, $mdp, $idRole, $idEmploye]);
                ?>
                <!-- On affiche un message de réussite -->
                <div class="alert alert-success mt-3">
                    Votre inscription a bien été enrengistrée<br>
                    Vous allez être redirigé vers la page d'accueil<br>
                    <a href="index.php">Cliquez ici pour une redirection manuelle</a>
                </div>
            <?php 
            header("refresh:5;index.php");
    
        } catch (Exception $e) {
            // Un problème s'est produit lors de l'insertion en bdd
            ?>
            <!-- On affiche un message d'erreur -->
            <div class ="alert alert-danger mt-3"> Une erreur s'est produite </div>
            <?php
        }
    } else {
        // On affiche les erreurs
        ?>
        <div class="alert alert-danger">
        Erreurs :
        <?php
        foreach($erreurs as $erreur)
        {
            ?>
            <br>
            <div class="alert alert-danger mt-3">
            <?= $erreur; ?>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }
}
?>

<div class="container">
    <h1>Inscription</h1>
    <form method="post">

    <div class="form-group">
        <label for="idEmploye">Sélectionnez l'employé</label>
        <select name="idEmploye" id="idEmploye" class="form-control">
        <?php
            try 
            {
            $requete = getBDD()->prepare("SELECT * FROM employes");
            $requete->execute();
            $employes = $requete->fetchAll(PDO::FETCH_ASSOC);

            foreach ($employes as $employe)
            {
                ?>
                <option value="<?=$employe["idEmploye"];?>">
                <?=$employe["nom"]?> <?=$employe["prenom"];?>
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

    
        <div class="form-group">
            <label for="identifiant">Identifiant ("nom.prénom" de l'employé):</label>
            <input type="text" class="form-control" name="identifiant" id="identifiant" placeholder="Saisissez l'identifiant" value="<?=(isset($_POST["identifiant"]) ? $_POST["identifiant"] : "")?>" required/>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe (6 caractères minimum):</label>
            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Créer votre mot de passe" required/>
        </div>
        <div class="form-group">
            <label for="verifMdp">Vérifier votre mot de passe :</label>
            <input type="password" class="form-control" name="verifMdp" id="verifMdp" placeholder="Vérifier votre mot de passe" required/>
        </div>
        
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" name="envoi" id="envoi" value="1">S'inscrire !</button>
        </div>
    </form>
</div>

<?php
require_once "pied.php";