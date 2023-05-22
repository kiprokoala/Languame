<?php

namespace controller;

class controllerHome
{
    public function index()
    {
        /* Code porté depuis l'ancien contrôleur, mais qui ne semble pas avoir de lien avec la vue homeView.html
        $title = "Accueil";
        require_once("view/generic/header.php");
        require_once("view/generic/footer.php");
        */
        require_once("view/homeView.html");
    }
}