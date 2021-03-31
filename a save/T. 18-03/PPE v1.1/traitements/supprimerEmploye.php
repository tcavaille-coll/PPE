<?php
require_once "entete.php";

// Récupération de l'id du produit depuis l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])){
    if(!empty($_POST["nom"])){
        if(!empty($_POST("prenom"))){
            if(!empty($_POST("poste"))){
                if(!empty($_POST("idSecteur"))){
                    if(!empty($_POST("identifiant"))){
                        if(!empty($_POST("mdp"))){
                            if(!empty($_POST("idRole"))){
                                if(!empty($_POST("salaire"))){
                                    header("location:/admin/supprimerEmploye.php?success=utilisateur");
                                }else{
                                    header("location:/admin/supprimerEmploye.php?error=employesalaire");
                                }

                            }else{
                                header("location:/admin/supprimerEmploye.php?error=employeidRole");
                            }

                        }else{
                            header("location:/admin/supprimerEmploye.php?error=employemdp");
                        }

                    }else{                        
                        header("location:/admin/supprimerEmploye.php?error=employeidentifiant");
                    }

                }else{
                    header("location:/admin/supprimerEmploye.php?error=employeidSecteur");
                }

            }else{
                header("location:/admin/supprimerEmploye.php?error=employeposte");
            }

        }else{
            header("location:/admin/supprimerEmploye.php?error=employeprenom");
        }
    }else{
        header("location:/admin/supprimerEmploye.php?error=employenom");
    }
} else {
    header("location:/admin/supprimerEmploye.php?error=employeid");
}



