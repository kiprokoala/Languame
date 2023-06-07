<?php
require_once("../../conf/connexion.php");
Connexion::connect();
require_once("../../model/paysTest.php");
// $code = $_GET["code"];
// pour recupere les expression le lien et fait avec l'id du pays 
// il faut donc faire un get [idpays]
$id_pays = $_GET["id_pays"];


// 1. on récupère les tableaux de livres et d'adhérents
//$pays = Pays::getPaysByCode($code);

$expressions = Pays::getExpressionsByPays($id_pays);
//$expressions = $pays->getExpressionsByPays();

// 4. on affiche le tableau $donnees format JSON pour qu'il soit récupéré proprement
// par la requête AJAX à l'origine de cette recherche
echo json_encode($expressions, JSON_UNESCAPED_UNICODE);
?>
