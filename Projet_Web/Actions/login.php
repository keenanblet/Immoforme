<?php
session_start();

// On récupère les données du formulaire
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);  // <<< corrigé

// Connexion BDD
include_once "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME . ';charset=utf8', config::USER, config::PASSWORD);
$req = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$req->bindParam(':email', $email);
$req->execute();
$user = $req->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];

    header("Location: ../connexion_reussi.php");
    exit;
} else {
    echo "Email ou mot de passe incorrect.";
    exit;
}

?>
