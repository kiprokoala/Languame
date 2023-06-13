<?php

namespace controller;
class controllerSite
{
    public static function homePage()
    {
        $title = "Accueil";
        require_once("resources/views/generic/header.php");
        require_once("resources/views/generic/footer.php");
    }

    /**
     * Méthode pour afficher la page d'erreur 404.
     */
    public static function error404() {
        $page = "Erreur 404";
        require_once("resources/views/header.php");
        require_once("resources/views/footer.php");
    }

    /**
     * Méthode pour gérer les objets.
     */
    public static function gererObjet()
    {
        // TODO: Implémenter la logique de gestion des objets
    }
}
