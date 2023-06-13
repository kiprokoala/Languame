<?php 
use app\Utils\Database as Connexion;
Connexion::connect();

ini_set('display_errors', 1);
$expression = $_POST['expression'];
$translitteration = $_POST['translitteration'];
$significationLitterale = $_POST['significationLitterale'];
$significationIdiomatique = $_POST['significationIdiomatique'];
$pays = $_POST['pays'];
$langue = $_POST['langue'];
if (isset($_POST['theme'])){
    $theme = $_POST['theme'];
} else {
    $theme = null;

}
$typeExpression = $_POST['typeExpression'];
$paysVise = $_POST['paysVise'];

// recupérer erreurs try catch 
try {
    $req_prep = Connexion::pdo()->prepare("INSERT INTO expression(texteLangueExpression, litteralTradExpression, id_theme, id_pays, id_langue, translitteration, significationLitterale, significationIdiomatique) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$req_prep->execute(array($expression, $significationLitterale, $theme, $pays, $langue, $translitteration, $significationLitterale, $significationIdiomatique));
$res= "ok";
} catch(PDOException $e) {
    $res = $e->getMessage();
}

if($typeExpression = "paysVise"){
    //recuperer last id expression
    $lastId = Connexion::pdo()->lastInsertId();
    //inserer dans la table cible la variable $paysVise et $lastId
    try {
        $req_prep = Connexion::pdo()->prepare("INSERT INTO cible(id_pays, id_expression) VALUES (?, ?)");
        $req_prep->execute(array($paysVise, $lastId));
        $res= "ok";
    } catch(PDOException $e) {
        $res = $e->getMessage();
    }
}

echo json_encode($_POST);
?>