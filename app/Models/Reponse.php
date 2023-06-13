<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDOException;

class Reponse extends Objet
{

    // attributs de classe
    protected static $objet = "Reponse";
    protected static $cle = "id_reponse";

    protected $id_alignement;
    protected $id_utilisateur;
    protected $id_question;
    protected $id_theme;

    //Méthode d'affichage simple
    function afficher()
    {
        echo Reponse::$objet . " est liée à l'alignement n°" . $this->id_alignement . ", l'utilisateur n°" . $this->id_utilisateur . ", la app\Models\Question n°" . $this->id_question . " et le Thème n°" . $this->id_theme;
    }

    public function checkReponseTheme()
    {

        //On récupère la question, son expression, puis le thème lié à l'expression
        $question = Question::getObjetById($this->get("id_question"));
        $the_expression = Expression::getObjetById($question->get("id_expression"));

        //On retourne la ressemblance avec le thème donné dans la réponse
        return $the_expression->get("id_theme") == $this->get("id_theme");
    }

    public static function createReponse($theme, $alignement, $utilisateur, $question)
    {
        $req_prep = Connexion::pdo()->prepare("INSERT INTO 
                    reponse (id_theme, id_alignement, id_utilisateur, id_question) 
                    VALUES (:tag_theme, :tag_alignement, :tag_utilisateur, :tag_question);");
        try {
            $req_prep->execute(array(
                "tag_theme" => $theme,
                "tag_alignement" => $alignement,
                "tag_utilisateur" => $utilisateur,
                "tag_question" => $question));
            return Connexion::pdo()->LastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>