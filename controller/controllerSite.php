<?php

require_once("../model/objet.php");
require_once("../model/utilisateur.php");

class controllerSite{

public static function homePage(){
    $title = "Accueil";
    require_once("view/generic/header.php");
    require_once("view/generic/footer.php");
}

public static function error404(){
    $page = "Erreur 404";
    require_once("view/header.php");
    require_once("view/footer.php");
}

public static function gererObjet(){
    $utilisateur = $_SESSION["id"] ? Utilisateur::getObjetById($_SESSION["id"]) : 0;
    $type = $_GET["type"] ? $_GET["type"] : 0;
    $lancer = $_GET["lancer"] ? $_GET["lancer"] : 0;
    $id =  $_GET["id"] ? $_GET["id"] : 0;
    if($utilisateur->isAdmin || $type == "Alignement"){
        $typeMin = strtolower($type);
        ($type == "Expression") && ($lancer == "ajouter" || $lancer == "modifier") ? $tab = array("textelangue" => $textelangue, "litteraltrad" => $litteraltrad, "theme" => $theme, "pays" => $pays, "langue" => $langue);
        ($type == "Langue") && ($lancer == "ajouter" || $lancer == "modifier") ?  $tab = array("langue" => $langue, "code" => $code, "groupelangue" => $groupelangue);
        ($type == "Alignement") && ($lancer == "ajouter" || $lancer == "modifier") ? $tab = array("id_utilisateur" => $utilisateur->id_utilisateur, "alignement" => $alignement, "reponses" => $reponses);
        
        switch($lancer){
            case "ajouter":
                $page = "Ajouter une $typeMin";
                $type::addObjet($tab);
                break;
            case "modifier":
                $tab = array_merge(array("id$type" => ${"id".$type}), $tab);
                $page = "Modifier une $typeMin";
                $type::updateObjet($tab);
                break;
            case "supprimer":
                $page = "Supprimer une $typeMin";
                $type::deleteObjetById($id);
                break;
            case "valider":
                $type::{"valider".$type}($alignement, $partie);
                break;
            default:
                $page = $type;
                $type::getAllObjets();
        }
    }
}

}
?>