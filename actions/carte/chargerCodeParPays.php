<?php

require_once("../../conf/connexion.php");
Connexion::connect();

# le fichier sur lequelle il est pointer doit etre modoifier et etre merge avec
# require_once("../../model/pays.php");

require_once("../../model/paysTest.php");

// Vérifie si le paramètre "nom" est présent dans la requête GET
if (!isset($_GET["nom"])) {
    // Si le paramètre "nom" n'est pas fourni, renvoie une erreur
    echo json_encode(["error" => "Le paramètre 'nom' est manquant"], JSON_UNESCAPED_UNICODE);
    exit;
}

$nom = $_GET["nom"];

// Obtient le code du pays en utilisant la méthode statique de la classe Pays
$code = Pays::getCodeByPays($nom);

// Vérifie si le code du pays est trouvé
if ($code === false) {
    // Si le code du pays n'est pas trouvé, renvoie une erreur
    echo json_encode(["error" => "Pays non trouvé"], JSON_UNESCAPED_UNICODE);
    exit;
}

// Construit le tableau de données contenant le code du pays
$donnees = [
    "code" => $code
];

// Affiche le tableau $donnees au format JSON
echo json_encode($donnees, JSON_UNESCAPED_UNICODE);
?>
