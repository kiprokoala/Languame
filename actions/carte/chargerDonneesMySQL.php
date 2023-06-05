<?php

require_once("../../config/connexion.php");
require_once("../../model/paysTest.php");

// Connexion à la base de données
Connexion::connect();


// Obtention de tous les pays
$pays = Pays::getAllPays();

//  on construit le tableau de données contenant les livres et les adhérents
$donnees = array();

//  on remplit ce tableau avec les deux tableaux issus des requêtes
$donnees[] = $pays;

//  on affiche le tableau $donnees format JSON pour qu'il soit récupéré proprement
// par la requête AJAX à l'origine de cette recherche
echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
?>
