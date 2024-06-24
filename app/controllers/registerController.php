<?php

class registerController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';
        include '../app/views/register/registerView.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $joueurFavori = $_POST['joueurFavori'];

            try {
                $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, password, joueurFavori) VALUES (?, ?, ?, ?, ?)")
                    ->execute([$nom, $prenom, $email, $password, $joueurFavori]);
            } catch (PDOException $e) {
                echo 'Erreur lors de l\'enregistrement : ' . $e->getMessage();
            }
        }
    }
}
