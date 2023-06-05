<?php
class Session {

    public static function getIdUserConnected(){
        return $_SESSION["id"];
    }

    public static function userConnectingAccount(){
        $user = Utilisateur::connexionUtilisateur($_POST["login"], $_POST["password"]);
        if($user != null) {
            $_SESSION["id"] = $user->get("id_utilisateur");
            include("view/accountView.php");
        }else{
            print("t'es pas connecté le reuf");
        }
    }
}
