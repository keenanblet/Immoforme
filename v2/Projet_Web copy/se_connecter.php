<?php
include "header.php";
?>
<link rel="stylesheet" href="Style/se_connecter.css">
<div class="conteneur">
    <h1 class="titre">Connexion</h1>
    <p class="texte-inscription">Pas encore de compte ?<a href="s_inscrire.php">Créer un compte</a></p>

    <form action="Actions/login.php" method="POST">
        <label>Adresse e-mail</label>
        <br>
        <input type="email" id="email" name="email" class="champ" placeholder="Votre email">
        <br>
        <label>Mot de passe</label>
        <input type="password" id="motdepasse" name="password" class="champ" placeholder="Votre mot de passe">
        <br>
        <button class="btn btn-primary" type="submit">Button</button>

        <a href="#" class="motdepasse-oublie">Mot de passe oublié ?</a>

    </form>
</div>