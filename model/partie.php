<?php

class Partie extends Objet
{

    // attributs de classe
    protected static $objet = "Partie";

    protected $id_partie;
    protected $titre;
    protected $winner;
    protected $id_liste_equipe;

    function afficher()
    {
        Partie::$objet . " n°" . $this->id_partie . " et l'équipe qui y participe est la n° " . $this->id_equipe;
    }

    public function getAllEquipes($id_pays)
    {
        $requete = "SELECT e.id_equipe, nomEquipe, idChefEquipe, id_groupeLangue FROM equipe e
            inner join liste_equipe l on e.id_equipe = l.id_equipe WHERE id_liste_equipe = $this->id_equipe;";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, "Equipe");
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>