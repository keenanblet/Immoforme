<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immoform</title>
</head>

<body>
 <?php

session_start();
include_once 'config.php';

$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>
   
      <form class
      
      ="d-flex" action="connexion.php" method="post" role="search">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <button class="btn btn-outline-success" type="submit">Se connecter</button>
      </form>
          <form class="d-flex" action="creer_compte.php" method="post" role="search">
          <button class="btn btn-outline-success" type="submit">Créer un compte</button>
      </form>
      <form action="modifier_mdp.php" method="post">
        <button class="btn btn-outline-success" type="submit">Modifier mot de passe</button>
      </form>
      <form class="d-flex" action="accueil1.html" method="post" role="search">
        
        <button class="btn btn-outline-success" type="submit">Retour</button>
      </form>
    </div>
  </div>
</nav>
