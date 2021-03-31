<?php
function suppSecteur(){
    $idSecteur = $_GET["id"];   
    $requete = getBDD()->prepare("DELETE FROM secteurs WHERE idSecteur = ?");
    $requete->execute([$_POST["idSecteur"]]);

    $requete = getBDD()->prepare("UPDATE employes SET idSecteur = NULL WHERE idSecteur = ?");
    $requete->execute([$_POST["idSecteur"]]);

    ?>

    <div class="alert alert-success">
        Le secteur n°<?=$_POST["idSecteur"];?> a bien été supprimé<br>
        Vous allez être redirigé vers la liste des secteurs<br>
        <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
    </div>
<?php   
header("refresh:5;listeSecteurs.php");

// Gestion des erreurs éventuelles
}

function listSecteur(){
    $requete = getBDD()->prepare("SELECT * FROM secteurs");
    $requete->execute();
    $secteurs = $requete->fetchAll(PDO::FETCH_ASSOC);
}

function ajoutSecteur(){
    $requete = getBDD()->prepare("INSERT INTO secteurs(domaine, budget)
    VALUES(?, ?)");
    $requete->execute([$domaine, $budget]);
    ?>
    <div class="alert alert-success mt-3">
        Le secteur a bien été enrengistré<br>
    </div>
    <?php
    header("refresh:3;listeSecteurs.php");

}
