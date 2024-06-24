<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>
    <section class="login-section">
        <div class="login-container">
            <img src="/fcb/public/img/icon.ico" alt="Logo FC Barcelone" class="logo">
            <p class="welcome-message">Bonjour, Culer</p>
            
            <form class="login-form" action="/fcb/login" method="post">
                <div class="form-row">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-row">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button class="button" type="submit">Se connecter</button>
            </form>

            <p class="register-link">Vous n'avez pas de compte ? <a href="/fcb/register">Inscrivez-vous ici</a></p>
        </div>
    </section>
</body>
</html>