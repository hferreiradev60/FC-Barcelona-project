<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '/head.php'; ?>

<body>

    <header>
        <a href="/fcb/accueil">
            <div class="logo">
                <img src="/fcb/public/img/icon.ico" alt="Logo FCB">
            </div>
        </a>
        <div class="equipe-premiere" id="equipe-premiere">
            <div class="dropdown">
                <span class="dropdown-title">Équipe première</span>
                <div class="dropdown-content">
                    <div class="dropdown-item">
                        <span class="sub-title"><a href="/fcb/actualites">Actualités</a></span>
                    </div>
                    <div class="dropdown-item">
                        <span class="sub-title"><a href="/fcb/matchs">Matchs</a></span>
                    </div>
                    <div class="dropdown-item">
                        <span class="sub-title"><a href="/fcb/resultats">Résultats</a></span>
                    </div>
                    <div class="dropdown-item">
                        <span class="sub-title"><a href="/fcb/classement">Classement</a></span>
                    </div>
                    <div class="dropdown-item">
                        <span class="sub-title"><a href="/fcb/joueurs">Effectif</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="compo">
            <a href="/fcb/composition">Composition</a>
        </div>
        <div class="contact">
            <a href="/fcb/contact">Contact</a>
        </div>
        <div class="login">
            <?php 
                if (isset($_SESSION['userIsLoggedIn']) && $_SESSION['userIsLoggedIn']) {
                    echo '<div class="dropdown">';
                    echo '<button class="button-85"><span>Bonjour, ' . (isset($_SESSION['userName']) ? $_SESSION['userName'] : '') . '</span></button>';
                    echo '<div class="dropdown-content">';
                    echo '<div class="dropdown-item"><a href="/fcb/profil">Profil</a></div>';
                    echo '<div class="dropdown-item"><a href="/fcb/logout">Déconnexion</a></div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<button class="button-85"><a href="/fcb/login">SE CONNECTER </a><ion-icon name="person-outline" id="person-outline"></ion-icon></button>';
                }
            ?>
        </div>
    </header>

</body>
</html>