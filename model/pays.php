<?php
class Pays extends Objet {
    
    // attributs de classe
	protected static $objet = "Pays";

    protected $id_pays;
    protected $nomPays;
    protected $raccourciPays;
    protected $latitudeCapitalePays;
    protected $longitudeCapitalePays;

    function afficher(){
        Pays::$objet . " n°" . $this->id_pays . " a pour nom " . $this->nomPays . ". Son raccoursi est " . $this->raccourciPays . ". Il a pour latitude " . $this->latitudeCapitalePays . " et pour longitude " . $this->longitudeCapitalePays;
    }

    public function getExpressionsByTheme(){

    }
}


?>