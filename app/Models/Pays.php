<?php

namespace app\Models;

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

    /**
     * Méthode pour afficher les informations du pays.
     */
    public function afficher(){
        echo Pays::$objet . " n°" . $this->id_pays . " a pour nom " . $this->nomPays . ". Son raccourci est " . $this->raccourciPays .
		". Il a pour latitude " . $this->latitudeCapitalePays . " et pour longitude " . $this->longitudeCapitalePays;
    }

    /**
     * Méthode pour récupérer les expressions liées à ce pays.
     *
     * @return array|false Tableau contenant les expressions liées à ce pays ou false en cas d'erreur.
     */
    public function getExpressionsByPays(){
        $requete = "SELECT * FROM Expression WHERE id_pays = ".$this->get("id_pays").";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, $objet);
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Méthode statique pour récupérer tous les pays.
     *
     * @return array|false Tableau contenant tous les pays ou false en cas d'erreur.
     */
    public static function getAllPays() {
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

    /**
     * Méthode statique pour récupérer un pays en fonction de son code.
     *
     * @param string $code Code du pays à récupérer.
     * @return array|false Tableau contenant le pays correspondant au code ou false en cas d'erreur.
     */
    public static function getPaysByCode($code) {
        try {
            // préparation de la requête
            $sql = "SELECT * FROM pays WHERE raccourciPays='$code'";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // renvoi du tableau de résultats
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Méthode statique pour récupérer le code d'un pays en fonction de son nom.
     *
     * @param string $nom Nom du pays.
     * @return array|false Tableau contenant le code du pays correspondant au nom ou false en cas d'erreur.
     */
    public static function getCodeByPays($nom) {
        try {
            // Préparation de la requête
            $sql = "SELECT * FROM pays WHERE nomPays='$nom'";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // renvoi du tableau
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
