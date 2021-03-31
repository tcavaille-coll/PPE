<?php
function getBDD()
{
    // INITIALISATION DE LA CONNEXION A LA BDD
    return new PDO('mysql:host=localhost;dbname=gestion', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

require_once "../modeles/employes.php";
require_once "../modeles/solde.php";

