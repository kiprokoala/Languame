<?php

require_once("model/Partie.php");
require_once("controller/controllerObjet.php");

class controllerPartie extends controllerObjet
{
    protected static $objet = "Partie";
    protected static $cle = "id_partie";

    public static function createGame()
    {
        $index = Equipe::getMaxListIndex()+1;
        /*foreach ($_POST["teams"] as $team) {
            Equipe::addTeamToList($index,$team);
        }*/
        //var_dump(Partie::createGame($_POST["titreJeu"], $index));
        $themes = [];
        foreach ($_POST as $id_theme => $nomTheme){
            if(str_contains($id_theme, "theme")){
                $id = explode("theme",$id_theme)[1];
                $this_item = Theme::getObjetById($id);
                $themes[] = $this_item;
            }
        }

        for($i = 1; $i < 2; $i++){
            // Création des questions pour la partie
            $id = rand(0, count($themes) - 1);
            $theme = $themes[$id]->get("id_theme");
            array_splice($themes, $id, 1);
            $theme1 = $themes[0]->get("id_theme");
            $theme2 = $themes[1]->get("id_theme");
            $theme3 = $themes[2]->get("id_theme");
            $expressions = Expression::getExpressionsByTheme($theme);
            $question_id = Question::createQuestion($expressions[rand(0, count($expressions)-1)]->get("id_expression"));
            $question = Question::getObjetById($question_id);
            $question->createContient($theme, $theme1, $theme2, $theme3);
        }
        //var_dump(Theme::getAllObjets());
    }
}
