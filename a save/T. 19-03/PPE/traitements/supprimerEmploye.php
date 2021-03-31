<?php
require_once "entete.php";


if (isset($_GET["id"]) && !empty($_GET["id"])){ 
    $idUtilisateur= $_GET["id"];
        if(suppEmploye($idUtilisateur)==true){
            header("location:/admin/supprimerEmploye.php?success=charge");
        }else{
            header("location:/admin/supprimerEmploye.php?error=erreursuppr");
        }
}else {
    header("location:/admin/supprimerEmploye.php?error=erreurid");
}



