<?php
function suppCharges($idDepense){   
    $requete = getBDD()->prepare("DELETE FROM depenses WHERE idDepense = ?");
    $requete->execute([$idDepense]);

    $requete = getBDD()->prepare("UPDATE depenses SET idDepense = NULL WHERE idDepense = ?");
    $requete->execute([$idDepense]);
    return true;

} 

function listeDepenses(){
    $requete = getBDD()->prepare("SELECT * FROM depenses");
    $requete->execute();
    $depenses = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $depenses;
}
