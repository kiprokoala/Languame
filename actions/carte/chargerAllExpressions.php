<?php
require_once("../../conf/connexion.php");
Connexion::connect();
require_once("../../model/paysTest.php");

/**
 * Fichier de récupération des expressions d'un pays via une requête AJAX.
 */

// Récupération de l'ID du pays à partir des paramètres GET

// On récupère les expressions du pays
$expressions = Pays::getAllExpressions();

// On affiche le tableau des expressions au format JSON pour la requête AJAX
echo json_encode($expressions, JSON_UNESCAPED_UNICODE);
?>
