<?php
class Session {
    /**
     * Récupère l'identifiant de l'utilisateur connecté à la session.
     * @return mixed Identifiant de l'utilisateur connecté.
     */
    public static function getIdUserConnected(){
        return $_SESSION["id"];
    }

    /**
     * Connecte l'utilisateur en vérifiant les informations de connexion.
     * Affiche la vue du compte utilisateur si la connexion est réussie.
     * Affiche un message d'erreur sinon.
     */
    public static function userConnectingAccount(){
        $user = Utilisateur::connexionUtilisateur($_POST["login"], $_POST["password"]);
        if($user != null) {
            $_SESSION["id"] = $user->get("id_utilisateur");
            include("view/accountView.php");
        }else{
            include("view/generic/header.php");
            echo "<p style='color:white;'>Votre compte ne semble pas exister !</p>";
            echo "<a href='/formConnect'><button>Retour à la connexion</button></a>";
        }
    }
}
?>
