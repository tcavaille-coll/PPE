<?php

function getBDD()
{
    // Initialisation de la connexion à la BDD
    return new PDO('mysql:host=localhost;dbname=gestion;charset=UTF8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function gererGuillemets($string)
{
    /* return str_replace('"', '\"', $string); */
    return trim(htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false));
}