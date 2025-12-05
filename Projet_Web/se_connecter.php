<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="Style/se_connecter.css">
    <link rel="stylesheet" href="Style/header.css">
</head>

<body>
<nav class="navbar">
    <div class="logo">Immoform</div>
    <ul class="menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="#">Présentation</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
<div class="conteneur">

    <div class="bloc-formulaire">
        <h1 class="titre">Connexion</h1>

        <p class="texte-inscription">
            Pas encore de compte ?
            <a href="s_inscrire.php">Créer un compte</a>
        </p>

        <form class="d-flex" action="Actions/login.php" method="POST">

            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="champ" placeholder="Votre email">

            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="password" class="champ" placeholder="Votre mot de passe">

            <div class="souvenir">
                <input type="checkbox" id="souvenir-moi">
                <label for="souvenir-moi">Se souvenir de moi</label>
            </div>

            <button type="submit" class="bouton-connexion">Se connecter</button>

            <a href="#" class="motdepasse-oublie">Mot de passe oublié ?</a>

        </form>
    </div>

    <div class="bloc-vide"></div>

</div>

</body>
</html>