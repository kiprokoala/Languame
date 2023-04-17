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

    public function definirChef($user)
    {
        $old = $this->idChefEquipe;
        $requete = "UPDATE equipe SET idChefEquipe = :c_tag where id_equipe = :i_tag";
        $requete2 = "UPDATE utilisateur SET isChef = 0 WHERE id_utilisateur = :o_tag";
        $requete3 = "UPDATE utilisateur SET isChef = 1 WHERE id_utilisateur = :u_tag";
        $req_prep = Connexion::pdo()->prepare($requete);
        $req_prep2 = Connexion::pdo()->prepare($requete2);
        $req_prep3 = Connexion::pdo()->prepare($requete3);
        try {
            $req_prep->execute(array("c_tag" => $user, "i_tag" => $this->id_equipe));
            $req_prep2->execute(array("o_tag" => $old));
            $req_prep3->execute(array("u_tag" => $user));
        } catch (PDOException $e) {
            echo $e;
        }
    }

}


?>