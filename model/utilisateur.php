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

    public function creerUtilisateur($login, $mdp, $prenom, $nom, $isAdmin)
    {
        self::addObjet(get_defined_vars());
    }

    public function modifierUtilisateur($id_utilisateur, $login, $mdp, $prenom, $nom, $isAdmin)
    {
        if($id_utilisateur == estConnecte() || $this->isAdmin){
            self::updateObjet(get_defined_vars());
        }
    }

    public function supprimerUtilisateur($id_utilisateur)
    {
        if($id_utilisateur == estConnecte() || $this->isAdmin){
            self::deleteObjetById($id_utilisateur);
        }
    }

    public function connexionUtilisateur($login, $mdp)
    {
        $table = static::$objet;
        $req_prep = Connexion::pdo()->prepare("SELECT * FROM $table WHERE $login = :tag_login;");
        try {
            $req_prep->execute(array("tag_login" => $login));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $table);
            $obj = $req_prep->fetch();
            if($obj){
                if(password_verify($mdp, $obj["mdp"])){
                    return $obj;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function estConnecte(){
        return $_SESSION["id"];
    }

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
            return false;
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
            return false;
        }
    }

    public function modifierExpression($expression, $textelangue, $litteraltrad, $theme, $pays, $langue)
    {
        //Ajouter un rendu visuel lorsque la modification est finie
        if ($this->isAdmin) {
            Expression::modifierExpression($expression, $textelangue, $litteraltrad, $theme, $pays, $langue);
        } else {
            return false;
        }
    }

    public function supprimerExpression($expression)
    {
        //Avoir un rendu visuel lors de la suppression
        if ($this->isAdmin) {
            Expression::supprimerExpression($expression);
        } else {
            return false;
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
}