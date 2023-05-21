<?php

require_once("model/Langue.php");
require_once("controller/controllerObjet.php.bak");

class controllerLangue extends controllerObjet
{
    protected static $objet = "Langue";
    protected static $cle = "id_langue";
}
