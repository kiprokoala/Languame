<?php

require_once("model/Partie.php");
require_once("controller/controllerObjet.php");

class controllerPartie extends controllerObjet
{
    protected static $objet = "Partie";
    protected static $cle = "id_partie";

    public static function createGame()
    {
        echo "<form action='/alignement/submitAlignement' method='POST'>";
        $index = Equipe::getMaxListIndex()+1;
        if(!isset($_POST['teams'])){
            header('Location: /alignement/home');
        }
        foreach ($_POST["teams"] as $team) {
            Equipe::addTeamToList($index,$team);
        }
        $_SESSION['partie_id'] = Partie::createGame($_POST["titreJeu"], $index);
        $themes = [];
        foreach ($_POST as $id_theme => $nomTheme){
            if(str_contains($id_theme, "theme")){
                $id = explode("theme",$id_theme)[1];
                $this_item = Theme::getObjetById($id);
                $themes[] = $this_item;
            }
        }
        if(count($themes) <> 4){
            header('Location: /alignement/home');
        }
        $questions = [];
        for($i = 1; $i <= 12; $i++){
            // Création des questions pour la partie
            $id = rand(0, count($themes) - 1);
            $temp = $themes;
            $theme = $themes[$id]->get("id_theme");
            array_splice($themes, $id, 1);
            $theme1 = $themes[0]->get("id_theme");
            $theme2 = $themes[1]->get("id_theme");
            $theme3 = $themes[2]->get("id_theme");
            $themes = $temp;
            $expressions = Expression::getExpressionsByTheme($theme);
            $question_id = Question::createQuestion($expressions[rand(0, count($expressions)-1)]->get("id_expression"));
            $question = Question::getObjetById($question_id);
            $question->createContient($theme, $theme1, $theme2, $theme3);
            $questions[] = $question;
        }

        foreach($questions as $question){
            $expression = Expression::getObjetById($question->get("id_expression"));
            $themes = $question->getThemes();
            echo "Expression : ".$expression->get('texteLangueExpression')."<br>";
            echo "Traduction littérale : ".$expression->get('litteralTradExpression')."<br>";
            echo "A quel thème cette expression correspond ?<br>";
            echo "
                <fieldset>
                    <label>
                        <input type='radio' value='".$themes[0]->get('id_theme')."' name='question".$question->get('id_question')."' checked>
                        ".$themes[0]->get('nomTheme')."
                    </label>
                    <label>
                        <input type='radio' value='".$themes[1]->get('id_theme')."' name='question".$question->get('id_question')."'>
                        ".$themes[1]->get('nomTheme')."
                    </label>                    
                    <label>
                        <input type='radio' value='".$themes[2]->get('id_theme')."' name='question".$question->get('id_question')."'>
                        ".$themes[2]->get('nomTheme')."
                    </label>
                    <label>
                        <input type='radio' value='".$themes[3]->get('id_theme')."' name='question".$question->get('id_question')."'>
                        ".$themes[3]->get('nomTheme')."
                    </label>
                </fieldset>";
        }
        echo "<input type='submit' value='send it to me'></form>";
    }
}
