<?php

require_once("model/utilisateur.php");
require_once("model/session.php");
require_once("controller/controllerObjet.php");

class controllerUtilisateur extends controllerObjet
{
    protected static $objet = "Utilisateur";
    protected static $cle = "id_utilisateur";

    public function profil(){
        $_SESSION['id'] = 1;
        $user = Utilisateur::getObjetById(Session::getIdUserConnected());
    }

    public function connectUser(){
        Session::userConnectingAccount();
    }

    public function formConnect(){
        include("view/generic/header.php");
        include("view/generic/formUtilisateur.php");
        include("view/generic/footer.php");
    }
}
