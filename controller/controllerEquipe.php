<?php

require_once("model/equipe.php");
require_once("controller/controllerObjet.php");

class controllerEquipe extends controllerObjet
{
    protected static $objet = "Equipe";
    protected static $cle = "id_equipe";
}
?>