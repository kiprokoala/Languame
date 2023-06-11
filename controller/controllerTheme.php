<?php

require_once("Models/theme.php");
require_once("controller/controllerObjet.php");

class controllerTheme extends controllerObjet
{
    protected static $objet = "Theme";
    protected static $cle = "id_theme";
}
