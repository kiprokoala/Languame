<?php

namespace controller;

use app\Models\Equipe;
use app\Models\Expression;
use app\Models\Partie;
use app\Models\Question;
use app\Models\Theme;
use app\Models\Utilisateur;


require_once("controller/controllerObjet.php");

class controllerPartie extends controllerObjet
{
    protected static $objet = "Partie";
    protected static $cle = "id_partie";

    public static function createGame()
    {
        $user = Utilisateur::getObjetById($_SESSION['id']);
        $all_parties = self::getAllFinishedGames();

        $index = Equipe::getMaxListIndex() + 1;

        // Récupération des thèmes
        $themes = [];
        foreach ($_POST as $id_theme => $nomTheme) {
            if (strpos($id_theme, "theme") !== false) {
                $id = explode("theme", $id_theme)[1];
                $this_item = Theme::getObjetById($id);
                $themes[] = $this_item;
            }
        }

        // Redirection immédiate
        if (!isset($_POST['teams'])) {
            header('Location: /alignement/home');
        }

        // Tests sur les équipes
        $groupeslangues = [];
        foreach($_POST['teams'] as $team){
            $equipe = Equipe::getObjetById($team);
            if(!array_key_exists($equipe->get('id_groupeLangue'), $groupeslangues)){
                $groupeslangues[] = $equipe->get('id_groupeLangue');
            }
        }

        // Redirection immédiate
        if (count($groupeslangues) <> 4  || count($themes) <> 4) {
            header('Location: /alignement/home');
        }

        // Création de la liste d'équipes
        foreach ($_POST["teams"] as $team) {
            Equipe::addTeamToList($index, $team);
        }

        // Création de la partie et des éléments annexes
        $id_partie = Partie::createGame($_POST["titreJeu"], $index);

        $questions = [];
        for ($i = 1; $i <= 12; $i++) {
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
            $question_id = Question::createQuestion($expressions[rand(0, count($expressions) - 1)]->get("id_expression"), $id_partie);
            $question = Question::getObjetById($question_id);
            $question->createContient($theme, $theme1, $theme2, $theme3);
            $questions[] = $question;
        }
        header('Location: /alignement/home');
    }

    public static function getAllFinishedGames()
    {
        $all_parties = "";
        $parties = Partie::getAllFinishedGames($_SESSION['id']);
        foreach ($parties as $partie) {
            $winner = Equipe::getObjetById($partie->get('winner'));
            $equipes = $partie->getAllEquipes();
            $nom_equipes = "";
            foreach ($equipes as $equipe) {
                $nom_equipes .= $equipe->get('nomEquipe') . " / ";
            }
            $nom_equipes = substr($nom_equipes, 0, -2);
            $all_parties .= $partie->get('titre') . " a pour winner " . $winner->get('nomEquipe') . ". <br>
                            Les équipes ayant joué sont " . $nom_equipes . "<br>";
        }
        return $all_parties;
    }

    public static function getQuestionsForPartie()
    {
        $partie = Partie::getObjetById($_POST['id_partie']);
        $questions = $partie->getQuestions();
        echo "<form action='/alignement/submitAlignement' method='POST'>";
        foreach ($questions as $question) {
            $expression = Expression::getObjetById($question->get("id_expression"));
            $themes = $question->getThemes();
            echo "expression : " . $expression->get('texteLangueExpression') . "<br>";
            echo "Traduction littérale : " . $expression->get('litteralTradExpression') . "<br>";
            echo "A quel thème cette expression correspond ?<br>";
            echo "
                <fieldset>
                    <label>
                        <input type='radio' value='" . $themes[0]->get('id_theme') . "' name='question" . $question->get('id_question') . "' checked>
                        " . $themes[0]->get('nomTheme') . "
                    </label>
                    <label>
                        <input type='radio' value='" . $themes[1]->get('id_theme') . "' name='question" . $question->get('id_question') . "'>
                        " . $themes[1]->get('nomTheme') . "
                    </label>                    
                    <label>
                        <input type='radio' value='" . $themes[2]->get('id_theme') . "' name='question" . $question->get('id_question') . "'>
                        " . $themes[2]->get('nomTheme') . "
                    </label>
                    <label>
                        <input type='radio' value='" . $themes[3]->get('id_theme') . "' name='question" . $question->get('id_question') . "'>
                        " . $themes[3]->get('nomTheme') . "
                    </label>
                </fieldset>";
        }
        echo "<input type='submit' value='send it to me'></form>";
    }
}
