<?php
session_start();

include "header.php";

$token=rand(0,1000000000);
$_SESSION['token']=$token; // Je stocke coté serveur

// on récupère l'id
$id=filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
// je vais chercher la catégorie à modifier

$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME ,  config::USER ,  config::PASSWORD);

$req=$pdo->prepare("SELECT * FROM conseils_perso where id=:id");
$req->bindParam(':id', $id);
$req->execute();
$formations=$req->fetchAll();
// je vérifie que j'en ai bien récupéré une seule
if (count($formations)!=1){
    //erreur 404
    http_response_code(404);
    die("pas de catégorie pour l'id" .$id);
}
$demande=$formations[0];
?>

    <h1>Modifier une formation</h1>

    <form action="actions/updateConseil.php" method="post">

        <input type="hidden" name="id" value="<?php echo $demande['id']; ?>">

        Id agence :
        <input type="number" name="id_agence" required value="<?php echo htmlentities($demande['id_agence']); ?>"><br><br>

        Contact agence :
        <input type="text" name="contact_agence" required value="<?php echo htmlentities($demande['contact_agence']); ?>"><br><br>

        Type de conseil :
        <input type="text" name="type_conseil" required value="<?php echo htmlentities($demande['type_conseil']); ?>"><br><br>

        Description :
        <input type="text" name="description" required value="<?php echo htmlentities($demande['description']); ?>"><br><br>

        Date de demande :
        <input type="date" name="date_demande" required value="<?php echo htmlentities($demande['date_demande']); ?>"><br><br>

        Statut :
        <input type="text" name="statut" required value="<?php echo htmlentities($demande['statut']); ?>"><br><br>

        Formateur (ID) :
        <input type="number" name="id_formateur" required value="<?php echo htmlentities($demande['id_formateur']); ?>"><br><br>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <input type="submit" value="OK">
    </form>




<?php
include "footer.php";
?>