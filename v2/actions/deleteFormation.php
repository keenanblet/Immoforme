<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);
// On récupère les données du post

if($tokenRecu != $tokenServeur){
    die('erreur');
}

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
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME ,  config::USER ,  config::PASSWORD);


// avec ci-dessous on enlève les possibilités d'injections SQL
$req = $pdo->prepare("delete from  formation_en_ligne where id=:id");
$req->bindParam(':id', $id);

$req->execute();

// retour à la page d'accueil
header("Location: ../page_accueil.php");