<?php 

namespace app\Models;

use app\Models\Objet;
use app\Utils\Database as Connexion;




class Theme extends Objet
{
    // attributs de classe
	protected static $objet = "Theme";
    protected static $cle = "id_theme";
    protected $id_theme;
    protected $nomTheme;

    //Méthode d'affichage simple
    public function afficher()
    {
        return "<p>Thème n° $this->id_theme a pour nom : $this->nomTheme";
    }

    public function giveExpressionToTheme($id_expression)
    {
        $expression = Expression::getObjetById($id_expression);
        Expression::updateObjet($id_expression,
            $expression->get("texteLangueExpression"),
            $expression->get("litteralTradExpression"),
            $this->id_theme,
            $expression->get("id_pays"),
            $expression->get("id_langue"));
    }

    public static function getAllTheme() {
        try {
            // préparation de la requête
            $sql = "SELECT * FROM theme ORDER BY nomTheme ASC";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // renvoi du tableau de résultats
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur lors de la recherche dans la base de données.");
        }
    }
}


?>