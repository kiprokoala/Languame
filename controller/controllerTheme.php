<?php

require_once("model/theme.php");
require_once("controller/controllerObjet.php.bak");

class controllerTheme extends controllerObjet
{
    protected static $objet = "Theme";
    protected static $cle = "id_theme";
}
