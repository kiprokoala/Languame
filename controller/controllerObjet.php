<?php

class controleurObjet{

    ///charger les objets dans un tableau qui sera retourné
    ///plus tard gerer les vues

    public static function lireObjets() {
        $table = static::$objet
        $identifiant = static::$cle;
        
        /// titre de l'url à voir

        $tableau = $table::getAllobjets();
        return $tableau;

    }

     ///charger un objet dans un tableau qui sera retourné
     ///plus tard gerer les vues
     
    public static function lireObjets() {
        $table = static::$objet
        $identifiant = static::$cle;
        
        /// titre de l'url à voir

        $objet = $table::getObjetById($id);
        return $objet;

    }
}
?>