<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="actualites-section">
        <?php foreach ($actualites as $actualite) : ?>
            <div class="actualite">
                <?php if (!empty($actualite['image'])) : ?>
                    <img src="<?= htmlspecialchars($actualite['image']) ?>" alt="Image de l'actualité">
                <?php endif; ?>
                <h3><?= htmlspecialchars($actualite['titre']) ?></h3>
                <p><?= htmlspecialchars($actualite['contenu']) ?></p>
                <p>Date de publication : <?= htmlspecialchars($actualite['datePublication']) ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>
</html>