<?php

namespace controller;

use app\Utils\Database as Connexion;


class controllerNationality
{
    /**
     * Méthode pour afficher la page de nationalité.
     */
    public function home()
    {
        require_once("resources/views/nationalite/index.php");
    }

    public function search()
    {
        if (!empty($_GET['term'])) {
            $secure = htmlspecialchars($_GET['term']);
            $req = Connexion::pdo()->prepare("SELECT * FROM pays  WHERE nomPays LIKE '$secure%' LIMIT 10");
            $req->execute();
            $data = $req->fetchAll();
            echo json_encode($data);
        } else {
            echo json_encode([
                'error' => true,
                'message' => 'Il manque le paramètre url \'term\' !'
            ]);
        }
    }
}
