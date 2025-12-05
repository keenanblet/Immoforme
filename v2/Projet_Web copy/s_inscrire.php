<?php
include "header.php";
?>
<link rel="stylesheet" href="Style/s_inscrire.css">
<div class="conteneur">
    <h1 class="titre">Créer un compte</h1>
    <p class="texte-connexion">Déjà un compte ? <a href="se_connecter.php">Se connecter</a></p>

    <form action="Actions/register.php" method="POST">
        <label>Nom</label>
        <br>
        <input type="text" class="champ" name="nom" placeholder="Votre Nom">
        <br>
        <label>Prénom</label>
        <br>
        <input type="text" class="champ" name="prenom" placeholder="Votre Prenom">
        <br>
        <label>Email</label>
        <input type="email" class="champ" name="email" placeholder="Votre Email">
        <br>
        <label>Mot de passe</label>
        <input type="password" class="champ" name="password" placeholder="Votre Mot de passe">
        <br>
        <label>Confirmer le mot de passe</label>
        <input type="password" class="champ" name="password2" placeholder="Réécrivez votre Mot de passe">
        <br>

        <button type="submit" class="bouton-inscription">Créer un compte</button>
    </form>
</div>


