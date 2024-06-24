<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>
    <section class="login-section">
        <div class="login-container">
            <img src="/fcb/public/img/icon.ico" alt="Logo FC Barcelone" class="logo">
            <p class="welcome-message">Rejoignez-nous !</p>
            
            <form class="login-form" action="/fcb/register" method="post" onsubmit="redirectAfterSubmit()">
                <div class="form-row">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-row">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="form-row">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-row">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-row">
                    <label for="joueurFavori">Joueur Favori :</label>
                    <select id="joueurFavori" name="joueurFavori" required>
                        <?php
                        try {
                            $query = $pdo->query("SELECT * FROM effectif");
                            $listeJoueurs = $query->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($listeJoueurs as $joueur) {
                                echo '<option value="' . $joueur['idJoueur'] . '">' . $joueur['numeroMaillot'] . ' - ' . $joueur['prenom'] . ' ' . $joueur['nom'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo 'Erreur lors de la récupération des joueurs : ' . $e->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <button class="button" type="submit">Devenir Culer</button>
            </form>
        </div>
    </section>

    <script>
    function redirectAfterSubmit() {
        window.location.href = "/fcb/login";
    }
    </script>
</body>
</html>