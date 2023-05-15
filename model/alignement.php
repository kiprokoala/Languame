<?php

require_once("model/objet.php");

class Alignement extends Objet {
    
    // attributs de classe
	protected static $objet = "Alignement";

    protected $id_alignement;
    protected $id_utilisateur;

    public function afficher(){
        echo Alignement::$objet . " n°" . $this->id_alignement . " est lié à l'Utilisateur n°" . $this->id_utilisateur;
    }
}
?>