<?php
class Pays {
    /**
     * Récupère tous les pays dans la base de données.
     * @return array Tableau contenant les informations de tous les pays.
     * @throws PDOException En cas d'erreur lors de la recherche dans la base de données.
     */
    public static function getAllPays() {
        try {
            // Préparation de la requête
            $sql = "SELECT * FROM pays";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // Renvoi du tableau de résultats
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur lors de la recherche dans la base de données.");
        }
    }

    /**
     * Récupère les informations d'un pays en fonction de son code.
     * @param string $code Code du pays.
     * @return array Tableau contenant les informations du pays.
     * @throws PDOException En cas d'erreur lors de la recherche dans la base de données.
     */
    public static function getPaysByCode($code) {
        try {
            // Préparation de la requête
            $sql = "SELECT * FROM pays WHERE raccourciPays='$code'";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // Renvoi du tableau de résultats
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur lors de la recherche dans la base de données.");
        }
    }

    /**
     * Récupère le code d'un pays en fonction de son nom.
     * @param string $nom Nom du pays.
     * @return array Tableau contenant le code du pays.
     * @throws PDOException En cas d'erreur lors de la recherche dans la base de données.
     */
    public static function getCodeByPays($nom) {
        try {
            // Préparation de la requête
            $sql = "SELECT * FROM pays WHERE nomPays='$nom'";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $tabResults = $req_prep->fetchAll();
            // Renvoi du tableau
            return $tabResults;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur lors de la recherche");
        }
    }

    /**
     * Récupère les expressions d'un pays en fonction de son identifiant.
     * @param int $id_pays Identifiant du pays.
     * @return array Tableau contenant les expressions du pays.
     * @throws PDOException En cas d'erreur lors de la recherche dans la base de données.
     */
    public static function getExpressionsByPays($id_pays){
        $requete = "SELECT id_expression, texteLangueExpression FROM Expression WHERE id_pays ='$id_pays'" ;
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_OBJ);
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

     /**
     * Récupère les expressions des pays.
     * @return array Tableau contenant les expressions des pays.
     * @throws PDOException En cas d'erreur lors de la recherche dans la base de données.
     */
    public static function getAllExpressions($id_pays){
        $requete = "SELECT id_expression, texteLangueExpression, litteralTradExpression FROM Expression" ;
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_OBJ);
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}
?>
