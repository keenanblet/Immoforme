<?php
session_start();
include "header.php";

$token = rand(0, 1000000000);
$_SESSION['token'] = $token;

// on récupère l'id
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$pdo = new PDO(
        'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,
        config::USER,
        config::PASSWORD
);

// Récupération de la formation
$req = $pdo->prepare("SELECT * FROM formation_en_ligne WHERE id = :id");
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$formation = $req->fetch(PDO::FETCH_ASSOC);

// Vérification
if (!$formation) {
    http_response_code(404);
    die("Aucune formation trouvée pour l'id " . $id);
}
?>

<h1>Modifier une formation en ligne</h1>

<form action="actions/updateFormations.php" method="post">

    <input type="hidden" name="id" value="<?php echo $formation['id']; ?>">
    <input type="hidden" name="token" value="<?php echo $token; ?>">

    Titre :
    <input type="text" name="titre" required maxlength="100"
           value="<?php echo htmlentities($formation['titre']); ?>"><br><br>

    Description : <br>
    <textarea name="description" required><?php echo htmlentities($formation['description']); ?></textarea><br><br>

    Durée (en heures) :
    <input type="number" name="duree" required min="1"
           value="<?php echo htmlentities($formation['durée']); ?>"><br><br>

    Niveau :
    <input type="text" name="niveau" maxlength="30" required
           value="<?php echo htmlentities($formation['niveau']); ?>"><br><br>

    Secteur :
    <input type="text" name="secteur" maxlength="50" required
           value="<?php echo htmlentities($formation['secteur']); ?>"><br><br>

    Date & heure de la formation :
    <input type="datetime-local" name="date_heure_formation" required
           value="<?php echo date('Y-m-d\TH:i', strtotime($formation['date_heure_formation'])); ?>"><br><br>

    URL :
    <input type="text" name="url" maxlength="200" required
           value="<?php echo htmlentities($formation['url']); ?>"><br><br>

    Formateur (ID) :
    <input type="number" name="id_formateur" required
           value="<?php echo htmlentities($formation['id_formateur']); ?>"><br><br>

    <input type="submit" value="OK" class="btn btn-success">

</form>

<?php
include "footer.php";
?>
