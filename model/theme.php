<?php

require_once("conf/connexion.php");
require_once("model/objet.php");
Connexion::connect();

class Theme extends Objet
{

    // attributs de classe
	protected static $objet = "Theme";
    protected static $cle = "id_theme";
    protected $id_Theme;
    protected $nomTheme;

    //Méthode d'affichage simple
    public function afficher(){
        return "<p>Thème n° $this->id_theme a pour nom : $this->nomTheme";
    }

    public function giveExpressionToTheme($id_expression){
        $expression = Expression::getObjetById($id_expression);
        Expression::updateObjet($id_expression,
            $expression->get("texteLangueExpression"),
            $expression->get("litteralTradExpression"),
            $this->id_Theme,
            $expression->get("id_pays"),
            $expression->get("id_langue"));
    }

}


?>