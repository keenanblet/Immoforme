<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Créer un compte</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  
<?php
session_start();
include_once 'config.php';
$tokenServeur = $_SESSION['token'] ?? '';
$tokenRecu = filter_input(INPUT_POST, 'token');
?>


<div class="container">
    <h2>Créer un compte</h2>
    <form action="insert.php" method="post">
        <input type="text" name="nom" required title="Uniquement des lettres"><br>
        <input type="text" name="prenom" required title="Uniquement des lettres"><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required><br>
        <input type="hidden" name="token" value="<?= $token ?>">
        <button type="submit">S'inscrire</button>
        </form>       
      <form class="d-flex" action="accueil2.html" method="post" role="search">
        
        <button class="btn btn-outline-success" type="submit">Retour</button>
    </form>
</div>
</body>
</html>
