<?php
require_once "../modeles/modele.php";

if (!empty($_GET["id"]))
{
    $idRevenu = $_GET["id"];

    // Vérification que les données aient bien été entrées dans le formulaire
    if (!empty($_POST["nomRevenu"]) && !empty($_POST["gains"]) && !empty($_POST["date"])) 
    {
        if (modifierRevenu($_POST["nomRevenu"], $_POST["gains"], $_POST["date"], $idRevenu) == true) 
        {
            header("location:../admin/modifierRevenu.php?success=modification&id=$idRevenu");
        } else {
            header("location:../admin/modifierRevenu.php?error=erreurmodif&id=$idRevenu");
        }        
    } else {
        header("location:../admin/modifierRevenu.php?error=missing&id=$idRevenu");
    }
} else {
    header("location:/");
}