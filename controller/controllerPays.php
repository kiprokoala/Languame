<?php

require_once("model/pays.php");
require_once("controller/controllerObjet.php");

class controllerPays extends controllerObjet
{
    protected static $objet = "Pays";
    protected static $cle = "id_pays";
}
?>