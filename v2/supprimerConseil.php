<?php
session_start();

include "header.php";

$token=rand(0,1000000000);
$_SESSION['token']=$token; // Je stocke coté serveur

// on récupère l'id
$id=filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
// je vais chercher la catégorie à modifier
include_once "config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME ,  config::USER ,  config::PASSWORD);

$req=$pdo->prepare("SELECT * FROM conseils_perso where id=:id");
$req->bindParam(':id', $id);
$req->execute();
$categories=$req->fetchAll();
// je vérifie que j'en ai bien récupéré une seule
if (count($categories)!=1){
    //erreur 404
    http_response_code(404);
    die("pas de catégorie pour l'id" .$id);
}
$categorie=$categories[0];
?>

    <h1>Supprimer une formation</h1>

    <form action="actions/deleteDemande.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>" />

        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <p>Voulez-vous supprimer ?</p>
        <input type="submit" value="Supprimer" class="btn btn-danger">

    </form>


<?php
include "footer.php";
?>