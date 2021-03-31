<?php
function creerEmploye($nom, $prenom, $poste, $salaire, $secteur)
{
    $requete = getBDD()->prepare("INSERT INTO employes(nom, prenom, poste, salaire, idSecteur)
    VALUES(?, ?, ?, ?, ?)");
    $requete->execute([$nom, $prenom, $poste, $salaire, $secteur]);
}

function recupererEmploye()
{
    $requete = getBdd()->prepare("SELECT * FROM employes");
    $requete->execute();
    return $requete->fetchAll();
}

function modifierEmploye()
{

}