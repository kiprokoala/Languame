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
        if (!isset($_POST['teams']) || count($themes) <> 4) {
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
        $all_parties = [];
        $parties = Partie::getAllFinishedGames($_SESSION['id']);
        foreach ($parties as $partie) {
            $user = Utilisateur::getObjetById($_SESSION['id']);
            $id = $partie->get('id_partie');
            $titre = $partie->get('titre');
            $winner = $partie->get('winner');
            $teams = $partie->getAllEquipes();
            $themes = $partie->getAllThemes();
            $users = $partie->getAllUsers();
            $answers = $user->getAllAnswers($id);

            $all_answers = [];
            foreach ($users as $user) {
                $all_answers[] = $user->getAllAnswers($id);
            }
            $score = 0;
            foreach ($answers as $answer){
                if($answer->checkReponseTheme()){
                    $score++;
                }
                // commenter/ décommenter si ça ne fonctionne pas
                //$score += $answer->checkReponseTheme();
            }

            $all_parties[] = array(
                array("id" => $id),
                array("titre" => $titre),
                array("winner" => $winner),
                array("teams" => $teams),
                array("themes" => $themes),
                array("users" => $users),
                array("score" => $score),
                array("all_answers" => $all_answers),
            );
        }
        return json_encode($all_parties);
    }

    public static function getQuestionsForPartie()
    {
        $partie = Partie::getObjetById($_POST['id_partie']);
        $_SESSION['id_partie'] = $_POST['id_partie'];

        $themes = $partie->getAllThemes();

        $questions = $partie->getQuestions();
        $all_questions = [];

        foreach ($questions as $question){
            $expression = Expression::getObjetById($question->get('id_expression'));
            $all_questions["questions"][] = $question;
            $all_questions["expressions"][] = $expression;
        }
        $all_questions["themes"] = $themes;
        $all_questions = json_encode($all_questions);
        include("resources/views/gameView.php");
    }
}
