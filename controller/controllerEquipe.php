<?php

namespace controller;

use app\Models\Equipe;

require_once("app/Models/Equipe.php");
require_once("controller/controllerObjet.php");

class controllerEquipe extends controllerObjet
{
    /**
     * Nom de l'objet géré par le contrôleur.
     * @var string
     */
    protected static $objet = "Equipe";

    /**
     * Clé primaire de l'objet géré par le contrôleur.
     * @var string
     */
    protected static $cle = "id_equipe";

    public static function createEquipe(){

        $index = Equipe::createEquipe($_POST['nomEquipe'], $_POST['idChefEquipe'], $_POST['id_groupeLangue']);
        $equipe = Equipe::getObjetById($index);
        // Création de la liste d'équipes
        foreach ($_POST["id_utilisateur"] as $user) {
            $equipe->addPlayerToTeam($user);
        }
        header('Location: /');
    }
}

?>
