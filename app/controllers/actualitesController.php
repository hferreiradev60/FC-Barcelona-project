<?php

class actualitesController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';

        try {
            $query = $pdo->query("SELECT * FROM actualites ORDER BY datePublication DESC");
            $actualites = $query->fetchAll(PDO::FETCH_ASSOC);

            include '../app/views/actualites/actualitesView.php';
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des actualités : ' . $e->getMessage();
        }
    }
}
