<?php
require_once "entete.php";

if(!empty($_GET["success"]) && $_GET["success"] == "modifier"){
    ?>
    <div class="alert alert-success">
            Les informations de l'employé ont bien été modifiées<br>
            Vous allez être redirigé vers la liste des employés<br>
            <a href="listeEmployes.php">Cliquez ici pour une redirection manuelle</a>
        </div>
        <?php   
        header("refresh:5;listeEmployes.php");
    }

if (!empty($_GET["error"])) 
    {
        ?>
        <p style="color:red">
        <?php switch($_GET["error"]) 
        {
            case "erreurid": ?>
                <?php echo "Une erreur s'est produite lors de la récupération de l'id"; ?>
                <?php break;?>
            <?php case "nom": ?>
                <?php echo "Une erreur s'est produite lors de la modification du nom"; ?>
                <?php break;?>
            <?php case "prenom": ?>
                <?php echo "Une erreur s'est produite lors de la modification du prenom"; ?>
                <?php break;?>
            <?php case "poste": ?>
                <?php echo "Une erreur s'est produite lors de la modification du poste"; ?>
                <?php break;?>
            <?php case "salaire": ?>
                <?php echo "Une erreur s'est produite lors de la modification du salaire"; ?>
                <?php break;?>
            <?php case "secteur": ?>
                <?php echo "Une erreur s'est produite lors de la modification du secteur"; ?>
                <?php break;?>
            <?php case "identifiant": ?>
                <?php echo "Une erreur s'est produite lors de la modification de l'identifiant"; ?>
                <?php break;?>
            <?php case "idRole": ?>
                <?php echo "Une erreur s'est produite lors de la modification du role"; ?>
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

    <h1>Modification des informations de l'employé</h1>
    <form method="post" action="../traitements/modifierEmploye.php?id=<?=$_GET["id"];?>">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisissez le nom"/>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisissez le prénom"/>
        </div>
        <div class="form-group">
            <label for="poste">Poste :</label>
            <input type="text" class="form-control" name="poste" id="poste" placeholder="Saisissez le poste" />
        </div>
        <div class="form-group">
            <label for="salaire">Salaire brut:</label>
            <input type="number" class="form-control" name="salaire" id="salaire" placeholder="Saisissez le salaire"/>
        </div>
        <div class="form-group">
            <label for="identifiant">identifiant:</label>
            <input type="text" class="form-control" name="identifiant" id="identifiant" placeholder="Saisissez l'identifiant"/>
        </div>
        <div class="form-group">
            <label for="idSecteur">Secteur :</label>
            <input type="number" class="form-control" name="idSecteur" id="idSecteur" placeholder="Saisissez le secteur"/>
        </div>
        <div class="form-group">
            <label for="idRole">idRole :</label>
            <input type="number" class="form-control" name="idRole" id="idRole" placeholder="Saisissez l'idRole"/>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Modifier les informations</button>
        </div>
    </form>

<?php
require_once "pied.php";