<?php

class Equipe extends Objet
{

    // attributs de classe
    protected static $objet = "Equipe";

    protected $id_equipe;
    protected $nomEquipe;
    protected $idChefEquipe;

    //Une méthode d'affichage simple
    public function afficher()
    {
        echo Equipe::$objet . " n°" . $this->id_equipe . " a pour nom " . $this->nomEquipe;
    }

    public function definirChef($userId)
    {
        $requete = "UPDATE equipe as e INNER JOIN utilisateur AS u ON u.id_utilisateur = e.idChefEquipe SET e.idChefEquipe = :id_nouveauChef, u.isChef = CASE WHEN u.id_utilisateur = :id_nouveauChef THEN 1 ELSE 0 END WHERE e.idEquipe = :id_equipe AND u.isChef = 1;";
        try {
            $requete->execute(array("id_nouveauChef" => $userId, "id_equipe" => $this->id_equipe));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function creatingTeam(){
        $groupeLangue = GroupeLangue::getAllObjets();
    }
}


?>