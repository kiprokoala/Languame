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

    public function chargerCodeParPays()
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

    public function chargerDonneesMySQL()
    {

        // 1. on récupère les tableaux de livres et d'adhérents à partir du modèle Pays
        $pays = Pays::getAllPays();

        // 2. on construit le tableau de données contenant les pays
        $donnees = array();

        // 3. on ajoute le tableau des pays au tableau de données
        $donnees[] = $pays;

        // 4. on affiche le tableau $donnees au format JSON pour qu'il puisse être récupéré proprement
        // par la requête AJAX à l'origine de cette recherche
        echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
    }

    public function chargerExpressionParPays()
    {
        /**
         * Fichier de récupération des expressions d'un pays via une requête AJAX.
         */

        // Récupération de l'ID du pays à partir des paramètres GET
        $id_pays = $_GET["id_pays"];

        // On récupère les expressions du pays
        $expressions = Pays::getExpressionsByPays($id_pays);

        // On affiche le tableau des expressions au format JSON pour la requête AJAX
        echo json_encode($expressions, JSON_UNESCAPED_UNICODE);
    }

    public function chargerPaysParCode()
    {
        /**
         * Fichier de récupération des informations d'un pays par son code via une requête AJAX.
         */

        // Récupération du code du pays à partir des paramètres GET
        $code = $_GET["code"];

        // On récupère les informations du pays en fonction de son code
        $pays = Pays::getPaysByCode($code);

        // On construit le tableau de données contenant les informations du pays
        $donnees = array();

        // On remplit le tableau avec les informations du pays
        $donnees[] = $pays;

        // On affiche le tableau $donnees au format JSON pour la requête AJAX
        echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
    }
}
