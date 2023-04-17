<?php
class GroupeLangue extends Objet {
    
    // attributs de classe
	protected static $objet = "GroupeLangue";

    protected $id_groupeLangue;
    protected $nomGroupeLangue;

    function afficher(){
        GroupeLangue::$objet . " a pour numéro " . $this->id_groupeLangue . " et comme nom " . $this->nomGroupeLangue;
    }
    
}


?>