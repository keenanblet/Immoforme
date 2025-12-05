<?php
session_start();
include "header.php";

// On récupère l'ID de la demande depuis ?id=...
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$token = rand(0,1000000);
$_SESSION['token'] = $token;
?>

<h1>Ajouter une formation en ligne</h1>

<form action="actions/insertFormation.php" method="post">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    Titre :
    <input type="text" name="titre" required maxlength="100"><br><br>

    Description : <br>
    <textarea name="description" required></textarea><br><br>

    Durée (en heures) :
    <input type="number" name="duree" min="1" required><br><br>

    Niveau :
    <input type="text" name="niveau" maxlength="30" required><br><br>

    Secteur :
    <input type="text" name="secteur" maxlength="50" required><br><br>

    Date & heure de la formation :
    <input type="datetime-local" name="date_heure_formation" required><br><br>

    URL :
    <input type="text" name="url" maxlength="200" required><br><br>

    Formateur (ID) :
    <input type="number" name="id_formateur" required><br><br>

    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <input type="submit" value="Ajouter la formation" class="btn btn-success">

</form>

<?php include "footer.php"; ?>
