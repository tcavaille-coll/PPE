<?php
require_once "../modeles/modele.php";

if (!empty($_POST["nomDepense"]) || !empty($_POST["depense"]) || !empty($_POST["date"]))
{
    extract($_POST);

    if(creerDepense($nomDepense, $depense, $date) == true) 
    {
        header("location:../admin/listeDepenses.php?success=ajout");
    } else {
        header("location:../admin/listeDepenses.php?error=erreurajout");
    }
} else {
    header("location:../admin/listeDepenses.php?error=missing");
}

