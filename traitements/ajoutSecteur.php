<?php
require_once "../modeles/modele.php";

if (!empty($_POST)) 
{
    // Vérification que les données aient bien été entrées dans le formulaire
    if (!empty($_POST["domaine"]) && !empty($_POST["budget"]))
    {
        if (creerSecteur($_POST["domaine"], $_POST["budget"]) == true) 
        {
            header("location:../admin/listeSecteurs.php?success=ajout");
        } else {
            header("location:../admin/listeSecteurs.php?error=erreurajout");
        }        
    } else {
        header("location:../admin/listeSecteurs.php?error=missing");
    }
} else {
    header("location:/");
}
