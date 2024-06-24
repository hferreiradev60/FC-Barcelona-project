<?php

class matchsController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';

        try {
            $query = $pdo->query("SELECT m.*, d.nomClub as equipeDomicile, d.logoClub as logoDomicile, e.nomClub as equipeExterieur, e.logoClub as logoExterieur
            FROM matches m
            INNER JOIN championnat d ON m.idEquipeDomicile = d.idClub
            INNER JOIN championnat e ON m.idEquipeExterieur = e.idClub
            WHERE (m.idEquipeDomicile = (SELECT idClub FROM championnat WHERE nomClub = 'Barcelone') OR m.idEquipeExterieur = (SELECT idClub FROM championnat WHERE nomClub = 'Barcelone'))
            AND m.dateMatch >= NOW();");
            $prochainsMatchs = $query->fetchAll(PDO::FETCH_ASSOC);

            include __DIR__ . '/../../app/views/matchs/matchsView.php';
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des prochains matchs : ' . $e->getMessage();
        }
    }
}