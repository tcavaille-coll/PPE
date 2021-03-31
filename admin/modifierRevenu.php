<?php
require_once "../admin/entete.php";

if (!empty($_GET["id"])) 
{
    $idRevenu = $_GET["id"];
} else {
    header("location:../admin/listeRevenus.php");
}

    $revenu = recupererRevenu($idRevenu);

    $nomRevenu = $revenu["nomRevenu"];
    $gains = $revenu["gains"];
    $date = $revenu["date"];

    ?>
    <div class="container">

    <?php if(!empty($_GET["success"]) && $_GET["success"] == "modification") 
    {
        ?>
        <div class="alert alert-success mt-3">Le revenu "<?=$nomRevenu;?>" a bien été rajouté <br> 
            Vous allez être redirigé vers la liste des revenus<br>
            <a href="../admin/listeRevenus.php">Cliquez ici pour une redirection manuelle</a>
        </div>
            <?php
            header("refresh:3;../admin/listeRevenus.php");
    }
    ?>

    <?php if(!empty($_GET["error"])) 
    {
        ?>
        <div class="alert alert-danger mt-3">
        <?php switch($_GET["error"]) 
        {
            case "missing": ?>
                <?php echo "Au moins un des champs est vide"; ?>
                <?php break;?>
            <?php case "erreurmodif": ?>
                <?php echo "Une erreur s'est produite lors de la modification"; ?>
                <?php break;?>
        <?php 
        }
        ?>
        </div>
    <?php 
    }
    ?>
   
    <h1> Modification du revenu : <?=$nomRevenu;?></h1>
    <form method="post" action="/traitements/modifierRevenu.php?id=<?=$revenu["idRevenu"];?>">
        <div class="form-group">
            <label for="nomRevenu">Libellé du revenu :</label>
            <input type="text" class="form-control" name="nomRevenu" id="nomRevenu" placeholder="Saisissez le libellé du revenu" value="<?=$revenu['nomRevenu'];?>"/>
        </div>
        <div class="form-group">
            <label for="gains">Somme gagnée :</label>
            <input type="number" class="form-control" name="gains" id="gains" placeholder="Saisissez la somme gagnée" value="<?=$revenu['gains'];?>"/>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date" value="<?=$revenu['date'];?>"/>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-outline-primary">Modifier le revenu</button>
            <a href="../admin/listeRevenus.php" class="btn btn-outline-secondary">Revenir à la liste</a>
        </div>
    </form>

<?php

require_once "pied.php";
