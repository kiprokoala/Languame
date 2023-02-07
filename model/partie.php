<?php
class Partie extends Objet {
    
    // attributs de classe
	protected static $objet = "Partie";

    protected $id_partie;
    protected $id_equipe;

    function afficher(){
        Partie::$objet . " n°" . $this->id_partie . " et l'équipe qui y participe est la n° " . $this->id_equipe;
    }
}
?>