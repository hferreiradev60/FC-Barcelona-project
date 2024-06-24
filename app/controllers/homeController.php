<?php

class homeController {
    public function index() {
        $prochainsMatchsController = new prochainsMatchsController();
        $prochainsMatchs = $prochainsMatchsController->getProchainsMatchs();
        $prochainMatch = $prochainsMatchsController->getProchainMatch();
        include __DIR__ . '/../../app/views/home/homeView.php';
    }
}
