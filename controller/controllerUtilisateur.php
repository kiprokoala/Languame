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
        include("view/generic/formUtilisateur.html");
        include("view/generic/footer.php");
    }

    public static function disconnect(){
        session_destroy();
        header("Location: /");
    }

    public static function subscribing(){

        $login = $_POST['login'];
        $mdp = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        $user = Utilisateur::addObjet(
            array(
                "login" => $login,
                "mdp" => $mdp,
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "isAdmin" => 0,
                "isChef" => 0
            )
        );

        self::connect();
    }
}
