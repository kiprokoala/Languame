<?php

class Reponse extends Objet
{

    // attributs de classe
    protected static $objet = "Reponse";

    protected $id_alignement;
    protected $id_utilisateur;
    protected $id_question;
    protected $id_theme;

    //Méthode d'affichage simple
    function afficher()
    {
        echo Reponse::$objet . " est liée à l'Alignement n°" . $this->id_alignement . ", l'Utilisateur n°" . $this->id_utilisateur . ", la Question n°" . $this->id_question . " et le Thème n°" . $this->id_theme;
    }

    public function checkReponseTheme(){

        //On récupère la question, son expression, puis le thème lié à l'expression
        $question = Question::getObjetById($this->get("id_question"));
        $the_expression = Expression::getObjetById($question->get("id_expression"));

        //On retourne la ressemblance avec le thème donné dans la réponse
        return $the_expression->get("id_theme") == $this->get("id_theme");
    }
}

?>