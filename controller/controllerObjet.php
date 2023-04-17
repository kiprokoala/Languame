<?php

require_once("model/utilisateur.php");
require_once("model/objet.php");

class controllerObjet{

    ///charger les objets dans un tableau qui sera retourné
    ///plus tard gerer les vues

    public static function lireObjets() {
        $table = static::$objet;
        $identifiant = static::$cle;
        
        /// titre de l'url à voir

        $tableau = $table::getAllobjets();
    }

     ///charger un objet dans un tableau qui sera retourné
     ///plus tard gerer les vues
     
    public static function lireObjet() {
        $table = static::$objet;
        $identifiant = static::$cle;
        
        /// titre de l'url à voir

        $objet = $table::getObjetById($identifiant);
    }

    public static function creerObjet(){
        $table = static::$objet;

        if(Objet::addObjet($tableauDonnees)){
            self::lireObjets();
        }else{
            self::formCreation();
        }
      }
  
      public static function supprimerObjet(){
        $cle = static::$cle;
        $table = static::$objet;
        $id = $_GET[$cle];
        $table::deleteObjetById($id);
        self::lireObjets();
      }
}
?>