<?php

class joueurController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';

        try {
            if (isset($_GET['id'])) {
                $idJoueur = $_GET['id'];

                $query = $pdo->prepare("SELECT * FROM effectif WHERE idJoueur = :id");
                $query->bindParam(':id', $idJoueur, PDO::PARAM_INT);
                $query->execute();

                $joueur = $query->fetch(PDO::FETCH_ASSOC);

                if ($joueur) {
                    include __DIR__ . '/../../app/views/joueur/joueurView.php';
                } else {
                    echo 'Joueur non trouvé.';
                }
            } else {
                echo 'Aucun joueur sélectionné.';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des infos du joueur : ' . $e->getMessage();
        }
    }
}