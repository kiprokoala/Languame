<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDO;
use PDOException;

class GroupeLangue extends Objet
{

    // attributs de classe
    protected static $objet = "GroupeLangue";
    protected static $cle = "id_groupeLangue";

    protected $id_groupeLangue;
    protected $nomGroupeLangue;

    function afficher()
    {
        GroupeLangue::$objet . " a pour numéro " . $this->id_groupeLangue . " et comme nom " . $this->nomGroupeLangue;
    }

    public function getAllMembers()
    {
        $requete = Connexion::pdo()->prepare("SELECT u.id_utilisateur, login, mdp, prenom, mdp, isChef, isAdmin, email, u.id_langue 
            FROM utilisateur u 
            INNER JOIN parle_le p ON p.id_langue IN (
                SELECT l.id_langue FROM langue l Where id_groupeLangue = $this->id_groupeLangue
            )
    UNION
        SELECT u.id_utilisateur, login, mdp, prenom, mdp, isChef, isAdmin, email, u.id_langue 
            FROM utilisateur u 
	        WHERE u.id_langue in (
                SELECT l.id_langue FROM langue l Where id_groupeLangue = $this->id_groupeLangue)
    ");
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Langue'));
            $obj = $resultat->fetchAll();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}


?>