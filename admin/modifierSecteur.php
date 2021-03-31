<?php
require_once "../admin/entete.php";

if(!empty($_GET["success"]) && $_GET["success"] == "modifier"){
    ?>
    <div class="alert alert-success">
            Le secteur a bien été modifiée<br>
            Vous allez être redirigé vers la liste des secteurs<br>
            <a href="listeSecteurs.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php 
        header("refresh:5;listeSecteurs.php");
} 
if (!empty($_GET["error"])) 
{
    ?>
    <p style="color:red">
    <?php switch($_GET["error"]) 
    {
        case "missing": ?>
            <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
            <?php break;?>
        <?php case "domaine": ?>
            <?php echo "Une erreur s'est produite lors de la modification du domaine"; ?>
            <?php break;?>
        <?php case "budget": ?>
            <?php echo "Une erreur s'est produite lors de la modification du budget"; ?>
            <?php break;?>
        <?php case "fonction": ?>
            <?php echo "Une erreur s'est produite lors de la modification"; ?>
            <?php break;?>
    <?php 
    }
    ?>
    </p>
<?php
}
?>
<h2>Modification du secteur </h2>
        <form method="post" action="../traitements/modifierSecteur.php?id=<?=$_GET["id"];?>">
            <div class="form-group">
                <label for="domaine">Libellé :</label>
                <input type="text" class="form-control" name="domaine" id="domaine" placeholder="Saisissez le nouveau libellé"/>
                <label for="budget">Budget :</label>
                <input type="number" class="form-control" name="budget" id="budget" placeholder="Saisissez le nouveau budget"/>
            </div>
        
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Modifier le secteur</button>
            </div>
        </form>

<?php
require_once "pied.php";