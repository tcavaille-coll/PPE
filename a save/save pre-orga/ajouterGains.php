<?php
require_once "entete.php";

if (isset($_POST["nomRevenu"]) && !empty($_POST["nomRevenu"]) && isset($_POST["gains"]) && !empty($_POST["gains"]) && isset($_POST["date"]) && !empty($_POST["date"])){
    extract($_POST);
    try {
        $requete = getBDD()->prepare("INSERT INTO revenus(nomRevenu, gains, date)
        VALUES(?, ?, ?)");
        $requete->execute([$nomRevenu, $gains, $date]);
        ?>

        <div class="alert alert-success mt-3">
            Le gain a bien été enrengistré<br>
            Vous allez être redirigé vers la page d'accueil<br>
            <a href="index.php">Cliquez ici pour une redirection manuelle</a>
        </div>

        <?php
        header("refresh:5;index.php");
        } catch (Exception $e) {
            ?>
            <div class ="alert alert-danger"> Erreur : la catégorie n'a pas été enrengistrée
            <?php $e->getMessage(); ?>
            </div>
        <?php
        }
}
?>
<h1> Ajout d'un nouveau gain</h1>
<form method="post">
    <div class="form-group">
        <label for="nomRevenu">Libellé du gain :</label>
        <input type="text" class="form-control" name="nomRevenu" id="nomRevenu" placeholder="Saisissez le libellé du gain"/>
    </div>
    <div class="form-group">
        <label for="gains">Somme gagnée :</label>
        <input type="number" class="form-control" name="gains" id="gains" placeholder="Saisissez la somme gagnée"/>
    </div>
    <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date"/>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Ajouter le gain</button>
    </div>
</form>

<?php
require_once "pied.php";