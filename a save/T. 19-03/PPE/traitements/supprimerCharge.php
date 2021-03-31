<?php
require_once "entete.php";

if (isset($_GET["id"]) && !empty($_GET["id"])){ 
    $idDepense = $_GET["id"];
        if(suppCharges($idDepense)==true){
            header("location:/admin/supprimerCharges.php?success=charge");
        }else{
            header("location:/admin/supprimerCharges.php?error=erreursuppr");
        }
}else {
    header("location:/admin/supprimerCharges.php?error=erreurid");
}






