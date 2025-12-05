<?php
session_start();

$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token');

if ($tokenRecu != $tokenServeur) {
    die("Erreur CSRF");
}

// Récupération des données envoyées par le formulaire
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$titre = filter_input(INPUT_POST, 'titre', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$duree = filter_input(INPUT_POST, 'duree', FILTER_VALIDATE_INT);
$niveau = filter_input(INPUT_POST, 'niveau', FILTER_DEFAULT);
$secteur = filter_input(INPUT_POST, 'secteur', FILTER_DEFAULT);
$date_heure_formation = filter_input(INPUT_POST, 'date_heure_formation', FILTER_DEFAULT);
$url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
$id_formateur = filter_input(INPUT_POST, 'id_formateur', FILTER_VALIDATE_INT);

include "../config.php";

// Connexion à la base
$pdo = new PDO(
    'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,
    config::USER,
    config::PASSWORD
);

// ===============================================
// MISE À JOUR DE LA FORMATION
// ===============================================

$req = $pdo->prepare("
    UPDATE formation_en_ligne SET
        titre = :titre,
        description = :description,
        durée = :duree,
        niveau = :niveau,
        secteur = :secteur,
        date_heure_formation = :date_heure_formation,
        url = :url,
        id_formateur = :id_formateur
    WHERE id = :id
");

$req->bindParam(':titre', $titre);
$req->bindParam(':description', $description);
$req->bindParam(':duree', $duree, PDO::PARAM_INT);
$req->bindParam(':niveau', $niveau);
$req->bindParam(':secteur', $secteur);
$req->bindParam(':date_heure_formation', $date_heure_formation);
$req->bindParam(':url', $url);
$req->bindParam(':id_formateur', $id_formateur, PDO::PARAM_INT);
$req->bindParam(':id', $id, PDO::PARAM_INT);

$req->execute();

// Redirection
header("Location: ../page_accueil.php");
exit;
