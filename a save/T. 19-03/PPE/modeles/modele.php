<?php
function getBdd()
{
    // INITIALISATION DE LA CONNEXION A LA BDD
    return new PDO('mysql:host=localhost;dbname=gestion', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
require_once "../modeles/utilisateurs.php";
require_once "../modeles/secteurs.php";
require_once "../modeles/solde.php";
require_once "../modeles/gains.php";
require_once "../modeles/charges.php";
