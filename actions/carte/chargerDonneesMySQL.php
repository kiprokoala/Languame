<?php

// Cette ligne inclut le fichier de configuration de la connexion à la base de données
require_once("../../conf/connexion.php");

// Cette ligne établit une connexion à la base de données en utilisant la classe Connexion
Connexion::connect();

// Cette ligne inclut le fichier du modèle Pays
require_once("../../model/paysTest.php");

// 1. on récupère les tableaux de livres et d'adhérents à partir du modèle Pays
$pays = Pays::getAllPays();

// 2. on construit le tableau de données contenant les pays
$donnees = array();

// 3. on ajoute le tableau des pays au tableau de données
$donnees[] = $pays;

// 4. on affiche le tableau $donnees au format JSON pour qu'il puisse être récupéré proprement
// par la requête AJAX à l'origine de cette recherche
echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
?>
