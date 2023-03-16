<?php
class Utilisateur extends Objet {
    
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

    public function afficher(){
        Utilisateur::$objet . " n°" . $this->id_utilisateur . " a pour login " . $this->login . ", pour prénom " . $this->prenom . " et pour nom " . $this->nom . ". Son isChef est à " . $this->isChef . " et son isAdmin est à " . $this->isAdmin;
    }

    public function ajouterLangue($id_l, $nl, $cl, $id_gl) {
        $requetePreparee = "INSERT INTO langue (`id_langue`,`nomLangue`,`codeLangue`, `id_groupeLangue`) VALUES(:id_l,:nl,:cl,:id_gl);"
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
        $valeurs = array("id_l" => $id_l,"nl" => $nl,"cl" => $cl, "id_gl" => $id_gl);
        try {
			$req_prep->execute($valeurs);
			return true;
		} catch(PDOException $e) {
			return false;
		}
    }

    public function proposerAlignement() {}

    public function validerAlignement($isChef) {return;}

    public function supprimerExpression($isAdmin) {return;}
}