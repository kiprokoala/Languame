<?php
require_once("Models/Objet.php");

class Alignement extends Objet
{

    // attributs de classe
    protected static $objet = "Alignement";

    protected $id_alignement;
    protected $id_utilisateur;

    public function afficher()
    {
        echo Alignement::$objet . " n°" . $this->id_alignement . " est lié à l'Utilisateur n°" . $this->id_utilisateur;
    }

    public static function createAlignement($utilisateur){
        $req_prep = Connexion::pdo()->prepare("INSERT INTO 
                    Alignement (id_utilisateur) VALUES (:tag_utilisateur);");
        try {
            $req_prep->execute(array("tag_utilisateur" => $utilisateur));
            return Connexion::pdo()->LastInsertId();
        } catch (PDOException $e) {
            return null;
        }
    }
}
