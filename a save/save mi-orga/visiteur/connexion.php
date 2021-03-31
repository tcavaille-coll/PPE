<?php
require_once "../traitements/entete.php";

if (isset($_SESSION["identifiant"]) && !empty($_SESSION["identifiant"]))
{
    print_r($_SESSION["identifiant"]);
    echo "<br>";
    echo "non";
}

if(isset($_POST["envoi"]) && !empty($_POST["envoi"]) && $_POST["envoi"] == 1)
{
    extract($_POST);

    $erreurs = [];

    if (!isset($identifiant) || empty($identifiant) &&
        !isset($mdp) || empty($mdp))
        {
            echo($identifiant);
            echo($mdp);
            echo($_POST["mdp"]);

            $erreurs[] = "L'un des champs est vide";
        }

        // Vérification que le mot de passe fait au moins 6 caractères
        if(strlen($_POST["mdp"]) < 6)
        {
            $erreurs[] = "Le mot de passe doit faire au moins 6 caractères";
        }

        // Vérification si le mot de passe ne correspond pas
        if(count($erreurs) == 0)
        {
            $requete = getBDD()->prepare("SELECT idEmploye, identifiant, mdp, idRole FROM infosConnexion WHERE identifiant = ?");
            $requete->execute([$identifiant]);

            // Vérification si l'identifiant n'existe pas en regardant le nombre de lignes retournées par la requête
            if($requete->rowCount() > 0)
            {
                // L'identifiant existe
                $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

                // Vérifier si les mots de passe correspondent
                if(!password_verify($mdp, $utilisateur["mdp"]))
                {
                    // Le MdP ne correspond pas
                    $erreurs[] = "Le mot de passe saisi est incorrecte";
                }

            } else {
                // L'identifiant n'existe pas
                $erreurs[] = "L'adresse email n'existe pas";
            }
        }    
        if(count($erreurs) == 0)
        {
            // On connecte l'utilisateur
            @session_start();
            $_SESSION["identifiant"] = $identifiant;
            $_SESSION["idRole"] = $utilisateur["idRole"];
            $_SESSION["idEmploye"] = $utilisateur["idEmploye"];

            ?>
            <div class="alert alert-success mt-3">
            Vous êtes connecté<br>
            Vous allez être redirigé vers la page d'accueil<br>
            <a href="../membre/index.php">Cliquez ici pour une redirection manuelle</a>
            </div>
            <?php
            header("refresh:5;../membre/index.php");

        } else {
            // On affiche les erreurs
            ?>
            <div class="alert alert-danger">
            Erreur :
            <?php
            foreach($erreurs as $erreur)
            {
                ?>
                <br><?= $erreur; ?>
                <?php
            }
            ?>
            </div>
            <?php
        }
}
?>
<div class="container">
    <h1>Connexion</h1>
    <form method="post">
        <div class="form-group">
            <label for="identifiant">Identifiant :</label>
            <input type="text" class="form-control" name="identifiant" id="identifiant" placeholder="Saisissez votre identifiant" value="<?=(isset($_POST["identifiant"]) ? $_POST["identifiant"] : "")?>" required/>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe :</label>
            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Saisissez votre mot de passe" required/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" name="envoi" id="envoi" value="1">Connexion</button>
        </div>
    </form>
</div>


<?php
require_once "../visiteur/pied.php";