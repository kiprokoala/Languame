<?php
class Pays {
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
            die("Erreur lors de la recherche dans la base de données.");
        }
    }

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
            die("Erreur lors de la recherche");
        }
    }
}
?>