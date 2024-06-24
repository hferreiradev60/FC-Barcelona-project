<?php

class logoutController {
    public function index() {
        session_start();

        session_destroy();

        header('Location: /fcb/accueil');
        exit();
    }
}