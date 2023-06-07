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


    public static function getExpressionsByPays($id_pays){
        $requete = "SELECT * FROM Expression WHERE id_pays ='$id_pays'" ;
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_OBJ);
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /*
    public static function getExpressionsByPays($code){
        try {
            // préparation de la requête
            $sql = "SELECT id_pays FROM pays WHERE raccourciPays='$code'";
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_OBJ);
            $id = $req_prep->fetchAll();
            return $id;
            // renvoi du tableau de résultats
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur lors de la recherche dans la base de données.");
        }

        

        try {
            $requete = "SELECT * FROM Expression WHERE raccourciPays = '$id'";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->execute();
            $req_prep->setFetchmode(PDO::FETCH_OBJ);
            return $req_prep->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    */

}
?>