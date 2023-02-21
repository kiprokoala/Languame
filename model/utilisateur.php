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

    /*
     *
     * Fonctions d'utilisateur
     *
    */

    public function proposerAlignement($alignement, $reponses)
    {
        //Avoir un rendu visuel à la fin de la création de l'alignement
        Alignement::creerAlignement($this->id_utilisateur, $alignement, $reponses);
    }

    public function validerAlignement($alignement, $partie)
    {
        //Avoir un rendu visuel de la validation de l'alignement
        if ($this->isChef) {
            Alignement::validerAlignement($alignement, $partie);
        } else {
            echo "Vous n'êtes pas chef d'équipe! ";
        }
    }

    /*
     *
     * Fonctions système
     *
    */

    public function voirLesAlignementsProposes()
    {
        //Faire une indentation du texte en fonction du front
        Alignement::getAllObjets();
    }

    /*
     *
     * Fonctions d'administrateur
     *
    */

    //Expressions
    public function ajouterExpression($textelangue, $litteraltrad, $theme, $pays, $langue)
    {
        //Ajouter un rendu visuel lorsque la création est finie
        if ($this->isAdmin) {
            Expression::ajouterExpression($textelangue, $litteraltrad, $theme, $pays, $langue);
        } else {
            echo "Vous n'êtes pas administrateur! ";
        }
    }

    public function modifierExpression($expression, $textelangue, $litteraltrad, $theme, $pays, $langue)
    {
        //Ajouter un rendu visuel lorsque la modification est finie
        if ($this->isAdmin) {
            Expression::modifierExpression($expression, $textelangue, $litteraltrad, $theme, $pays, $langue);
        } else {
            echo "Vous n'êtes pas administrateur! ";
        }
    }

    public function supprimerExpression($expression)
    {
        //Avoir un rendu visuel lors de la suppression
        if ($this->isAdmin) {
            Expression::supprimerExpression($expression);
        } else {
            echo "Vous n'êtes pas administrateur! ";
        }
    }
    //Fin expression

    //Langue
    public function ajouterLangue($langue, $code, $groupelangue)
    {
        //Ajouter un rendu visuel lorsque la création est finie
        if ($this->isAdmin) {
            Langue::ajouterLangue($langue, $code, $groupelangue);
        }
    }

    public function modifierLangue($idlangue, $langue, $code, $groupelangue)
    {
        //Ajouter un rendu visuel lorsque la création est finie
        if ($this->isAdmin) {
            Langue::modifierLangue($idlangue, $langue, $code, $groupelangue);
        }
    }

    public function supprimerLangue($langue)
    {
        //Avoir un rendu visuel lors de la suppression
        if ($this->isAdmin) {
            Langue::supprimerLangue($langue);
        }
    }
    //Fin Langue

    //Compte - Différence notoire entre compte et utilisateur
    //Compte créé, supprimé et modifié par admin
    //Utilisateur créé, supprimé et modifié par lui-même
    public function creerCompte($login, $mdp, $prenom, $nom, $isAdmin)
    {
        if($this->isAdmin) {
            Utilisateur::creerUtilisateur($login, $mdp, $prenom, $nom, false, $isAdmin);
        }
    }

    public function modifierCompte($id_utilisateur, $login, $mdp, $prenom, $nom, $isAdmin)
    {
        if($this->isAdmin) {
            Utilisateur::modifierUtilisateur($login, $mdp, $prenom, $nom, false, $isAdmin);
        }
    }

    public function supprimerCompte()
    {
        if ($this->isAdmin) {
            Utilisateur::supprimerUtilisateur($this->id_utilisateur);
        }
    }
    //Fin compte

    //Utilisateur
    public function supprimerUtilisateur($utilisateur)
    {
        if ($this->isAdmin) {
            Langue::supprimerUtilisateur($utilisateur);
        }
    }
    //Fin utilisateur
}