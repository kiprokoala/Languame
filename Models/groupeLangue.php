<?php
class GroupeLangue extends Objet {
    
    // attributs de classe
	protected static $objet = "GroupeLangue";

    protected $id_groupeLangue;
    protected $nomGroupeLangue;

    function afficher(){
        GroupeLangue::$objet . " a pour numéro " . $this->id_groupeLangue . " et comme nom " . $this->nomGroupeLangue;
    }

    public function getAllMembers(){
        $requete = Connexion::pdo()->prepare("SELECT u.id_utilisateur, login, mdp, prenom, mdp, isChef, isAdmin, email, u.id_langue 
            FROM Utilisateur u 
            INNER JOIN parle_le p ON p.id_langue IN (
                SELECT l.id_langue FROM Langue l Where id_groupeLangue = $this->id_groupeLangue
            )
    UNION
        SELECT u.id_utilisateur, login, mdp, prenom, mdp, isChef, isAdmin, email, u.id_langue 
            FROM Utilisateur u 
	        WHERE u.id_langue in (
                SELECT l.id_langue FROM Langue l Where id_groupeLangue = $this->id_groupeLangue)
    ");
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_CLASS, "Langue");
            $obj = $resultat->fetchAll();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}


?>