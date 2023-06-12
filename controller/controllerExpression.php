<?php

require_once("model/expression.php");
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
