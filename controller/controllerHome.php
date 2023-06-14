<?php

namespace controller;

class controllerHome {
    /**
     * Méthode pour afficher la page d'accueil.
     */
    public function index() {
        require_once("resources/views/homeView.php");
    }
}
