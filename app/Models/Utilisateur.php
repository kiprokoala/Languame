<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDO;
use PDOException;


class Utilisateur extends Objet
{

    // attributs de classe
    protected static $objet = "Utilisateur";
    protected static $cle = "id_utilisateur";

    //attribut objet

    protected $id_utilisateur;
    protected $login;
    protected $mdp;
    protected $prenom;
    protected $nom;
    protected $isChef;
    protected $isAdmin;
    protected $email;

    public function afficher()
    {
        Utilisateur::$objet . " n°" . $this->id_utilisateur . " a pour login " . $this->login . ", pour prénom " . $this->prenom . " et pour nom " . $this->nom . ". Son isChef est à " . $this->isChef . " et son isAdmin est à " . $this->isAdmin . " et son email " . $this->email;
    }

    public static function connexionUtilisateur($login, $mdp)
    {
        $table = strtolower(static::$objet);
        $req_prep = Connexion::pdo()->prepare("SELECT * FROM $table WHERE login = :tag_login and mdp = :tag_mdp;");
        try {
            $req_prep->execute(array("tag_login" => $login, "tag_mdp" => $mdp));
            $req_prep->setFetchmode(PDO::FETCH_CLASS, config('aliases.'.ucfirst($table)));
            $obj = $req_prep->fetch();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function estConnecte()
    {
        return (bool)$_SESSION["id"];
    }

    public function parle()
    {
        $requete = "SELECT l.id_langue, nomLangue, codeLangue, id_groupeLangue  
                    FROM parle_le p 
                    INNER JOIN langue l ON p.id_langue = l.id_langue 
                    WHERE id_utilisateur = $this->id_utilisateur
                    UNION 
                    SELECT l.id_langue, nomLangue, codeLangue, id_groupeLangue
                    FROM utilisateur u
                    INNER JOIN langue l on l.id_langue = u.id_langue
                    WHERE id_utilisateur = $this->id_utilisateur";

        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Langue'));
            $obj = $resultat->fetchAll();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllLanguesNonSpoken()
    {
        $requete = "SELECT * FROM langue WHERE id_langue NOT IN (SELECT id_langue FROM parle_le WHERE id_utilisateur = $this->id_utilisateur 
                                                                            UNION
                                                                SELECT id_langue FROM utilisateur WHERE id_utilisateur = $this->id_utilisateur) ORDER BY nomLangue";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Langue'));
            $obj = $resultat->fetchAll();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addLangToUser($lang)
    {
        $requete = "INSERT INTO parle_le VALUES($this->id_utilisateur, $lang)";
        try {
            Connexion::pdo()->query($requete);
        } catch (PDOException $e) {

        }
    }

    public function removeLangToUser($lang)
    {
        $requete = "DELETE FROM parle_le WHERE id_utilisateur = $this->id_utilisateur AND id_langue = $lang";
        try {
            Connexion::pdo()->query($requete);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllParties()
    {
        $requete = "SELECT id_partie, titre, winner, p.id_liste_equipe
                    FROM Partie p
                    INNER JOIN liste_equipe l ON l.id_liste_equipe = p.id_liste_equipe
                    INNER JOIN est_dans e ON e.id_equipe = l.id_equipe
                    WHERE id_utilisateur = ".$this->id_utilisateur."
                    AND id_partie not in (
                        SELECT id_partie 
                        	from reponse r 
                        	inner join question q on q.id_question = r.id_question 
                        	where id_utilisateur = ".$this->id_utilisateur.") 
                    AND winner IS NULL";
        try{
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Partie'));
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}