<?php
class Question extends Objet {
    
    // attributs de classe
	protected static $objet = "Question";
	protected static $cle = "id_question";

    protected $id_question;
    protected $id_expression;

    public function afficher(){
        Question::$objet . " n°" . $this->id_question . " est liée à l'espression n°" . $this->id_expression;
    }

    public function afficherQuestion(){
        //On récupère l'expression pour l'afficher
        $expression = Expression::getObjetById($this->id_expression);
        echo "Expression : " + $expression->get("texteLangueExpression");
        echo "<br>";

        //On affiche ses thèmes (évidemment à modifier)
        $themes = self::getThemes();
        echo "Numéro du premier thème : " + $themes[0];
        echo "<br>";
        echo "Numéro du deuxième thème : " + $themes[1];
        echo "<br>";
        echo "Numéro du troisième thème : " + $themes[2];
        echo "<br>";
        echo "Numéro du quatrième thème : " + $themes[3];
    }

    public function getThemes()
    {
        $requete = "SELECT id_theme FROM Question WHERE id_question = ".$this->get("id_question").";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_NUM);
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createQuestion($id_expression){
        $requete = "INSERT INTO Question (id_expression) VALUES ($id_expression);";
        try {
            Connexion::pdo()->query($requete);
            $obj = Connexion::pdo()->LastInsertId();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function createContient($theme1, $theme2, $theme3, $theme4){
        $requete = "
            INSERT INTO CONTIENT (id_question, id_theme) VALUES($this->id_question, $theme1);
            INSERT INTO CONTIENT (id_question, id_theme) VALUES($this->id_question, $theme2);
            INSERT INTO CONTIENT (id_question, id_theme) VALUES($this->id_question, $theme3);
            INSERT INTO CONTIENT (id_question, id_theme) VALUES($this->id_question, $theme4);
        ";
        try {
            Connexion::pdo()->query($requete);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>