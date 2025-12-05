<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);
// On récupère les données du post

if($tokenRecu != $tokenServeur){
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
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME ,  config::USER ,  config::PASSWORD);


// avec ci-dessous on enlève les possibilités d'injections SQL
$req = $pdo->prepare("delete from  conseils_perso where id=:id");
$req->bindParam(':id', $id);

$req->execute();

// retour à la page d'accueil
header("Location: ../page_accueil.php");