<?php
class Question extends Objet {
    
    // attributs de classe
	protected static $objet = "Question";

    protected $id_question;
    protected $id_expression;

    public function afficher(){
        Question::$objet . " n°" . $this->id_question . " est liée à l'espression n°" . $this->id_expression;
    }
}


?>