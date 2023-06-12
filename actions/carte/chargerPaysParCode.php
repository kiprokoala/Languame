<?php

require_once("../../conf/connexion.php");
Connexion::connect();
require_once("../../model/paysTest.php");

/**
 * Fichier de récupération des informations d'un pays par son code via une requête AJAX.
 */

// Récupération du code du pays à partir des paramètres GET
$code = $_GET["code"];

// On récupère les informations du pays en fonction de son code
$pays = Pays::getPaysByCode($code);

// On construit le tableau de données contenant les informations du pays
$donnees = array();

// On remplit le tableau avec les informations du pays
$donnees[] = $pays;

// On affiche le tableau $donnees au format JSON pour la requête AJAX
echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
?>
