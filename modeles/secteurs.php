<?php

function recupererSecteurs()
{
    $requete = getBDD()->prepare("SELECT * FROM secteurs");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function recupererSecteur($idSecteur)
{
    $requete = getBDD()->prepare("SELECT * FROM secteurs WHERE idSecteur = ?");
    $requete->execute([$idSecteur]);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function creerSecteur($domaine, $budget)
{
    $requete = getBDD()->prepare("INSERT INTO secteurs(domaine, budget) VALUES(?, ?)");
    $requete->execute([$domaine, $budget]);
    return true;
}

function modifierSecteur($idSecteur, $domaine, $budget)
{
    $requete = getBDD()->prepare("UPDATE secteurs SET domaine = ?, budget = ? WHERE idSecteur = ?");
    $requete->execute([$domaine, $budget, $idSecteur]);
    return true;
}

function supprimerSecteur($idSecteur)
{
    $requete = getBDD()->prepare("DELETE FROM secteurs WHERE idSecteur = ?");
    $requete->execute([$idSecteur]);
    return true;
}