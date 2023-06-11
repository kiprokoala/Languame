<?php

require_once("Models/Objet.php");
require_once("Models/Utilisateur.php");

class controllerSite
{

    public static function homePage()
    {
        $title = "Accueil";
        require_once("resources/views/generic/header.php");
        require_once("resources/views/generic/footer.php");
    }

    public static function error404()
    {
        $page = "Erreur 404";
        require_once("resources/views/header.php");
        require_once("resources/views/footer.php");
    }

    public static function gererObjet()
    {

    }
}
?>