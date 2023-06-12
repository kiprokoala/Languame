<?php

require_once("model/objet.php");
require_once("model/utilisateur.php");

class controllerSite {
    /**
     * Méthode pour afficher la page d'accueil.
     */
    public static function homePage() {
        $title = "Accueil";
        require_once("view/generic/header.php");
        require_once("view/generic/footer.php");
    }

    /**
     * Méthode pour afficher la page d'erreur 404.
     */
    public static function error404() {
        $page = "Erreur 404";
        require_once("view/header.php");
        require_once("view/footer.php");
    }

    /**
     * Méthode pour gérer les objets.
     */
    public static function gererObjet() {
        // TODO: Implémenter la logique de gestion des objets
    }
}
?>
