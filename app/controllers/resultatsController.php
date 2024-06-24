<?php

class resultatsController {
    public function index() {
        include __DIR__ . '/../../app/models/model.php';

        try {
            $query = $pdo->query("SELECT mj.*, r.scoreEquipeDomicile, r.scoreEquipeExterieur,
                                d.nomClub as equipeDomicile, d.logoClub as logoDomicile,
                                e.nomClub as equipeExterieur, e.logoClub as logoExterieur
                                FROM matchesJoues mj
                                INNER JOIN resultats r ON mj.idMatchJoue = r.idMatchJoue
                                INNER JOIN championnat d ON mj.idEquipeDomicile = d.idClub
                                INNER JOIN championnat e ON mj.idEquipeExterieur = e.idClub
                                WHERE (mj.idEquipeDomicile = (SELECT idClub FROM championnat WHERE nomClub = 'Barcelone') 
                                OR mj.idEquipeExterieur = (SELECT idClub FROM championnat WHERE nomClub = 'Barcelone'))
                                ORDER BY mj.dateMatch DESC");

            $resultatsMatches = $query->fetchAll(PDO::FETCH_ASSOC);

            include __DIR__ . '/../../app/views/resultats/resultatsView.php';
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des résultats des matchs : ' . $e->getMessage();
        }
    }
}

