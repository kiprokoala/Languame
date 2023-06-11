<?php

class Session
{
    public static function getIdUserConnected()
    {
        return $_SESSION["id"];
    }

    public static function userConnectingAccount()
    {
        if (!empty($_POST["login"]) && !empty($_POST["password"])) {
            $user = Utilisateur::connexionUtilisateur($_POST["login"], $_POST["password"]);

            if ($user != null) {
                $_SESSION["id"] = $user->get("id_utilisateur");
                header('Location: /profil');
            }
        }
        include("resources/views/generic/header.php");
        echo "<p style='color:white;'>Votre compte ne semble pas exister !</p>";
        echo "<a href='/formConnect'><button>Retour à la connexion</button></a>";
    }
}
