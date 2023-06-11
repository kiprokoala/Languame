<?php

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
            $resultat->setFetchmode(PDO::FETCH_CLASS, "Equipe");
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createGame($titre, $index){
        $req_prep = Connexion::pdo()->prepare("INSERT INTO 
                    Partie (titre, id_liste_equipe) VALUES (:tag_titre, :tag_index);");
        try {
            $req_prep->execute(array("tag_titre" => $titre, "tag_index" => $index));
            return Connexion::pdo()->LastInsertId();;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getQuestions(){
        $requete = "SELECT id_question, id_expression, id_partie
                    FROM Question where id_partie = ".$this->id_partie;
        try{
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchMode(PDO::FETCH_CLASS, "Question");
            return $resultat->fetchAll();
        }catch(PDOException $e){
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
            $resultat->setFetchMode(PDO::FETCH_CLASS, "Partie");
            return $resultat->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>