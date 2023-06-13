<?php

namespace app\Models;

use app\Models\Objet;
use app\Utils\Database as Connexion;
use PDO;
use PDOException;

class Langue extends Objet
{

    // attributs de classe
    protected static $objet = "Langue";
    protected static $cle = "id_langue";

    protected $id_langue;
    protected $nomLangue;
    protected $codeLangue;
    protected $id_groupeLangue;

    public function afficher()
    {
        Langue::$objet . " n°" . $this->id_langue . " a pour nom " . $this->nomLangue . " et pour code " . $this->codeLangue . ". Il fait partie du groupe de langues n°" . $this->id_groupeLangue;
    }

    public static function getAllLangues(){
        try {
            // préparation de la requête
            $sql = "SELECT * FROM langue ORDER BY nomLangue ASC";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // renvoi du tableau de résultats
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur lors de la recherche dans la base de données.");
        }
    }
}


?>