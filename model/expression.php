<?php

class Expression extends Objet
{

    // attributs de classe
    protected static $objet = "Expression";

    protected $id_expression;
    protected $texteLangueExpression;
    protected $litteralTradExpression;
    protected $id_theme;
    protected $id_pays;
    protected $id_langue;

    //Méthode simple d'affichage
    public function afficher()
    {
        echo Expression::$objet . " n°" . $this->id_expression . " a pour texte " . $this->texteLangueExpression . ". Sa traduction littérale est " . $this->litteralTradExpression . ". Son thème est le n°" . $this->id_theme . ", vient du pays n°" . $this->id_pays . " et est écrit dans la langue n°" . $this->id_langue;
    }

}

?>