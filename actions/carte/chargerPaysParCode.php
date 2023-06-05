<?php

require_once("../../config/connexion.php");
Connexion::connect();
require_once("../../model/paysTest.php");

// Vérifie si le paramètre "code" est présent dans la requête GET
if (!isset($_GET["code"])) {
    // Si le paramètre "code" n'est pas fourni, renvoie une erreur
    echo json_encode(["error" => "Le paramètre 'code' est manquant"], JSON_UNESCAPED_UNICODE);
    exit;
}

$code = $_GET["code"];

// Obtient les informations sur le pays en utilisant la méthode statique de la classe Pays
$pays = Pays::getPaysByCode($code);

// Vérifie si les informations sur le pays sont trouvées
if ($pays === false) {
    // Si les informations sur le pays ne sont pas trouvées, renvoie une erreur
    echo json_encode(["error" => "Pays non trouvé"], JSON_UNESCAPED_UNICODE);
    exit;
}

// Construit le tableau de données contenant les informations sur le pays
$donnees = [
    "pays" => $pays
];

// Affiche le tableau $donnees au format JSON
echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
?>
