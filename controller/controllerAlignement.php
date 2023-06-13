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
        $themes = json_encode(Theme::getAllObjets());
        $teams = json_encode(Equipe::getAllObjets());

        $all_parties = json_encode(controllerPartie::getAllFinishedGames());
        include("resources/views/modale.php");
    }

    public static function submitAlignement()
    {
        $alignement_id = Alignement::createAlignement($_SESSION['id']);
        $alignement = Alignement::getObjetById($alignement_id);
        $alignement->createAlignement($_SESSION['id_partie']);
        $reponses = [];
        foreach ($_POST as $question => $reponse) {
            $question_id = explode("question", $question)[1];
            $reponse_id = Reponse::createReponse($reponse, $alignement_id, $_SESSION['id'], $question_id);
            $reponses[] = Reponse::getObjetById($reponse_id);
        }
        $reponses = json_encode($reponses);
        header('Location: /');
    }
}
