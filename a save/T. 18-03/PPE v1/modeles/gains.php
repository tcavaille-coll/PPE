<?php
function suppGain(){ 
    $idRevenu = $_GET["id"];  
    $requete = getBDD()->prepare("DELETE FROM revenus WHERE idRevenu = ?");
    $requete->execute([$_POST["idRevenu"]]);

    $requete = getBDD()->prepare("UPDATE revenus SET idRevenu = NULL WHERE idRevenu = ?");
    $requete->execute([$_POST["idRevenu"]]);
    ?>

    <div class="alert alert-success">
        La catégorie n°<?=$_POST["idRevenu"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la page d'acceuil<br>
        <a href="index.php">Cliquez ici pour une redirection manuelle</a>
    </div>
<?php   
header("refresh:5;listeGains.php");

}