<?php

class Objet
{

    // getter g�n�rique
    public function get($attribut)
    {
        return $this->$attribut;
    }

    // setter g�n�rique
    public function set($attribut, $valeur)
    {
        $this->$attribut = $valeur;
    }

    // constructeur g�n�rique
    public function __construct($donnees = NULL)
    {
        if (!is_null($donnees)) {
            foreach ($donnees as $attribut => $valeur) {
                $this->set($attribut, $valeur);
            }
        }
    }


    public static function getAllObjets()
    {
        $table = static::$objet;
        //écriture de la requête
        $requete = "SELECT * from $table";
        // envoi de la requête et stockage de la réponse
        $resultat = Connexion::pdo()->query($requete);
        // traitement de la réponse
        $resultat->setFetchmode(PDO::FETCH_CLASS, $table);
        $tableau = $resultat->fetchAll();
        return $tableau;
    }


    public static function getObjetById($id)
    {
        $table = static::$objet;
        $cle = static::$cle;
        $req_prep = Connexion::pdo()->prepare("SELECT * FROM $table WHERE $cle = :tag_id;");
        try {
            $req_prep->execute(array("tag_id" => $id));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $table);
            $obj = $req_prep->fetch();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteObjetById($id)
    {
        $table = static::$objet;
        $cle = static::$cle;
        $req_prep = Connexion::pdo()->prepare("DELETE FROM $table WHERE $cle = :tag_id;");
        try {
            $req_prep->execute(array("tag_id" => $id));
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function addObjet($tab)
    {
        $table = static::$objet;
        $columns = "(";
        $tags = "(";
        $element = array_key_last($tab);
        foreach ($tab as $key => $value) {
            $columns .= '`' . $key . '`';
            $tags .= ':' . $key;
            if ($key != $element) {
                $columns .= ',';
                $tags .= ',';
            }
        }
        $columns .= ")";
        $tags .= ")";
        $requete = "INSERT INTO $table $columns VALUES $tags";
        $req_prep = Connexion::pdo()->prepare($requete);
        try {
            $req_prep->execute($tab);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function updateObjet($tab)
    {
        $table = static::$objet;
        $cle = static::$cle;
        $mini = "";
        $value_key = "";
        $element = array_key_last($tab);
        foreach ($tab as $key => $value) {
            if ($key != $cle) {
                $mini .= $key . " = '" . $value . "'";
                if ($key != $element) {
                    $mini .= ", ";
                }
            } else {
                $value_key = $value;
            }
        }

        $requete = "UPDATE $table SET $mini WHERE $cle = $value_key";
        $req_prep = Connexion::pdo()->prepare($requete);
        try {
            $req_prep->execute($tab);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>