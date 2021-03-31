<?php
function recupererEmploye()
{
    $requete = getBdd()->prepare("SELECT * FROM utilisateur");
    $requete->execute();
    return $requete->fetchAll();
}

function suppEmploye($idUtilisateur){
    $idEmploye = $_GET["id"];
    $requete = getBDD()->prepare("DELETE FROM utilisateur WHERE idEmploye = ?");
    $requete->execute([$_POST["idEmploye"]]);
    ?>

    <div class="alert alert-success">
        L'employé n°<?=$_POST["idEmploye"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la liste des employés<br>
        <a href="listeEmployes.php">Cliquez ici pour une redirection manuelle</a>
    </div>  
<?php 
}
function listEmploye(){
    $requete = getBDD()->prepare("SELECT * FROM employes 
    LEFT JOIN secteurs USING(idSecteur)");
    $requete->execute();
    $employes = $requete->fetchAll(PDO::FETCH_ASSOC);
}