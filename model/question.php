<?php
class Question extends Objet {
    
    // attributs de classe
	protected static $objet = "Question";
	protected static $cle = "id_question";

    protected $id_question;
    protected $id_expression;
    protected $id_partie;

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
        $requete = "SELECT c.id_theme, nomTheme FROM Contient c
                    INNER JOIN Theme t ON t.id_theme = c.id_theme
                    INNER JOIN Question q ON q.id_question = c.id_question
                    INNER JOIN Expression e ON e.id_expression = q.id_expression
                    WHERE q.id_question = ".$this->get("id_question").";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, "Theme");
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createQuestion($id_expression, $id_partie){
        $requete = "INSERT INTO Question (id_expression, id_partie) VALUES ($id_expression, $id_partie);";
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