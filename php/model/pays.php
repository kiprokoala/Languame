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
        // écriture de la requête
		$requete = "SELECT id_pays FROM pays WHERE raccourciPays = :p_tag;";
		$req_prep = Connexion::pdo()->prepare($requete);
		
		$valeurs = array("p_tag" => $code);
		
		try {
			$req_prep->execute($valeurs);
			$req_prep->setFetchmode(PDO::FETCH_CLASS, "Pays");
			$tableau = $req_prep->fetchAll();
			return $tableau;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}

    }
}
