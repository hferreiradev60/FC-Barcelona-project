<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="contact-section">
        <div class="contact-container">
            <img src="/fcb/public/img/icon.ico" alt="Logo FC Barcelone" class="logo">
            <p class="contact-message">Une question Culer ?</p>

            <form class="contact-form" action="/fcb/contact" method="post">
                <div class="form-row">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-row">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-row">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button class="button" type="submit">Envoyer</button>
            </form>
        </div>
    </section>
</body>
</html>