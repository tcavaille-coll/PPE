<?php
require_once "../modeles/modele.php";


if (!empty($_GET["id"]))
{
    $idDepense= $_GET["id"];

    if(supprimerDepense($idDepense) == true)
    {
        header("location:../admin/supprimerDepense.php?success=suppression&id=$idDepense");
    } else {
        header("location:../admin/supprimerDepense.php?error=erreursuppression&id=$idDepense");
    }
    
} else {
    header("location:../admin/supprimerDepense.php?error=missing&id=$idDepense");
}