<?php
include "header.php";
?>

<h1>Bienvenue sur votre espace administrateur</h1>

<?php
$pdo = new PDO(
        'mysql:host=' . config::HOST . ';dbname=' . config::DBNAME,
        config::USER,
        config::PASSWORD
);

$req = $pdo->prepare("SELECT * FROM conseils_perso");
$req->execute();
$demandes = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-striped">
    <tr>
        <th>ID Agence</th>
        <th>Contact Agence</th>
        <th>Type de Conseil</th>
        <th>Description</th>
        <th>Date de Demande</th>
        <th>Statut</th>
        <th>ID Formateur</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($demandes as $demande): ?>
        <tr>
            <td><?php echo htmlentities($demande["id_agence"]); ?></td>
            <td><?php echo htmlentities($demande["contact_agence"]); ?></td>
            <td><?php echo htmlentities($demande["type_conseil"]); ?></td>
            <td><?php echo htmlentities($demande["description"]); ?></td>
            <td><?php echo htmlentities($demande["date_demande"]); ?></td>
            <td><?php echo htmlentities($demande["statut"]); ?></td>
            <td><?php echo htmlentities($demande["id_formateur"]); ?></td>

            <td>
                <a href="modifierConseil.php?id=<?php echo $demande["id"]; ?>" class="btn btn-warning">Modifier</a>

                <a href="ajouterFormation.php?id=<?php echo $demande['id']; ?>" class="btn btn-success">Accepter</a>
                <a href="actions/deleteDemande.php?id=<?php echo $demande["id"]; ?>" class="btn btn-danger">Rejeter</a>
                <a href="supprimerConseil.php?id=<?php echo $demande["id"]; ?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="ajouterConseil.php" class="btn btn-success">Ajouter</a>

<h2>Formations en ligne créées</h2>

<?php
$req2 = $pdo->prepare("SELECT * FROM formation_en_ligne");
$req2->execute();
$formations = $req2->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-striped">
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Durée</th>
        <th>Niveau</th>
        <th>Secteur</th>
        <th>Date & heure</th>
        <th>URL</th>
        <th>ID Formateur</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($formations as $formation): ?>
        <tr>
            <td><?php echo htmlentities($formation["titre"]); ?></td>
            <td><?php echo htmlentities($formation["description"]); ?></td>
            <td><?php echo htmlentities($formation["durée"]); ?></td>
            <td><?php echo htmlentities($formation["niveau"]); ?></td>
            <td><?php echo htmlentities($formation["secteur"]); ?></td>
            <td><?php echo htmlentities($formation["date_heure_formation"]); ?></td>
            <td><?php echo htmlentities($formation["url"]); ?></td>
            <td><?php echo htmlentities($formation["id_formateur"]); ?></td>

            <td>
                <a href="modifierFormation.php?id=<?php echo $formation['id']; ?>" class="btn btn-warning">Modifier</a>
                <a href="supprimerFormation.php?id=<?php echo $formation['id']; ?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="ajouterFormation.php" class="btn btn-success">Ajouter</a>

<?php
include "footer.php";
?>
