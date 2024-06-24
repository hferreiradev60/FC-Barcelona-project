<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="modifierMotDePasse-section">
        <h2>Modifier le mot de passe</h2>
        <form action="/fcb/modifiermotdepasse" method="post">
            <div class="form-row">
                <label for="nouveau-mot-de-passe">Nouveau mot de passe :</label>
                <input type="password" id="nouveau-mot-de-passe" name="nouveau-mot-de-passe" required>
            </div>
            <div class="form-row">
                <label for="confirmer-mot-de-passe">Confirmer le nouveau mot de passe :</label>
                <input type="password" id="confirmer-mot-de-passe" name="confirmer-mot-de-passe" required>
            </div>
            <button class="button" type="submit">Modifier le mot de passe</button>
        </form>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>

</html>