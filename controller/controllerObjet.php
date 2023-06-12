<?php

require_once("model/utilisateur.php");
require_once("model/objet.php");

class controllerObjet {
    /**
     * Méthode pour lire tous les objets et les afficher.
     */
    public static function lireObjets() {
        $objet = static::$objet; // Nom de l'objet à charger
        $tableauDonnees = $objet::getAllobjets(); // Récupération des objets depuis la classe correspondante
        $cle = static::$cle; // Clé d'identification des objets (id, référence, etc.)

        $tableau = []; // Tableau pour stocker les données à afficher

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

    /**
     * Méthode pour lire un objet spécifique.
     * @return object L'objet lu.
     */
    public static function lireObjet() {
        $table = static::$objet; // Nom de l'objet à charger
        $identifiant = static::$cle; // Clé d'identification de l'objet (id, référence, etc.)

        $objet = $table::getObjetById($identifiant); // Récupération de l'objet depuis la classe correspondante

        return $objet;
    }
}
?>
