<?php
class Personne extends Objet {
    
    // attributs de classe
	protected static $objet = "Personne";


    //attribut objet

    protected $idPersonne;
    protected $login;
    protected $mdp;
    protected $prenom;
    protected $idEquipe;
    protected $isChef;
    protected $idAdmin;

    public function ajouterLangue() {}

    public function proposerAlignement() {}

    public function validerAlignement(isCHef) {}

    public function supprimerExpression(isAdmin) {}

    


    }
}