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
                include("resources/views/accountView.php");
                // Comme les vues ne fonctionnent pas en retournant quelque chose, on fait un exit pour ne pas
                // Executer le code ci-dessous
                exit;
            }
        }
        include("resources/views/generic/header.php");
        echo "<p style='color:white;'>Votre compte ne semble pas exister !</p>";
        echo "<a href='/formConnect'><button>Retour à la connexion</button></a>";
    }
}
