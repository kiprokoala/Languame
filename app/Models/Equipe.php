<?php

namespace app\Models;

use app\Utils\Database as Connexion;
use PDO;
use PDOException;

class Equipe extends Objet
{

    // attributs de classe
    protected static $objet = "Equipe";
    protected static $cle = "id_equipe";

    protected $id_equipe;
    protected $nomEquipe;
    protected $idChefEquipe;

    //Une méthode d'affichage simple

    public static function getMaxListIndex()
    {
        $requete = "SELECT MAX(id_liste_equipe) FROM liste_equipe";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchMode(PDO::FETCH_NUM);
            $obj = $resultat->fetch();
            return $obj[0];
        } catch (PDOException $e) {

        }
    }

    public static function addTeamToList($list, $team)
    {
        $requete = "INSERT INTO liste_equipe VALUES($list, $team)";
        try {
            Connexion::pdo()->query($requete);
        } catch (PDOException $e) {

        }
    }

    public function afficher()
    {
        echo Equipe::$objet . " n°" . $this->id_equipe . " a pour nom " . $this->nomEquipe;
    }

    public function definirChef($userId)
    {
        $requete = "UPDATE equipe as e SET e.idChefEquipe = :id_nouveauChef WHERE e.idEquipe = :id_equipe;";
        try {
            $requete->execute(array("id_nouveauChef" => $userId, "id_equipe" => $this->id_equipe));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function createEquipe($nom, $id_chef, $id_groupeLangue){
        $req_prep = Connexion::pdo()->prepare("INSERT INTO 
                    equipe (nomEquipe, idChefEquipe, id_groupeLangue) VALUES (:tag_nom, :tag_chef, :tag_groupe);");
        try {
            $req_prep->execute(array("tag_nom" => $nom, "tag_chef" => $id_chef, "tag_groupe" => $id_groupeLangue));
            return Connexion::pdo()->LastInsertId();;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addPlayerToTeam($user){
        $requete = "INSERT INTO est_dans VALUES($this->id_equipe, $user)";
        try {
            Connexion::pdo()->query($requete);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}


?>