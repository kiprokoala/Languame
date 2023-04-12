<?php

require_once("model/utilisateur.php");
require_once("controller/controllerObjet.php");

class controllerUtilisateur extends controllerObjet
{
    protected static $objet = "Utilisateur";
    protected static $cle = "id_utilisateur";
}
?>