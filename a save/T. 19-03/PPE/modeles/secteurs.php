<?php
function suppSecteur($idSecteur){  
    $requete = getBDD()->prepare("DELETE FROM secteurs WHERE idSecteur = ?");
    $requete->execute([$idSecteur]);

    $requete = getBDD()->prepare("UPDATE employes SET idSecteur = NULL WHERE idSecteur = ?");
    $requete->execute([$idSecteur]);
    return true;
}

function listeSecteur(){
    $requete = getBDD()->prepare("SELECT * FROM secteurs");
    $requete->execute();
    $secteurs = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $secteurs;
}
