<?php
require_once "../modeles/modele.php";

if (!empty($_GET["id"]))
{
    $idSecteur = $_GET["id"];

    if(supprimerSecteur($idSecteur) == true)
    {
        header("location:../admin/supprimerSecteur.php?success=suppression&id=$idSecteur");
    } else {
        header("location:../admin/supprimerSecteur.php?error=erreursuppression&id=$idSecteur");
    }

} else {
    header("location:../admin/supprimerSecteur.php?error=missing&id=$idSecteur");
}