<?php
function suppEmploye($idUtilisateur){
    $requete = getBDD()->prepare("DELETE FROM utilisateur WHERE idEmploye = ?");
    $requete->execute([$idUtilisateur]);
    return true;
}

function listeUtilisateur(){
    $requete = getBDD()->prepare("SELECT * FROM utilisateurs 
    LEFT JOIN secteurs USING(idSecteur)");
    $requete->execute();
    $employes = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $employes;
}