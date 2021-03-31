<?php
require_once "../modeles/modele.php";


if (isset($_GET["id"]) && !empty($_GET["id"])) 
{
    $idEmploye = $_GET["id"];
    if(!empty($_POST["nom"])){
        if(!empty($_POST["prenom"])){
            if(!empty($_POST["poste"])){
                if(!empty($_POST["salaire"])){
                    if(!empty($_POST["idSecteur"])){
                        if(!empty($_POST["identifiant"])){
                                if(!empty($_POST["idRole"])){
                                    extract($_POST);
                                    if(modifierUtilisateur($idEmploye, $nom, $prenom, $poste, $salaire, $idSecteur, $identifiant, $idRole)==true){
                                        header("location:../admin/modifierEmploye.php?success=modifier&id=$idEmploye");
                                    }else{
                                        header("location:../admin/modifierEmploye.php?error=fonction&id=$idEmploye");
                                    }
                                }else{
                                    header("location:../admin/modifierEmploye.php?error=idRole&id=$idEmploye");
                                }
                        }else{
                            header("location:../admin/modifierEmploye.php?error=identifiant&id=$idEmploye");
                        }
                    }else{
                        header("location:../admin/modifierEmploye.php?error=secteur&id=$idEmploye");
                    }
                }else{
                    header("location:../admin/modifierEmploye.php?error=salaire&id=$idEmploye");
                }
            }else{
                header("location:../admin/modifierEmploye.php?error=poste&id=$idEmploye");
            }              
        }else{
            header("location:../admin/modifierEmploye.php?error=prenom&id=$idEmploye");
        }
    }else{
        header("location:../admin/modifierEmploye.php?error=nom&id=$idEmploye");
    }
}else{
    header("location:../admin/modifierEmploye.php?error=erreurid&id=$idEmploye");
}