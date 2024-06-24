<?php

class profilController {
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['userIsLoggedIn']) && $_SESSION['userIsLoggedIn'] === true) {
            include __DIR__ . '/../../app/models/model.php';

            try {
                $query = $pdo->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ?");
                $query->execute([$_SESSION['userId']]);
                
                if ($query->rowCount() > 0) {
                    $utilisateur = $query->fetch(PDO::FETCH_ASSOC);

                    $queryJoueurFavori = $pdo->prepare("SELECT nom, prenom, numeroMaillot FROM effectif WHERE idJoueur = ?");
                    $queryJoueurFavori->execute([$utilisateur['joueurFavori']]);
                    $joueurFavori = $queryJoueurFavori->fetch(PDO::FETCH_ASSOC);
                    $utilisateur['joueurFavoriNom'] = $joueurFavori['nom'];
                    $utilisateur['joueurFavoriPrenom'] = $joueurFavori['prenom'];
                    $utilisateur['joueurFavoriNumeroMaillot'] = $joueurFavori['numeroMaillot'];


                    include __DIR__ . '/../../app/views/profil/profilView.php';
                } else {
                    echo 'Aucun utilisateur trouvé.';
                }
            } catch (PDOException $e) {
                echo 'Erreur lors de la récupération des données de l\'utilisateur : ' . $e->getMessage();
            }
        } else {
            header('Location: /fcb/login');
            exit();
        }
    }
}