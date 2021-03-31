<?php
require_once "entete.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    if(!empty($_POST("domaine"))){
        if(!empty($_POST("budget"))){
            header("location:/admin/supprimerSecteur.php?sucess=secteur");
        }else{
            header("location:/admin/supprimerSecteur.php?error=secteurbudget");
        }

    }else{
        header("location:/admin/supprimerSecteur.php?error=secteurdomaine");
    }
}else{
    header("location:/admin/supprimerSecteur.php?error=secteurid");
}
