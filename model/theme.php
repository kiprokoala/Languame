<?php

require_once("config/connexion.php");
require_once("model/objet.php");
Connexion::connect();

class Theme extends Objet
{

    // attributs de classe
    protected static $objet = "Adherent";
    protected static $cle = "id_theme";
    protected $id_Theme;
    protected $nomTheme;

    //Méthode d'affichage simple
    public function afficher(){
        return "<p>Thème n° $this->id_theme a pour nom : $this->nomTheme";
    }
}


?>