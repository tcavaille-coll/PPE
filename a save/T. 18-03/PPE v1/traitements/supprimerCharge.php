<?php
require_once "entete.php";
if (isset($_GET["id"]) && !empty($_GET["id"])){ 
    if(!empty($_POST("nomDepense"))){
        if(!empty($_POST("depense"))){
            if(!empty($_POST("date"))){
                header("location:/admin/supprimerCharges.php?success=depensid");
            }else{
                header("location:/admin/supprimerCharges.php?error=depensedate");
            }

        }else{
            header("location:/admin/supprimerCharges.php?error=depense");
        }
        
    }else {
        header("location:/admin/supprimerCharges.php?error=depensenom");
}else {
    header("location:/admin/supprimerCharges.php?error=depensid");
}
?>





