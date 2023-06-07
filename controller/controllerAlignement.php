<?php

require_once("model/alignement.php");
require_once("controller/controllerObjet.php");

class controllerAlignement extends controllerObjet
{
    protected static $objet = "Alignement";
    protected static $cle = "id_alignement";

    public static function home(){
        include("view/modale.html");
    }

    public static function creatingGame(){
        $themes = Theme::getAllObjets();
        $groupesLangues = GroupeLangue::getAllObjets();
        $equipes = Equipe::getAllObjets();
    }
}
