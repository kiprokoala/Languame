<?php

class Reponse extends Objet
{

    // attributs de classe
    protected static $objet = "Reponse";

    protected $id_alignement;
    protected $id_utilisateur;
    protected $id_question;
    protected $id_theme;

    //Méthode d'affichage simple
    function afficher()
    {
        echo Reponse::$objet . " est liée à l'Alignement n°" . $this->id_alignement . ", l'Utilisateur n°" . $this->id_utilisateur . ", la Question n°" . $this->id_question . " et le Thème n°" . $this->id_theme;
    }
}

?>