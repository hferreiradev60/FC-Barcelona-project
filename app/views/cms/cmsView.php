<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="cms-section">
        <h1>CMS</h1>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($joueurs as $joueur) : ?>
                    <tr>
                        <td><img src="<?= $joueur['image'] ?>" alt="Image du joueur"></td>
                        <td><?= $joueur['prenom'] ?> <?= $joueur['nom'] ?></td>
                        <td>
                            <form action="/fcb/modifierJoueur" method="post">
                                <input type="hidden" name="id" value="<?= $joueur['idJoueur'] ?>">
                                <button class="button-85" type="submit">Modifier</button>
                            </form>
                            <form action="/fcb/supprimerJoueur" method="post">
                                <input type="hidden" name="id" value="<?= $joueur['idJoueur'] ?>">
                                <button class="button-85" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>
</body>
</html>