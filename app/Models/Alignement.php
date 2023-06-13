<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDOException;

class Alignement extends Objet
{
    // attributs de classe
    protected static $objet = "Alignement";

    protected $id_alignement;
    protected $id_utilisateur;

    public static function createAlignement($utilisateur)
    {
        $req_prep = Connexion::pdo()->prepare("INSERT INTO 
                    alignement (id_utilisateur) VALUES (:tag_utilisateur);");
        try {
            $req_prep->execute(array("tag_utilisateur" => $utilisateur));
            return Connexion::pdo()->LastInsertId();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function linkAlignementPartie($partie){
        $req_prep = Connexion::pdo()->prepare("INSERT INTO est_donne (id_alignement, id_partie) VALUES (:tag_alignement, :tag_partie)");
        try{
            $req_prep->execute(array("tag_alignement" => $this->id_alignement, "tag_partie" => $partie));
            return true;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function afficher()
    {
        echo Alignement::$objet . " n°" . $this->id_alignement . " est lié à l'utilisateur n°" . $this->id_utilisateur;
    }
}
