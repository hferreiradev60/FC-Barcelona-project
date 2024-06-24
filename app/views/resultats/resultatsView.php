<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section id="resultatsMatches">
        <h1>Résultats des matchs</h1>
        <ul id="resultatsList">
        <?php
            $resultatsMatches = isset($resultatsMatches) ? $resultatsMatches : [];

            if ($resultatsMatches) {
                foreach ($resultatsMatches as $resultat) {
                    echo '<li>';
                    echo '<span>' . $resultat['dateMatch'] . '</span>';
                    echo '<br>';
                    echo '<span>' . '<img src="' . $resultat['logoDomicile'] . '" alt="Logo domicile" style="transform: scale(2);"></span>';
                    echo '<span class="score">' . $resultat['scoreEquipeDomicile'] . '</span>';
                    echo '<h1> VS </h1>';
                    echo '<span class="score">' . $resultat['scoreEquipeExterieur'] . '</span>';
                    echo '<span>' . '<img src="' . $resultat['logoExterieur'] . '" alt="Logo extérieur" style="transform: scale(2);"></span>';
                    echo '<button class="button-85">En savoir plus</span>';
                    echo '</li>';
                }
            } else {
                echo 'Aucun résultat trouvé.';
            }
            ?>
        </ul>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>
</html>
