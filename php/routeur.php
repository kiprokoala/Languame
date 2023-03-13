<?php
require_once("config/connexion.php");
Connexion::connect();
require_once("model/pays.php");

$objet = $_GET["objet"];
$action = $_GET["action"];

include("actions/$objet/$action.php");

?>
