<?php

require_once("model/question.php");
require_once("controller/controllerObjet.php");

class controllerQuestion extends controllerObjet
{
    protected static $objet = "Question";
    protected static $cle = "id_question";
}
