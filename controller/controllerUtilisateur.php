<?php

require_once("model/utilisateur.php");
require_once("controller/controllerObjet.php");

class controllerUtilisateur extends controllerObjet
{
    protected static $objet = "Utilisateur";
    protected static $cle = "id_utilisateur";

    public function voirProfilAdmin(){
        include("view/generic/header.php");
        //$userId = $_SESSION['user_id'];
        $user = Utilisateur::getObjetById(1);
        include("url_a_definir");
    }
}
