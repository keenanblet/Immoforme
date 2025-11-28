<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un compte</title>
</head>
<body>

<?php
session_start();
include "config.php";
// Récupération des données
$nom = filter_input(INPUT_POST, 'nom', FILTER_DEFAULT);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_DEFAULT);

;
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,config::USER,config::PASSWORD);

// Toutes les vérifications :

// Vérification du nom et prénom (lettres uniquement)
if (!preg_match("/^[a-zA-ZÀ-ÿ '-]+$/u", $nom) || !preg_match("/^[a-zA-ZÀ-ÿ '-]+$/u", $prenom)) {
    echo 'Le nom et le prénom ne doivent contenir que des lettres !';
    echo '<form action="creer_compte.php" method="post">
          <button type="submit">Retour</button>
          </form>';
    exit();
}

// Vérifier si l’email existe déjà
$check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$check->execute([$email]);

if ($check->fetch()) {
    echo 'Email déjà utilisé !';
    echo '<form action="creer_compte.php" method="post">
          <button type="submit">Retour</button>
          </form>';
    exit();
}

// Vérification des mots de passe
if ($password !== $confirm_password) {
        echo 'Les mots de passe ne correspondent pas !';
        echo '<form action="creer_compte.php" method="post">
              <button type="submit">Retour</button>
              </form>';
        exit();
}

// Vérification de la complexité du mot de passe
if (strlen($password) < 8) {
    echo 'Le mot de passe doit contenir au moins 8 caractères !';
    echo '<form action="creer_compte.php" method="post">
          <button type="submit">Retour</button>
          </form>';
    exit();
}

// Vérification de la présence de majuscules, minuscules et chiffres
if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)){
    echo 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et un chiffre !';
    echo '<form action="creer_compte.php" method="post">
          <button type="submit">Retour</button>
          </form>';
    exit();
}

// Hash du mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insertion du compte
$req = $pdo->prepare("INSERT INTO users (nom, prenom, email, password, email_verified) VALUES (:nom, :prenom, :email, :password, 0)");

$req->bindParam(":nom", $nom);
$req->bindParam(":prenom", $prenom);
$req->bindParam(":email", $email);
$req->bindParam(":password", $hashedPassword);

$req->execute();

// Redirection vers connexion
header("Location: accueil2.php");
?>
</body>
</html>