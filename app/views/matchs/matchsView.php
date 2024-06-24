<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section id="prochainsMatchs">
        <h2>Prochains matchs</h2>
        <ul id="matchsList">
        <?php
            $prochainsMatchs = isset($prochainsMatchs) ? $prochainsMatchs : [];

            if ($prochainsMatchs) {
                foreach ($prochainsMatchs as $match) {
                    echo '<li>';
                    echo '<span>' . $match['dateMatch'] . ' - ' . substr($match['heureMatch'], 0, 5) . '</span>';
                    echo '<br>';
                    echo '<span>' . '<img src="' . $match['logoDomicile'] . '" alt="Logo domicile" style="transform: scale(2);"></span>';
                    echo '<br>';
                    echo '<h1> VS </h1>';
                    echo '<br>';
                    echo '<span>' . '<img src="' . $match['logoExterieur'] . '" alt="Logo extérieur" style="transform: scale(2);"></span>';
                    echo '</li>';
                }
            } else {
                echo 'Aucun prochain match trouvé.';
            }
            ?>
        </ul>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>
</html>