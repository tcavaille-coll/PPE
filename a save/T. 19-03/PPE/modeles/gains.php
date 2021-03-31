<?php
function suppGain($idGain){   
    $requete = getBDD()->prepare("DELETE FROM revenus WHERE idRevenu = ?");
    $requete->execute([$idGain]);

    $requete = getBDD()->prepare("UPDATE revenus SET idRevenu = NULL WHERE idRevenu = ?");
    $requete->execute([$idGain]);

    return true;

}

function listeGains(){
    $requete = getBDD()->prepare("SELECT * FROM revenus");
    $requete->execute();
    $revenus = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $revenus;
}