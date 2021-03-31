<?php
require_once "entete.php";

if (isset($_GET["id"]) && !empty($_GET["id"])){ 
    $idGain = $_GET["id"];
        if(suppGain($idGain)==true){
            header("location:/admin/supprimerGains.php?success=charge");
        }else{
            header("location:/admin/supprimerGains.php?error=erreursuppr");
        }
}else {
    header("location:/admin/supprimerGains.php?error=erreurid");
}




