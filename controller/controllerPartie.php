<?php

require_once("model/Partie.php");
require_once("controller/controllerObjet.php");

class controllerPartie extends controllerObjet
{
    protected static $objet = "Partie";
    protected static $cle = "id_partie";
}
?>