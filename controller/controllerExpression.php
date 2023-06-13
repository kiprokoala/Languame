<?php

use controller\controllerObjet;

require_once("app/Models/Expression.php");
require_once("controller/controllerObjet.php");

class controllerExpression extends controllerObjet {
    /**
     * Nom de l'objet géré par le contrôleur.
     * @var string
     */
    protected static $objet = "Expression";

    /**
     * Clé primaire de l'objet géré par le contrôleur.
     * @var string
     */
    protected static $cle = "id_expression";
}
?>
