<?php
require_once "entete.php";

if (isset($_POST["nomDepense"]) && !empty($_POST["nomDepense"]) && isset($_POST["depense"]) && !empty($_POST["depense"]) && isset($_POST["date"]) && !empty($_POST["date"])){
    extract($_POST);
    try {
        $requete = getBDD()->prepare("INSERT INTO depenses(nomDepense, depense, date)
        VALUES(?, ?, ?)");
        $requete->execute([$nomDepense, $depense, $date]);
        ?>
        <div class="alert alert-sucess mt-3">
            La charge a bien été enrengistrée<br>
            Vous allez être redirigé vers la page d'acceuil<br>
            <a href="index.php">Cliquez ici si vous ne voulez pas attendre</a>
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
<h1> Ajout d'une nouvelle charge</h1>
<form method="post">
    <div class="form-group">
        <label for="nomDepense">nom de la dépense</label>
        <input type="text" class="form-control" name="nomDepense" id="nomDepense" placeholder="Saisissez la charge à payé"/>
    </div>
    <div class="form-group">
        <label for="depense">somme a payé</label>
        <input type="number" class="form-control" name="depense" id="depense" placeholder="Saisissez la somme à payé"/>
    </div>
    <div class="form-group">
        <label for="date">date</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Saisissez la date"/>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Ajouter la catégorie</button>
    </div>
</form>

<?php
require_once "pied.php";
