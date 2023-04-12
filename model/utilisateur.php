<?php

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

    public function afficher()
    {
        Utilisateur::$objet . " n°" . $this->id_utilisateur . " a pour login " . $this->login . ", pour prénom " . $this->prenom . " et pour nom " . $this->nom . ". Son isChef est à " . $this->isChef . " et son isAdmin est à " . $this->isAdmin;
    }


    public function creerUtilisateur($login, $mdp, $prenom, $nom, $isAdmin)
    {
        self::addObjet(get_defined_vars());
    }

    public function modifierUtilisateur($id_utilisateur, $login, $mdp, $prenom, $nom, $isAdmin)
    {
        ($id_utilisateur == self::estConnecte() || $this->isAdmin) ? self::updateObjet(get_defined_vars()) : 0;
    }

    public function supprimerUtilisateur($id_utilisateur)
    {
        ($id_utilisateur == self::estConnecte() || $this->isAdmin) ? self::deleteObjetById($id_utilisateur) : 0;
    }

    public function connexionUtilisateur($login, $mdp)
    {
        $table = static::$objet;
        $req_prep = Connexion::pdo()->prepare("SELECT * FROM $table WHERE $login = :tag_login;");
        try {
            $req_prep->execute(array("tag_login" => $login));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $table);
            $obj = $req_prep->fetch();
            $obj ? (password_verify($mdp, $obj["mdp"]) ? return $obj : return false) : return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function estConnecte(){
        $_SESSION["id"] ? return true : return false;
    }
}
?>