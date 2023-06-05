<?php

require_once("model/utilisateur.php");
require_once("model/session.php");
require_once("controller/controllerObjet.php");

class controllerUtilisateur extends controllerObjet
{
    protected static $objet = "Utilisateur";
    protected static $cle = "id_utilisateur";

    public static function profil(){
        if(isset($_SESSION["id"])){
            $user = Utilisateur::getObjetById(Session::getIdUserConnected());
            include("view/accountView.php");
        }else{
            self::formConnect();
        }
    }

    public static function connect(){
        Session::userConnectingAccount();
    }

    public static function formConnect(){
        include("view/generic/header.php");
        include("view/generic/formUtilisateur.php");
        include("view/generic/footer.php");
    }

    public static function disconnect(){
        session_destroy();
        header("Location: /");
    }
}
