<?php

require_once("model/objet.php");
require_once("model/utilisateur.php");

class controllerSite
{

    public static function homePage()
    {
        $title = "Accueil";
        require_once("view/generic/header.php");
        require_once("view/generic/footer.php");
    }

    public static function error404()
    {
        $page = "Erreur 404";
        require_once("view/header.php");
        require_once("view/footer.php");
    }

    public static function gererObjet()
    {

    }
}
?>