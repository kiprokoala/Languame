<?php

require_once("model/objet.php");

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
        $table = static::$objet;
        $req_prep = Connexion::pdo()->prepare("SELECT * FROM $table WHERE login = :tag_login and mdp = :tag_mdp;");
        try {
            $req_prep->execute(array("tag_login" => $login, "tag_mdp" => $mdp));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $table);
            $obj = $req_prep->fetch();
            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function estConnecte(){
        return (bool)$_SESSION["id"];
    }
}
?>