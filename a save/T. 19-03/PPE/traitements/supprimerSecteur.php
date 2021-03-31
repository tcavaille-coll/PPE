<?php
require_once "entete.php";

if (isset($_GET["id"]) && !empty($_GET["id"])){ 
    $idSecteur = $_GET["id"];
        if(suppSecteur($idSecteur)==true){
            header("location:/admin/supprimerSecteur.php?success=charge");
        }else{
            header("location:/admin/supprimerSecteur.php?error=erreursuppr");
        }
}else {
    header("location:/admin/supprimerSecteur.php?error=erreurid");
}
