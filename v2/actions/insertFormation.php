<?php
session_start();

$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);

if ($tokenRecu != $tokenServeur) {
    die('erreur CSRF');
}

// L'ID DE LA DEMANDE !!
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$titre = filter_input(INPUT_POST, 'titre');
$description = filter_input(INPUT_POST, 'description');
$duree = filter_input(INPUT_POST, 'duree', FILTER_VALIDATE_INT);
$niveau = filter_input(INPUT_POST, 'niveau');
$secteur = filter_input(INPUT_POST, 'secteur');
$date_heure_formation = filter_input(INPUT_POST, 'date_heure_formation');
$url = filter_input(INPUT_POST, 'url');
$id_formateur = filter_input(INPUT_POST, 'id_formateur', FILTER_VALIDATE_INT);

include "../config.php";

$pdo = new PDO(
    'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,
    config::USER,
    config::PASSWORD
);

// 1️⃣ INSÉRER LA FORMATION EN LIGNE
$req = $pdo->prepare("
    INSERT INTO formation_en_ligne 
    (titre, description, durée, niveau, secteur, date_heure_formation, url, id_formateur)
    VALUES
    (:titre, :description, :duree, :niveau, :secteur, :date_heure_formation, :url, :id_formateur)
");

$req->bindParam(':titre', $titre);
$req->bindParam(':description', $description);
$req->bindParam(':duree', $duree);
$req->bindParam(':niveau', $niveau);
$req->bindParam(':secteur', $secteur);
$req->bindParam(':date_heure_formation', $date_heure_formation);
$req->bindParam(':url', $url);
$req->bindParam(':id_formateur', $id_formateur);

$req->execute();

// 2️⃣ METTRE À JOUR LA DEMANDE
$update = $pdo->prepare("
    UPDATE conseils_perso 
    SET statut = 'Accepter'
    WHERE id = :id
");
$update->bindParam(':id', $id);
$update->execute();

// 3️⃣ REDIRECTION
header("Location: ../page_accueil.php");
exit;
