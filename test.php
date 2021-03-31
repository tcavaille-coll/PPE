<?php

function getBDD()
{
    // INITIALISATION DE LA CONNEXION A LA BDD
    return new PDO('mysql:host=localhost;dbname=gestion', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}


$prenom = "Nyme";
$nom = "Ano";
$identifiant = strtolower($nom) . "." . strtolower($prenom);
$poste = "Secret";
$idSecteur = 2;
$mdp = "dsgijodfjiougiopjd";

function creerUtilisateur($nom, $prenom, $poste, $idSecteur, $mdp)
{
    $salaire = 0;
    $identifiant = strtolower($nom) . "." . strtolower($prenom);
    $idRole = 1;
    $requete = getBDD()->prepare("INSERT INTO 
    utilisateurs(nom, prenom, poste, salaire, idSecteur, identifiant, mdp, idRole
    VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

    echo "nom : " . $nom;
    echo "<br>";
    echo "prenom : " . $prenom;
    echo "<br>";
    echo "poste : " . $poste;
    echo "<br>";
    echo "salaire : " . $salaire;
    echo "<br>";
    echo "idSecteur : " . $idSecteur;
    echo "<br>";
    echo "identifiant : " . $identifiant;
    echo "<br>";
    echo "mdp : " . $mdp;
    echo "<br>";
    echo "idRole : " . $idRole;
    $requete->execute([$nom, $prenom, $poste, $salaire, $idSecteur, $identifiant, $mdp, $idRole]);
    return true;
}

if($test=1)
{
    creerUtilisateur($nom, $prenom, $poste, $idSecteur, $mdp);
}