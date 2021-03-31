<?php
function getBDD()
{
    // INITIALISATION DE LA CONNEXION A LA BDD
    return new PDO('mysql:host=localhost;dbname=gestion;charset=UTF8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

require_once "../modeles/depenses.php";
require_once "../modeles/revenu.php";
require_once "../modeles/secteurs.php";
require_once "../modeles/solde.php";
require_once "../modeles/utilisateur.php";
