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
    protected $isChef;
    protected $isAdmin;

    public function ajouterLangue() {}

    public function proposerAlignement() {}

    public function validerAlignement($isChef) {return;}

    public function supprimerExpression($isAdmin) {return;}
}