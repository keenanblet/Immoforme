<?php
session_start();

$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);

if ($tokenRecu != $tokenServeur) {
    die('erreur');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$id_agence = filter_input(INPUT_POST, 'id_agence', FILTER_VALIDATE_INT);
$contact_agence = filter_input(INPUT_POST, 'contact_agence', FILTER_VALIDATE_INT);
$type_conseil = filter_input(INPUT_POST, 'type_conseil', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$date_demande = filter_input(INPUT_POST, 'date_demande', FILTER_DEFAULT);
$statut = filter_input(INPUT_POST, 'statut', FILTER_VALIDATE_INT);
$id_formateur = filter_input(INPUT_POST, 'id_formateur', FILTER_VALIDATE_INT);

include "../config.php";

$pdo = new PDO(
    'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,
    config::USER,
    config::PASSWORD
);

$req = $pdo->prepare("
    UPDATE conseils_perso SET
        id_agence = :id_agence,
        contact_agence = :contact_agence,
        type_conseil = :type_conseil,
        description = :description,
        date_demande = :date_demande,
        statut = :statut,
        id_formateur = :id_formateur
    WHERE id = :id
");

$req->bindParam(':id_agence', $id_agence, PDO::PARAM_INT);
$req->bindParam(':contact_agence', $contact_agence, PDO::PARAM_INT);
$req->bindParam(':type_conseil', $type_conseil, PDO::PARAM_INT);
$req->bindParam(':description', $description);
$req->bindParam(':date_demande', $date_demande);
$req->bindParam(':statut', $statut, PDO::PARAM_INT);
$req->bindParam(':id_formateur', $id_formateur, PDO::PARAM_INT);
$req->bindParam(':id', $id, PDO::PARAM_INT);

$req->execute();

header("Location: ../page_accueil.php");
exit;
