<?php

class compositionController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';

        try {
            $query = $pdo->query("SELECT * FROM effectif");
            $effectif = $query->fetchAll(PDO::FETCH_ASSOC);

            include __DIR__ . '/../../app/views/composition/compositionView.php';
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des joueurs : ' . $e->getMessage();
        }
    }
}