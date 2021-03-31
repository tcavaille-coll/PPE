<?php
require_once "../modeles/modele.php";

   

if (!empty($_GET["id"]))
{
    $idDepense = $_GET["id"];

    // Vérification que les données aient bien été entrées dans le formulaire
    if (!empty($_POST["nomDepense"]) && !empty($_POST["depense"]) && !empty($_POST["date"])) 
    {
        if (modifierDepense($_POST["nomDepense"], $_POST["depense"], $_POST["date"], $idDepense) == true) 
        {
            header("location:../admin/modifierDepense.php?success=modification&id=$idDepense");
        } else {
            header("location:../admin/modifierDepense.php?error=erreurmodif&id=$idDepense");
        }        
    } else {
        header("location:../admin/modifierDepense.php?error=missing&id=$idDepense");
    }
} else {
    header("location:/");
}