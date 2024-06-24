<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="player-details">
        <?php
        if ($joueur) {
            echo '<h1>' . $joueur['prenom'] . ' ' . $joueur['nom'] . '</h1>';
            echo '<img src="' . $joueur['image'] . '" alt="' . $joueur['prenom'] . ' ' . $joueur['nom'] . '">';
            echo '<br>';
            echo '<strong>Numéro de maillot : ' . $joueur['numeroMaillot'] . '</strong>';
            echo '<br>';
            echo '<span>' . $joueur['description'] . '</span>';
            echo '<br>';
            echo '<span>Date de naissance : ' . $joueur['dateNaissance'] . '</span>';
            echo '<br>';
            echo '<span>Lieu de naissance : ' . $joueur['lieuNaissance'] . ', ' . $joueur['paysNaissance'] . '</span>';
            echo '<br>';
            echo '<span>Poids : ' . $joueur['poids'] . ' kg ' . '</span>';
            echo '<br>';
            echo '<span>Taille : ' . $joueur['taille'] . ' cm ' . '</span>';
            echo '<br>';
        } else {
            echo 'Aucun joueur trouvé.';
        }
        ?>

    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>
</html>