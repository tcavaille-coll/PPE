<?php
require_once "../modeles/modele.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idSecteur = $_GET["id"];
    if(!empty($_POST["domaine"])){
        if(!empty($_POST["budget"])){
            extract($_POST);
            if(modifierSecteur($idSecteur, $domaine, $budget)==true){
                header("location:../admin/modifierSecteur.php?success=modifier&id=$idSecteur");
            }else{
                header("location:../admin/modifierSecteur.php?error=fonction&id=$idSecteur");
            }
        }else{
            header("location:../admin/modifierSecteur.php?error=budget&id=$idSecteur");
        }
    }else{
        header("location:../admin/modifierSecteur.php?error=domaine&id=$idSecteur");
    }
} 
else 
{
    header("location:../admin/modifierSecteur.php?error=missing&id=$idSecteur");
}