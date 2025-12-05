<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="Style/s_inscrire.css">
</head>

<body>

<div class="conteneur">
    <h1 class="titre">Créer un compte</h1>
    <p class="texte-connexion">Déjà un compte ? <a href="se_connecter.php">Se connecter</a></p>

    <form class="d-flex" action="Actions/register.php" method="POST">
        <label>Nom</label>
        <input type="text" class="champ" name="nom" placeholder="Votre Nom">

        <label>Prénom</label>
        <input type="text" class="champ" name="prenom" placeholder="Votre Prenom">

        <label>Email</label>
        <input type="email" class="champ" name="email" placeholder="Votre Email">

        <label>Mot de passe</label>
        <input type="password" class="champ" name="password" placeholder="Votre Mot de passe">

        <label>Confirmer le mot de passe</label>
        <input type="password" class="champ" name="password2" placeholder="Réécrivez votre Mot de passe">

        <button type="submit" class="bouton-inscription">Créer un compte</button>
    </form>
</div>

</body>
</html>
<?php
