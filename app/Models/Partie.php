<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDO;
use PDOException;

class Partie extends Objet
{

    // attributs de classe
    protected static $objet = "Partie";
    protected static $cle = "id_partie";

    protected $id_partie;
    protected $titre;
    protected $winner;
    protected $id_liste_equipe;

    function afficher()
    {
        Partie::$objet . " n°" . $this->id_partie . " et l'équipe qui y participe est la n° " . $this->id_equipe;
    }

    public function getAllEquipes()
    {
        $requete = "SELECT e.id_equipe, nomEquipe, idChefEquipe, id_groupeLangue FROM equipe e
            inner join liste_equipe l on e.id_equipe = l.id_equipe WHERE id_liste_equipe = $this->id_liste_equipe;";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Equipe'));
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createGame($titre, $index)
    {
        $req_prep = Connexion::pdo()->prepare("INSERT INTO 
                    partie (titre, id_liste_equipe) VALUES (:tag_titre, :tag_index);");
        try {
            $req_prep->execute(array("tag_titre" => $titre, "tag_index" => $index));
            return Connexion::pdo()->LastInsertId();;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getQuestions()
    {
        $requete = "SELECT id_question, id_expression, id_partie
                    FROM question where id_partie = " . $this->id_partie;
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Question'));
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllFinishedGames($id){
        $requete = "SELECT p.id_partie, titre, winner, p.id_liste_equipe
                    FROM Partie p
                    INNER JOIN liste_equipe l ON l.id_liste_equipe = p.id_liste_equipe
                    INNER JOIN est_dans e ON e.id_equipe = l.id_equipe
                    WHERE winner IS NOT NULL AND id_utilisateur = ".$id;
        try{
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, config('aliases.Partie'));
            return $resultat->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getNumberOfMatesInPartie($user, $partie){
        $requete = "select count(es.id_equipe)
                    from est_dans es
                    inner join liste_equipe l on l.id_equipe = es.id_equipe
                    inner join partie p on p.id_liste_equipe = l.id_liste_equipe
                    where es.id_utilisateur = ".$user." and p.id_partie = ".$partie.";";
        try{
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_NUM);
            return $resultat->fetch();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getNumberOfAnswersInPartie($user, $partie){
        $requete = "select count(a.id_alignement)
                    from alignement a
                    inner join est_donne e on e.id_alignement = a.id_alignement
                    inner join partie p on p.id_partie = e.id_partie
                    where a.id_utilisateur = ".$user." and p.id_partie = ".$partie.";";
        try{
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_NUM);
            return $resultat->fetch();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>