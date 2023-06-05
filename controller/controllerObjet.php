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
            $id = $ligne->get($cle);
            switch ($objet) {
                case "Theme":
                    $tableau[] .= "Coucou, voici le $objet n°" . $ligne->get($cle) . ". Le nom du thème est " . $ligne->get("nomTheme");
                    break;
                case "Utilisateur":
                    $tableau[] .= "Coucou, voici le $objet n°" . $ligne->get($cle) . ". L'utilisateur s'appelle " . $ligne->get("nom") . " " . $ligne->get("prenom") . ".";
                    break;
            }
            $tableau[] .= "<div style='height: 40px; width: 40px; background-color: red; margin-left: 20px;'></div></div>";
        }
        include("view/generic/header.php");
        include("view/generic/listeObjets.php");
        include("view/generic/footer.php");
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
}
?>