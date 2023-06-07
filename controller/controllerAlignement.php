<?php

require_once("model/alignement.php");
require_once("controller/controllerObjet.php");

class controllerAlignement extends controllerObjet
{
    protected static $objet = "Alignement";
    protected static $cle = "id_alignement";

    public static function home(){
        $all_themes = Theme::getAllObjets();
        $all_teams = Equipe::getAllObjets();
        $themes = $teams = "";

        foreach($all_themes as $theme){
            $id = $theme->get("id_theme");
            $name = $theme->get("nomTheme");
            $themes .= "<input type='checkbox' id='theme" .$id. "' class='checkbox-button' name='theme".$id."'><label for='theme".$id."'>".$name."</label>";
        }
        foreach ($all_teams as $team){
            $id = $team->get("id_equipe");
            $name = $team->get("nomEquipe");
            $teams .= "<option value='$id'>$id - $name</option>";
        }
        include("view/modale.php");
    }
}
