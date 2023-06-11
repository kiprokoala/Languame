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
            $langs = $user->parle();
            $all_langs = $tag_langs = $lang = "";

            foreach($langs as $lang){
                $all_langs .= "<span>".$lang->get("nomLangue")."</span>";
                $tag_langs .= "
                    <div class='tagLang'>".$lang->get("nomLangue")."
                        <button type='submit' formaction='removingLang' name='id' value='".$lang->get('id_langue')."' style='background-color: transparent; border: none;'>
                            <img src='/assets/close.png' id='imgClose'>
                        </button>
                    </div>";
            }

            $nonSpokenLang = $user->getAllLanguesNonSpoken();
            $available_langs = "<option value=''>Please select a lang</option>";
            foreach ($nonSpokenLang as $lang){
                $available_langs .= "<option value='".$lang->get('id_langue')."'>".$lang->get("nomLangue")."</option>";
            }

            $lang = Langue::getObjetById($user->get('id_langue'))->get('nomLangue');

            include("view/accountView.php");
        }else{
            self::formConnect();
        }
    }

    public static function addingLang(){
        if(trim($_POST["langs"]) !== ""){
            $user = Utilisateur::getObjetById($_SESSION['id']);
            $user->addLangToUser($_POST["langs"]);
        }
        self::profil();
    }

    public static function removingLang(){
        $user = Utilisateur::getObjetById($_SESSION['id']);
        $user->removeLangToUser($_POST["id"]);
        self::profil();
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

    public static function modifyAccount(){
        $_POST["id_utilisateur"] = $_SESSION["id"];
        $user = Utilisateur::getObjetById($_SESSION["id"]);

        $_POST["isChef"] = $user->get("isChef");
        $_POST["isAdmin"] = $user->get("isAdmin");
        $_POST["login"] = $user->get("login");
        $_POST["mdp"] = trim($_POST['mdp']) == '' ? $user->get('mdp') : $_POST['mdp'];

        $tab = $_POST;
        $langs = $tab["langs"];
        unset($tab["langs"]);
        // A ENLEVER OBLIGATOIREMENT SINON LES PHOTOS NE SERONT PAS UPLOADES
        unset($tab["profilePicture"]);

        Utilisateur::updateObjet($tab);
        header("Location: /profil");
    }


    public static function getAllParties(){
        if(!isset($_SESSION['id'])){
            header("Location: /profil");
        }
        $user = Utilisateur::getObjetById($_SESSION['id']);
        $parties = $user->getAllParties();
        include ("view/listeParties.php");
    }
}
