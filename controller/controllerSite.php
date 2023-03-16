<?php

require_once("../model/objet.php");
require_once("../model/utilisateur.php");

class controllerSite{

protected $utilisateur = $_SESSION["id"] ? Utilisateur::getObjetById($_SESSION["id"]) : 0;
protected $type = $_GET["type"] ? $_GET["type"] : 0;
protected $lancer = $_GET["lancer"] ? $_GET["lancer"] : 0;
protected $id =  $_GET["id"] ? $_GET["id"] : 0;

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

public static function proposerAlignement(){
    $page = "Proposer un alignement";
    if($utilisateur->estConnecte()){
        Alignement::creerAlignement($utilisateur->id_utilisateur, $alignement, $reponses);
    }    
}

public static function validerAlignement(){
    $page = "Valider un alignement";
    if ($utilisateur->isChef){
        Alignement::validerAlignement($alignement, $partie);
    }
}

public static function voirLesAlignementsProposes(){
    $page = "Voir les alignements proposés";
    if($utilisateur->estConnecte()){
        Alignement::getAllObjets();
    }
}

public static function objet(){
    if($utilisateur->isAdmin){
        $typeMin = strtolower($type);
        if(($type="Expression") && ($lancer == "ajouter" || $lancer == "modifier")){
            $tab = array(
                "textelangue" => $textelangue, 
                "litteraltrad" => $litteraltrad, 
                "theme" => $theme, 
                "pays" => $pays, 
                "langue" => $langue); 
        }elseif(($type="Langue") && ($lancer == "ajouter" || $lancer == "modifier")){
            $tab = array(
                "langue" => $langue, 
                "code" => $code, 
                "groupelangue" => $groupelangue);
        }elseif(($type="Alignement") && ($lancer == "ajouter" || $lancer == "modifier")){
            $tab = array(
                "id_utilisateur" => $utilisateur->id_utilisateur, 
                "alignement" => $alignement, 
                "reponses" => $groupelangue);
        }
        switch($lancer){
            case "ajouter":
                $page = "Ajouter une $typeMin";
                $type::addObjet($tab);
                break;
            case "modifier":
                $tab = array_merge(array("id$type" => ${"id".$type}[0]), $tab) : 0;
                $page = "Modifier une $typeMin";
                $type::updateObjet($tab);
                break;
            case "supprimer":
                $page = "Supprimer une $typeMin";
                $type::deleteObjetById($id);
                break;
            default:
        }

    }
}

}
?>