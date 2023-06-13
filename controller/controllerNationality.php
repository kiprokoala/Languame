<?php

namespace controller;

use app\Models\Pays;
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

    public function chargetCodeParPays()
    {
        // Vérifie si le paramètre "nom" est présent dans la requête GET
        if (!isset($_GET["nom"])) {
            // Si le paramètre "nom" n'est pas fourni, renvoie une erreur
            echo json_encode(["error" => "Le paramètre 'nom' est manquant"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $nom = $_GET["nom"];

        // Obtient le code du pays en utilisant la méthode statique de la classePays
        $code = Pays::getCodeByPays($nom);

        // Vérifie si le code du pays est trouvé
        if ($code === false) {
            // Si le code du pays n'est pas trouvé, renvoie une erreur
            echo json_encode(["error" => "Pays non trouvé"], JSON_UNESCAPED_UNICODE);
            echo json_encode("test2");

            exit;
        }

        // Construit le tableau de données contenant le code du pays
        $donnees = [
            "code" => $code
        ];

        // Affiche le tableau $donnees au format JSON
        echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
    }
}
