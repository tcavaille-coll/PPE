<?php
require_once "../modeles/modele.php";

if (!empty($_POST)) 
{
    // Vérification que les données aient bien été entrées dans le formulaire
    if (!empty($_POST["nomRevenu"]) && !empty($_POST["gains"]) && !empty($_POST["date"])) 
    {
        if (creerRevenu($_POST["nomRevenu"], $_POST["gains"], $_POST["date"]) == true) 
        {
            header("location:../admin/listeRevenus.php?success=ajout");
        } else {
            header("location:../admin/listeRevenus.php?error=erreurajout");
        }        
    } else {
        header("location:../admin/listeRevenus.php?error=missing");
    }
} else {
    header("location:/");
}
