<?php

class modifiermotdepasseController {
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        include __DIR__ . '/../../app/views/modifiermotdepasse/modifiermotdepasseView.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nouveauMotDePasse = $_POST['nouveau-mot-de-passe'];
            $confirmerMotDePasse = $_POST['confirmer-mot-de-passe'];

            if ($nouveauMotDePasse === $confirmerMotDePasse) {
                $nouveauMotDePasseHache = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);

                include __DIR__ . '/../../app/models/model.php';

                try {
                    $query = $pdo->prepare("UPDATE utilisateur SET password = ? WHERE idUtilisateur = ?");
                    $query->execute([$nouveauMotDePasseHache, $_SESSION['userId']]);


                echo 'Le mot de passe a été modifié avec succès.';
                } catch (PDOException $e) {
                    echo 'Erreur lors de la mise à jour du mot de passe : ' . $e->getMessage();
                }
            } else {
                echo 'Les mots de passe ne correspondent pas.';
            }
        }
    }
}