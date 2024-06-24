<?php

class loginController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';
        include '../app/views/login/loginView.php';

        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            try {
                $query = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
                $query->execute([$email]);
                $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
        
                if ($utilisateur && password_verify($password, $utilisateur['password'])) {
                    $_SESSION['userIsLoggedIn'] = true;
                    $_SESSION['userEmail'] = $utilisateur['email'];
                    $_SESSION['userName'] = $utilisateur['prenom'];
                    $_SESSION['userId'] = $utilisateur['idUtilisateur'];

                    header('Location: /fcb/accueil');
                    exit();
                } else {
                    echo 'Identifiants incorrects';
                }
            } catch (PDOException $e) {
                echo 'Erreur lors de la connexion : ' . $e->getMessage();
            }
        }
    }
}
