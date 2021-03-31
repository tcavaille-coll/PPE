<?php
require_once "entete.php";

// Récupération de l'id du revenus depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])){
    if(!empty($_POST("nomRevenu"))){
        if(!empty($_POST("gains"))){
            if(!empty($_POST("date"))){
                header("location:/admin/supprimerGains.php?sucess=revenu");
            }else{
                header("location:/admin/supprimerGains.php?error=gaindate");
            }

        }else{
            header("location:/admin/supprimerGains.php?error=gain");
        }

    }else{
        header("location:/admin/supprimerGains.php?error=gainom");
    }
}else{
    header("location:/admin/supprimerGains.php?error=gainid");
}


?>




