<?php
if (!empty($_SESSION["prenom"])) 
{
    header("location:membre/index.php");
} else {
    header("location:visiteur/index.php");
}
