<?php
session_start();

$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_DEFAULT);

if (!$nom || !$prenom || !$email || !$password || !$password2) {
    die("Tous les champs sont obligatoires.");
}

if ($password !== $password2) {
    die("Les mots de passe ne correspondent pas.");
}

// Hachage du mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

include_once "../config.php";

$pdo = new PDO(
    'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME . ';charset=utf8',
    config::USER,
    config::PASSWORD
);

// Vérification email déjà utilisé
$req = $pdo->prepare("SELECT id FROM contact WHERE email = :email");
$req->bindParam(':email', $email);
$req->execute();

if ($req->fetch()) {
    die("Cet email est déjà utilisé.");
}

// INSERT PROPRE
$req = $pdo->prepare("
    INSERT INTO contact (nom, prenom, email, password)
    VALUES (:nom, :prenom, :email, :password)
");

$req->bindParam(':nom', $nom);
$req->bindParam(':prenom', $prenom);
$req->bindParam(':email', $email);
$req->bindParam(':password', $hashed_password);

$req->execute(); // ✔ PAS DE TABLEAU ICI

header("Location: /admin/page_accueil.php");
exit;

?>
