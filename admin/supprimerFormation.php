<?php
session_start();
include "header.php";

// Génération du token CSRF
$token = rand(0, 1000000000);
$_SESSION['token'] = $token;

// On récupère l'ID de la formation
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

include_once "config.php";
$pdo = new PDO(
        'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,
        config::USER,
        config::PASSWORD
);

// On récupère la formation
$req = $pdo->prepare("SELECT * FROM formation_en_ligne WHERE id = :id");
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();

$formation = $req->fetch(PDO::FETCH_ASSOC);

// Vérification : existe ?
if (!$formation) {
    http_response_code(404);
    die("Formation introuvable pour l'ID " . $id);
}
?>

<h1>Supprimer une formation</h1>

<form action="actions/deleteFormation.php" method="post">

    <input type="hidden" name="id" value="<?php echo $formation['id']; ?>">
    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <p>Voulez-vous vraiment supprimer la formation :
        <strong><?php echo htmlentities($formation['titre']); ?></strong> ?</p>

    <input type="submit" value="Supprimer" class="btn btn-danger">
</form>

<?php
include "footer.php";
?>
