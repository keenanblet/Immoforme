<?php
session_start();
include "header.php";

$token = rand(0,1000000);
$_SESSION['token'] = $token;
?>

<h1>Ajouter une catégorie</h1>

<form action="actions/insertConseil.php" method="post">

    Id agence :
    <input type="number" name="id_agence" required><br><br>

    Contact agence :
    <input type="text" name="contact_agence" required><br><br>

    Type de conseil :
    <input type="text" name="type_conseil" required><br><br>

    Description :
    <input type="text" name="description" required><br><br>

    Date de demande :
    <input type="date" name="date_demande" required><br><br>

    Statut :
    <input type="texte" name="statut" required><br><br>

    Formateur (ID) :
    <input type="number" name="id_formateur" required><br><br>

    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <input type="submit" value="Envoyer">
</form>




<?php
include "footer.php";
?>
