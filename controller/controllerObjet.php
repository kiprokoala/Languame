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
        include("view/generic/objet.php");

    }
}
?>