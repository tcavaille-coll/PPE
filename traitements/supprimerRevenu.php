<?php
require_once "../modeles/modele.php";

if (!empty($_GET["id"]))
{
    $idRevenu = $_GET["id"];

    if(supprimerRevenu($idRevenu) == true)
    {
        header("location:../admin/supprimerRevenu.php?success=suppression&id=$idRevenu");
    } else {
        header("location:../admin/supprimerRevenu.php?error=erreursuppression&id=$idRevenu");
    }

} else {
    header("location:../admin/supprimerRevenu.php?id=error=missing&id=$idRevenu");
}




