<?php

require_once("../../conf/connexion.php");
Connexion::connect();
require_once("../../model/paysTest.php");

$code = $_GET["code"];

// 1. on récupère les tableaux de livres et d'adhérents
$pays = Pays::getPaysByCode($code);

// 2. on construit le tableau de données contenant les livres et les adhérents
$donnees = array();

// 3. on remplit ce tableau avec les deux tableaux issus des requêtes
$donnees[] = $pays;

// 4. on affiche le tableau $donnees format JSON pour qu'il soit récupéré proprement
// par la requête AJAX à l'origine de cette recherche
echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
?>
