<?php

namespace controller;

class controllerHome {
    /**
     * Méthode pour afficher la page d'accueil.
     */
    public function index() {
        require_once("view/homeView.html");
    }

    /**
     * Méthode pour afficher la page de nationalité.
     */
    public function nationality() {
        include('view/nationalite/header.php');
        require_once("view/nationalite/index.php");
        include('view/generic/footer.php');
    }
}
