<?php

require_once("model/utilisateur.php");
require_once("model/objet.php");

class controllerObjet
{

    ///charger les objets dans un tableau qui sera retourné
    ///plus tard gerer les vues

    public static function lireObjets()
    {
        /// titre de l'url à voir

        $objet = static::$objet;
        $tableauDonnees = $objet::getAllobjets();
        $cle = static::$cle;
        //Ceci fonctionne uniquement pour les thèmes pour le moment
        foreach ($tableauDonnees as $ligne) {
            $tableau[] = "<div style='display: flex; align-items: center;'>";
            switch ($objet) {
                case "Theme":
                    $id = $ligne->get($cle);
                    $tableau[] .= "Coucou, voici le $objet n°" . $ligne->get($cle) . ". Le nom du thème est " . $ligne->get("nomTheme");
                    break;
                case "Utilisateur":
                    $id = $ligne->get($cle);
                    $tableau[] .= "Coucou, voici le $objet n°" . $ligne->get($cle) . ". Le nom de l'utilisateur est " . $ligne->get("prenom");
                    break;
            }
            $tableau[] .= "<div style='height: 40px; width: 40px; background-color: red; margin-left: 20px;'></div></div>";
        }

        include("view/generic/listeObjets.php");
    }

    ///charger un objet dans un tableau qui sera retourné
    ///plus tard gerer les vues

    public static function lireObjet()
    {
        $table = static::$objet;
        $identifiant = static::$cle;

        /// titre de l'url à voir

        $objet = $table::getObjetById($identifiant);
        return $objet;

    }

    /*protected static function gererObjet()
    {
        $utilisateur = $_SESSION["id"] ? Utilisateur::getObjetById($_SESSION["id"]) : 0;
        $type = $_GET["type"] ? $_GET["type"] : 0;
        $lancer = $_GET["lancer"] ? $_GET["lancer"] : 0;
        $id =  $_GET["id"] ? $_GET["id"] : 0;

        if($utilisateur->isAdmin || $type == "Alignement"){
            $typeMin = strtolower($type);
            ($type == "Expression") && ($lancer == "ajouter" || $lancer == "modifier") ? $tab = array("textelangue" => $textelangue, "litteraltrad" => $litteraltrad, "theme" => $theme, "pays" => $pays, "langue" => $langue) : 0;
            ($type == "Langue") && ($lancer == "ajouter" || $lancer == "modifier") ?  $tab = array("langue" => $langue, "code" => $code, "groupelangue" => $groupelangue) : 0;
            ($type == "Alignement") && ($lancer == "ajouter" || $lancer == "modifier") ? $tab = array("id_utilisateur" => $utilisateur->id_utilisateur, "alignement" => $alignement, "reponses" => $reponses) : 0;

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
    }*/
}
?>