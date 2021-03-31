<?php
require_once "../modeles/modele.php";

if (!empty($_POST)) 
{
    // Vérification que les données requises aient été entrées dans le formulaire
    if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["poste"])
     && !empty($_POST["idSecteur"]) && !empty($_POST["mdp"])) 
    {
        // Vérification que le mot de passe fait au moins 6 caractères
        if (strlen($_POST["mdp"]) >= 6) 
        {
            // Vérification que les 2 mots de passe correspondent
            if($_POST["mdp"] == $_POST["verifMdp"])
            {
                $mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT);
                if (creerUtilisateur($_POST["nom"], $_POST["prenom"],$_POST["poste"], 
                $_POST["idSecteur"], $mdp) == true) 
                {
                    header("location:../visiteur/inscription.php?success=inscription");
                } else {
                    header("location:../visiteur/inscription.php?error=inscriptionsave");
                }
            } else {
                header("location:../visiteur/inscription.php?error=mdpnotsame");
            }
        } else {
            header("location:../visiteur/inscription.php?error=mdplength");
        }
    } else {
        header("location:../visiteur/inscription.php?error=missing");
    }
} else {
    header("location:/");
}
