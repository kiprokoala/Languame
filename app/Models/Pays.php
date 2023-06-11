<?php

use app\Models\Objet;
use app\Utils\Database as Connexion;

class Pays extends Objet
{

    // attributs de classe
    protected static $objet = "Pays";

    protected $id_pays;
    protected $nomPays;
    protected $raccourciPays;
    protected $latitudeCapitalePays;
    protected $longitudeCapitalePays;

    public static function getAllPays()
    {
        try {
            // préparation de la requête
            $sql = "SELECT * FROM pays";
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

    function afficher()
    {
        Pays::$objet . " n°" . $this->id_pays . " a pour nom " . $this->nomPays . ". Son raccoursi est " . $this->raccourciPays . ". Il a pour latitude " . $this->latitudeCapitalePays . " et pour longitude " . $this->longitudeCapitalePays;
    }

    public function getExpressionsByPays()
    {
        $requete = "SELECT * FROM expression WHERE id_pays = " . $this->get("id_pays") . ";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.' . $this->objet));
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>