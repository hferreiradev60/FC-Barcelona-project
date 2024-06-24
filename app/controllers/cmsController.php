<?php

class cmsController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';

        try {
            $query = $pdo->query("SELECT * FROM effectif");
            $joueurs = $query->fetchAll(PDO::FETCH_ASSOC);

            include __DIR__ . '/../../app/views/cms/cmsView.php';
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des joueurs : ' . $e->getMessage();
        }
    }

    // Fonction pour ajouter un joueur
    public function addPlayer() {
        // Ajouter la logique pour insérer un joueur dans la table "effectif"
        // Utilisez $_POST['nom'] pour récupérer le nom du joueur du formulaire
    }

    // Fonction pour modifier un joueur
    public function editPlayer() {
        // Ajouter la logique pour modifier un joueur dans la table "effectif"
        // Utilisez $_POST['id'] pour récupérer l'ID du joueur à modifier
    }

    // Fonction pour supprimer un joueur
    public function deletePlayer() {
        // Ajouter la logique pour supprimer un joueur de la table "effectif"
        // Utilisez $_POST['id'] pour récupérer l'ID du joueur à supprimer
    }
}