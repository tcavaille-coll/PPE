<?php
require_once "../traitements/entete.php";

if (isset($_SESSION["identifiant"]) && !empty($_SESSION["identifiant"]))
{
    print_r($_SESSION["identifiant"]);
    echo "<br>";
    echo "non";
}

if(isset($_POST["envoi"]) && !empty($_POST["envoi"]) && $_POST["envoi"] == 1)
{
    extract($_POST);

    $erreurs = [];

    if (!isset($identifiant) || empty($identifiant) &&
        !isset($mdp) || empty($mdp))
        {
            echo($identifiant);
            echo($mdp);
            echo($_POST["mdp"]);

            $erreurs[] = "L'un des champs est vide";
        }

        // Vérification que le mot de passe fait au moins 6 caractères
        if(strlen($_POST["mdp"]) < 6)
        {
            $erreurs[] = "Le mot de passe doit faire au moins 6 caractères";
        }

        // Vérification si le mot de passe ne correspond pas
        if(count($erreurs) == 0)
        {