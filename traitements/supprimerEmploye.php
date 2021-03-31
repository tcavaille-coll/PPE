<?php
require_once "../modeles/modele.php";

if (!empty($_GET["id"]))
{
    $idEmploye= $_GET["id"];

    if(supprimerUtilisateur($idEmploye) == true)
    {
        header("location:../admin/supprimerEmploye.php?success=suppression&id=$idEmploye");
    } else {
        header("location:../admin/supprimerEmploye.php?error=erreursuppression&id=$idEmploye");
    }
    
} else {
    header("location:../admin/supprimerEmploye.php?error=missing&id=$idEmploye");
}




