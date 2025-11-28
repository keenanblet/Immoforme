<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion </title>
</head>
<body>
<?php

session_start();
include_once 'config.php';

$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME ,  config::USER ,  config::PASSWORD);

$email = $_POST['email'];
$password = $_POST['password'];

$req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$req->execute([$email]);
$user = $req->fetch();

if ($user && password_verify($password, $user['password'])) {
    echo "Connexion réussie !";
    $_SESSION['user_id'] = $user['id'];

    echo'<form action="suite.html" method="post">
         <button type="submit">bienvenue</button>
         </form>';
    exit();

} else {
    echo "Email ou mot de passe incorrect.";

    echo'<form action="accueil2.php" method="post">
         <button type="submit">Retour</button>
         </form>';
    exit();
}

?>

</body>
</html>