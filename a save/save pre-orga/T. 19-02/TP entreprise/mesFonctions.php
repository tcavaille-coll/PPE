<?php

function getBDD()
{
    // Initialisation de la connexion à la BDD
    return new PDO('mysql:host=localhost;dbname=gestion;charset=UTF8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}