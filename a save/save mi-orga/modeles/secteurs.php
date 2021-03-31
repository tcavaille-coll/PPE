<?php
function creerSecteur($domaine, $budget)
{
    $requete = getBDD()->prepare("INSERT INTO secteurs(domaine, budget) VALUES(?, ?)");
    $requete->execute([$domaine, $budget]);
}

function recupererSecteur()
{
    $requete = getBDD()->prepare("SELECT * FROM secteurs");
    $requete->execute();
    return $requete->fetchAll();
}