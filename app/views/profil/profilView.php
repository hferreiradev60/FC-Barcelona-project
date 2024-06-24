<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="profil-section">
        <?php
        echo '<h1>Profil de ' . $utilisateur['prenom'] . ' ' . $utilisateur['nom'] . '</h1>';
        echo '<p>Email : ' . $utilisateur['email'] . '</p>';
        echo '<button class="button-85"><a href="/fcb/modifiermotdepasse">Modifier le mot de passe</a></button>';
        echo '<p>Membre depuis : ' . substr($utilisateur['dateCreation'], 0, 10) . '</p>';
        echo '<p>Joueur favori : ' . $utilisateur['joueurFavoriNumeroMaillot'] . ' - ' . $utilisateur['joueurFavoriPrenom'] . ' ' . $utilisateur['joueurFavoriNom'] . '</p>';
        ?>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>

</html>