<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDO;
use PDOException;

class Expression extends Objet
{
    // attributs de classe
    protected static $objet = "Expression";
    protected static $cle = "id_expression";

    protected $id_expression;
    protected $texteLangueExpression;
    protected $litteralTradExpression;
    protected $id_theme;
    protected $id_pays;
    protected $id_langue;

    //Méthode simple d'affichage

    public static function getExpressionsByTheme($id_theme)
    {
        $requete = "SELECT * FROM expression WHERE id_theme = " . $id_theme . ";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Expression'));
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function afficher()
    {
        echo Expression::$objet . " n°" . $this->id_expression . " a pour texte " . $this->texteLangueExpression . ". Sa traduction littérale est " . $this->litteralTradExpression . ". Son thème est le n°" . $this->id_theme . ", vient du pays n°" . $this->id_pays . " et est écrit dans la langue n°" . $this->id_langue;
    }

    public function getExpressionsByPays($id_pays)
    {
        $requete = "SELECT * FROM expression WHERE id_pays = " . $id_pays . ";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Expression'));
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
