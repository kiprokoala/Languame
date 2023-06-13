<?php

namespace controller;

use app\Models\Alignement;
use app\Models\Equipe;
use app\Models\Expression;
use app\Models\Question;
use app\Models\Reponse;
use app\Models\Theme;
use app\Models\Utilisateur;
use Couchbase\AnalyticsLink;


require_once("controller/controllerObjet.php");

class controllerAlignement extends controllerObjet
{
    protected static $objet = "Alignement";
    protected static $cle = "id_alignement";

    public static function home()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /profil');
        }
        $user = Utilisateur::getObjetById($_SESSION['id']);
        $all_themes = Theme::getAllObjets();
        $all_teams = Equipe::getAllObjets();
        $themes = $teams = "";

        foreach ($all_themes as $theme) {
            $id = $theme->get("id_theme");
            $name = $theme->get("nomTheme");
            $themes .= "<input type='checkbox' id='theme" . $id . "' class='checkbox-button' name='theme" . $id . "'><label for='theme" . $id . "'>" . $name . "</label>";
        }
        foreach ($all_teams as $team) {
            $id = $team->get("id_equipe");
            $name = $team->get("nomEquipe");
            switch ($team->get("id_groupeLangue")){
                case 1:
                    $teams .= "<option style='background-color: #5a5ae7;' value='$id'>$id - $name</option>";
                    break;
                case 2:
                    $teams .= "<option style='background-color: #e8e83e;' value='$id'>$id - $name</option>";
                    break;
                case 3:
                    $teams .= "<option style='background-color: #68d968;' value='$id'>$id - $name</option>";
                    break;
                case 4:
                    $teams .= "<option style='background-color: #c55353;' value='$id'>$id - $name</option>";
                    break;
                default:
                    $teams .= "<option value='$id'>$id - $name</option>";
            }
        }
        $all_parties = controllerPartie::getAllFinishedGames();
        include("resources/views/modale.php");
    }

    public static function submitAlignement()
    {
        $alignement_id = Alignement::createAlignement($_SESSION['id']);
        $alignement = Alignement::getObjetById($alignement_id);
        $alignement->createAlignement($_POST['id_partie']);
        echo "<h2>Liste des réponses</h2>";
        foreach ($_POST as $question => $reponse) {
            $question_id = explode("question", $question)[1];
            $reponse_id = Reponse::createReponse($reponse, $alignement_id, $_SESSION['id'], $question_id);
            $reponse = Reponse::getObjetById($reponse_id);
            $expression = Expression::getObjetById(Question::getObjetById($question_id)->get('id_expression'));
            echo "Pour l'expression "
                . $expression->get('litteralTradExpression')
                . " ou dit dans la langue natale "
                . $expression->get('texteLangueExpression')
                . " votre réponse est : "
                . Theme::getObjetById($reponse->get('id_theme'))->get('nomTheme')
                . " et la réponse était "
                . Theme::getObjetById($expression->get('id_theme'))->get('nomTheme')
                . '.';
            if ($reponse->checkReponseTheme()) {
                echo " Bravo ! <br>";
            } else {
                echo " Dommage...<br>";
            }
        }
        echo "<a href='/'>Retour au menu</a>";
    }
}
